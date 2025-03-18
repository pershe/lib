<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data pengguna
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('petugas.createusr'); // Arahkan ke view form tambah peminjam
    }

    /**
     * Menyimpan data peminjam baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed', // Pastikan password dikonfirmasi
        ]);

        // Simpan data peminjam baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => bcrypt($request->password), // Enkripsi password
            'role' => 'peminjam', // Set role sebagai peminjam
        ]);

        // Redirect ke halaman data peminjam dengan pesan sukses
        return redirect()->route('peminjam.data')->with('success', 'Peminjam berhasil ditambahkan!');
    }
    public function update(Request $request, User $user)
    {
        if (!$user) {
            abort(404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            // 'role' => 'required|in:user,admin',
        ]);

        $user->update($request->all());

        // return redirect()->back()->with('success', 'User updated successfully!');
        return redirect()->route('peminjam.data')->with('success', 'User updated successfully!');

    }

    public function edit(User $user)
    {
        // Menampilkan view edit dengan data user yang dipilih
        return view('petugas.edit', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully!');
    }

    public function indexPetugas()
    {
        $petugas = User::where('role', 'petugas')->get(); // Ambil data petugas
        return view('petugas.index', compact('petugas'));
    }

    // Menampilkan data peminjam
    public function indexPeminjam()
    {
        $peminjam = User::where('role', 'peminjam')->get(); // Ambil data peminjam
        return view('peminjam.index', compact('peminjam'));
    }
}


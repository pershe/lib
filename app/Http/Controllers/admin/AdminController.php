<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Book;
use App\Models\Peminjamanbook;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    // Menampilkan daftar buku
    public function showBooks()
    {
        $books = Book::all();
        return view('admin.books', compact('books'));
    }

    // Menampilkan histori peminjaman
    public function showHistoriPeminjaman()
    {
        $histori = Peminjamanbook::with('user', 'book')->get();

        return view('admin.histori-peminjaman', compact('histori'));
    }

    // Menampilkan data peminjam
    public function showPeminjam()
    {
    $users = User::where('role', 'peminjam')->get();
    return view('admin.peminjam', compact('users'));
    }

    // Menampilkan data petugas
    public function showPetugas()
    {
        $users = User::where('role', 'petugas')->get();
        return view('admin.petugas', compact('users'));
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Role berhasil diperbarui!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

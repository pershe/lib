<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Peminjamanbook;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\HistoriPeminjaman;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class PeminjamanbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data peminjaman beserta relasi user dan book
        $peminjaman = peminjamanbook::with(['user', 'book'])->get();
        return view('petugas.peminjaman', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); // Ambil semua data user
        $books = Book::all(); // Ambil semua data buku
        return view('petugas.create-peminjaman', compact('users', 'books'));
    }

    /**
     * Menyimpan data peminjaman baru.
     */
    public function store(Request $request)
    {
    DB::beginTransaction();

    try {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'tanggal_peminjaman' => 'required|date',
            'status' => 'required|in:dibooking,dipinjam,dikembalikan',
        ]);

        $tanggalPengembalian = Carbon::parse($request->tanggal_peminjaman)->addDays(7);

        // Simpan data peminjaman
        Peminjamanbook::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $tanggalPengembalian,
            'status' => $request->status,
        ]);

        // Commit transaksi jika berhasil
        DB::commit();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Rollback jika terjadi kesalahan
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        }
        public function edit($id)
        {
            $peminjaman = Peminjamanbook::findOrFail($id);
            $users = User::all(); // Ambil semua data user
            $books = Book::all(); // Ambil semua data buku
            return view('petugas.edit-peminjaman', compact('peminjaman', 'users', 'books'));
        }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'book_id' => 'required|exists:books,id',
                'tanggal_peminjaman' => 'required|date',
                'tanggal_pengembalian' => 'nullable|date',
                'status' => 'required|in:dibooking,dipinjam,dikembalikan',
            ]);

            $peminjaman = Peminjamanbook::findOrFail($id);

            if ($request->status === 'dikembalikan') {
                HistoriPeminjaman::create([
                    'user_id' => $peminjaman->user_id,
                    'book_id' => $peminjaman->book_id,
                    'tanggal_peminjaman' => $peminjaman->tanggal_peminjaman,
                    'tanggal_pengembalian' => now(),
                    'status' => 'dikembalikan',
                ]);

                // Hapus dari tabel peminjaman aktif
                $peminjaman->delete();
            } else {
                $peminjaman->update($request->all());
            }

            DB::commit();

            return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus data peminjaman
        $peminjaman = Peminjamanbook::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus!');
    }
    public function histori()
    {
        $histori = HistoriPeminjaman::with(['user', 'book'])->get();
        return view('petugas.histori-peminjaman', compact('histori'));
    }

    public function booking(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            if (!Auth::check()) {
                return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
            }

            $user = Auth::user();
            $book = Book::findOrFail($id);

            if ($book->jumlah <= 0) {
                return redirect()->back()->with('error', 'Stok buku habis!');
            }

            $request->validate([
                'tanggal_pengembalian' => 'required|date|after:today',
            ]);

            Peminjamanbook::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'status' => 'dibooking',
                'tanggal_peminjaman' => now(),
                'tanggal_pengembalian' => $request->tanggal_pengembalian,
            ]);

            $book->decrement('jumlah');

            DB::commit();

            return redirect()->route('peminjam.books')->with('success', 'Buku berhasil dibooking!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function showBooking($id)
    {
        $book = Book::findOrFail($id);
        return view('peminjam.booking', compact('book'));
    }



}
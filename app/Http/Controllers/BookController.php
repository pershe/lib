<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Kategoribook;
use Illuminate\Support\Facades\Storage; // Pastikan model Kategoribook sudah ada

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('kategoribook')->get(); // Ambil data buku beserta kategorinya
        return view('petugas.books', compact('books'));
    }

    public function indexPeminjam()
    {
        $books = Book::all(); // Ambil semua buku
        return view('peminjam.books', compact('books'));
    }


    public function create()
    {
        $kategoribooks = Kategoribook::all(); // Ambil semua data kategori buku
        return view('petugas.createbk', compact('kategoribooks'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategoribook_id' => 'required|exists:kategoribooks,id',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'description' => 'required|string',
            'code' => 'required|string|unique:books,code',
            'tahun_terbit' => 'required|integer|min:1000|max:' . date('Y'),
            'jumlah' => 'required|integer|min:1',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar
        $gambarPath = $request->file('gambar')->store('books', 'public');

        // Simpan ke database
        Book::create([
            'judul' => $request->judul,
            'kategoribook_id' => $request->kategoribook_id,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'description' => $request->description,
            'code' => $request->code,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah' => $request->jumlah,
            'gambar' => $gambarPath,
        ]);

        // Redirect ke halaman petugas.books setelah berhasil menyimpan
        return redirect()->route('book.data')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $kategoribooks = Kategoribook::all(); // Mengambil semua data kategori buku
        return view('petugas.edit-book', compact('book', 'kategoribooks'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'kategoribook_id' => 'required|exists:kategoribooks,id', // Pastikan kategori valid
        'penulis' => 'required|string|max:255',
        'penerbit' => 'required|string|max:255',
        'description' => 'nullable|string',
        'code' => 'required|string|max:50|unique:books,code,' . $id,
        'tahun_terbit' => 'required|integer',
        'jumlah' => 'required|integer',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $book = Book::findOrFail($id);

    // Cek apakah ada gambar baru yang diunggah
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($book->gambar) {
            Storage::disk('public')->delete($book->gambar);
        }

        // Simpan gambar baru
        $gambarPath = $request->file('gambar')->store('books', 'public');
        $book->gambar = $gambarPath;
    }

    // Update data buku
    $book->update([
        'judul' => $request->judul,
        'kategoribook_id' => $request->kategoribook_id, // Simpan kategori buku
        'penulis' => $request->penulis,
        'penerbit' => $request->penerbit,
        'description' => $request->description,
        'code' => $request->code,
        'tahun_terbit' => $request->tahun_terbit,
        'jumlah' => $request->jumlah,
        'gambar' => $book->gambar,
    ]);

    return redirect()->route('book.data')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('book.data')->with('success', 'Buku berhasil dihapus!');
    }
}

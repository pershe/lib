<?php

namespace App\Http\Controllers\peminjam;

use App\Http\Controllers\Controller;
use App\Models\peminjam;
use App\Models\Book;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peminjam.dashboard');
    }

    public function books()
    {
        $books = Book::with('kategoribook')->get(); // Ambil semua buku dengan kategori
        return view('peminjam.books', compact('books')); // Kirim data ke view
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
    public function show(peminjam $peminjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(peminjam $peminjam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, peminjam $peminjam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(peminjam $peminjam)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kategoribook;
use Illuminate\Http\Request;

class KategoribookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoribooks = Kategoribook::all(); // Ambil semua data kategori buku
        return view('petugas.kategori', compact('kategoribooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.create-kategori'); // Tampilkan form tambah kategori
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoribooks,nama_kategori',
        ]);

        Kategoribook::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategoribook = Kategoribook::findOrFail($id);
        return view('petugas.edit-kategori', compact('kategoribook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoribooks,nama_kategori,' . $id,
        ]);

        $kategoribook = Kategoribook::findOrFail($id);
        $kategoribook->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategoribook = Kategoribook::findOrFail($id);
        $kategoribook->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
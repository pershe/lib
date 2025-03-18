@extends('petugas.navbar')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Edit Buku</h2>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-2 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label class="block mb-2">Judul</label>
        <input type="text" name="judul" value="{{ old('judul', $book->judul) }}" class="w-full p-2 border rounded mb-4">

        <label class="block mb-2">Kategori Buku</label>
        <select name="kategoribook_id" class="w-full p-2 border rounded mb-4">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($kategoribooks as $kategori)
                <option value="{{ $kategori->id }}" {{ $book->kategoribook_id == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </select>

        <label class="block mb-2">Penulis</label>
        <input type="text" name="penulis" value="{{ old('penulis', $book->penulis) }}" class="w-full p-2 border rounded mb-4">

        <label class="block mb-2">Penerbit</label>
        <input type="text" name="penerbit" value="{{ old('penerbit', $book->penerbit) }}" class="w-full p-2 border rounded mb-4">

        <label class="block mb-2">Deskripsi</label>
        <textarea name="description" class="w-full p-2 border rounded mb-4">{{ old('description', $book->description) }}</textarea>

        <label class="block mb-2">Kode</label>
        <input type="text" name="code" value="{{ old('code', $book->code) }}" class="w-full p-2 border rounded mb-4">

        <label class="block mb-2">Tahun Terbit</label>
        <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $book->tahun_terbit) }}" class="w-full p-2 border rounded mb-4">

        <label class="block mb-2">Jumlah</label>
        <input type="number" name="jumlah" value="{{ old('jumlah', $book->jumlah) }}" class="w-full p-2 border rounded mb-4">

        <label>Gambar Saat Ini</label><br>
        @if($book->gambar)
            <img src="{{ asset('storage/' . $book->gambar) }}" width="150">
        @else
            <p>Tidak ada gambar</p>
        @endif
        <br>

        <label>Upload Gambar Baru</label>
        <input type="file" name="gambar" accept="image/*">

        <button type="submit" class="bg-green-500 text-white p-2 rounded">Update</button>
        <a href="{{ route('book.data') }}" class="bg-gray-500 text-white p-2 rounded">Kembali</a>
    </form>
</div>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>book⚖️</title>

    <!-- @include('petugas.css') -->
     <!-- nggo style pertama cuy -->

</head>

<body class="text-gray-800 font-inter bg-gray-100">

@extends('petugas.navbar')

@section('content')

    <div class="flex items-center justify-between px-6 py-4">
        <h1 class="text-3xl font-bold text-gray-800">📚 Daftar Buku</h1>
        <a href="{{ route('book.create') }}" class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg shadow-lg transition">
            ➕ Tambah Buku
        </a>
    </div>


    <div style="margin: 0px 20px;" class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-blue-600 text-white">
                    <th class="p-3 border-r">ID</th>
                    <th class="p-3 border-r">📖 Judul</th>
                    <th class="p-3 border-r">📂 Kategori</th>
                    <th class="p-3 border-r">✍️ Penulis</th>
                    <th class="p-3 border-r">🏢 Penerbit</th>
                    <th class="p-3 border-r">📜 Deskripsi</th>
                    <th class="p-3 border-r">🔖 Kode</th>
                    <th class="p-3 border-r">📆 Tahun Terbit</th>
                    <th class="p-3 border-r">📦 Jumlah</th>
                    <th class="p-3 border-r">📸 Gambar</th>
                    <th class="p-3">⚙️ Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($books as $book)
                <tr class="border-b hover:bg-gray-100 transition">
                    <td class="p-3 border-r text-center">{{ $book->id }}</td>
                    <td class="p-3 border-r">{{ $book->judul }}</td>
                    <td class="p-3 border-r">{{ $book->kategoribook->nama_kategori }}</td>
                    <td class="p-3 border-r">{{ $book->penulis }}</td>
                    <td class="p-3 border-r">{{ $book->penerbit }}</td>
                    <td class="p-3 border-r">{{ \Illuminate\Support\Str::limit($book->description, 50, '...') }}</td>
                    <td class="p-3 border-r text-center">{{ $book->code }}</td>
                    <td class="p-3 border-r text-center">{{ $book->tahun_terbit }}</td>
                    <td class="p-3 border-r text-center">{{ $book->jumlah }}</td>
                    <td class="p-3 border-r text-center">
                        @if($book->gambar)
                            <img src="{{ asset('storage/' . $book->gambar) }}" class="w-16 h-16 object-cover rounded-md border">
                        @else
                            <span class="text-gray-500 italic">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td class="p-3 flex gap-2 justify-center">
                        <a href="{{ route('book.edit', $book->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white px-3 py-1 rounded-md text-sm">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('book.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm">
                                🗑️ Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

@endsection
</html>

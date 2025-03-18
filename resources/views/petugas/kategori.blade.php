<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Kategori Buku⚖️</title>
</head>

<body class="bg-gray-100">

@extends('petugas.navbar')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">📚 Data Kategori Buku</h1>
            <a href="{{ route('kategori.create') }}" class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg shadow-lg transition">
                ➕ Tambah Kategori
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="overflow-x-auto">
                <table class="w-full border rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-50 border-b">
                            <th class="px-4 py-3 text-sm font-bold text-gray-600">ID</th>
                            <th class="px-4 py-3 text-sm font-bold text-gray-600">Nama Kategori</th>
                            <th class="px-4 py-3 text-sm font-bold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoribooks as $kategori)
                            <tr class="bg-gray-100 border-b text-center text-sm text-gray-700">
                                <td class="px-4 py-3">{{ $kategori->id }}</td>
                                <td class="px-4 py-3">{{ $kategori->nama_kategori }}</td>
                                <td class="px-4 py-3 flex justify-center gap-2">
                                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded shadow text-xs">Edit</a>
                                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow text-xs">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
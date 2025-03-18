<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
</head>
<body class="text-gray-800 font-inter">

@extends('petugas.navbar')

@section('content')

<div class="p-6">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Edit Kategori</h1>

        <!-- Form Edit Kategori -->
        <form method="POST" action="{{ route('kategori.update', $kategoribook->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama_kategori" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori" value="{{ $kategoribook->nama_kategori }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
</body>
</html>
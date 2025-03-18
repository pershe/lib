<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjaman</title>
</head>
<body class="text-gray-800 font-inter">
    
@extends('petugas.navbar')

@section('content')

<div class="p-6">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Edit Peminjaman</h1>

        <!-- Form Edit Peminjaman -->
        <form method="POST" action="{{ route('peminjaman.update', $peminjaman->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="user_id" class="block text-sm font-medium text-gray-700">Peminjam</label>
        <select name="user_id" id="user_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            <option value="">Pilih Peminjam</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $peminjaman->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="book_id" class="block text-sm font-medium text-gray-700">Buku</label>
        <select name="book_id" id="book_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            <option value="">Pilih Buku</option>
            @foreach ($books as $book)
                <option value="{{ $book->id }}" {{ $peminjaman->book_id == $book->id ? 'selected' : '' }}>{{ $book->judul }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="tanggal_peminjaman" class="block text-sm font-medium text-gray-700">Tanggal Peminjaman</label>
        <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" value="{{ $peminjaman->tanggal_peminjaman }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
    </div>

    <div class="mb-4">
        <label for="tanggal_pengembalian" class="block text-sm font-medium text-gray-700">Tanggal Pengembalian</label>
        <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" value="{{ $peminjaman->tanggal_pengembalian }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
    </div>

    <div class="mb-4">
        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
        <select name="status" id="status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            <option value="dibooking" {{ $peminjaman->status == 'dibooking' ? 'selected' : '' }}>Dibooking</option>
            <option value="dipinjam" {{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            <option value="dikembalikan" {{ $peminjaman->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
        </select>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
        <a href="{{ route('peminjaman.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 ml-2">Kembali</a>
    </div>
</form>
    </div>
</div>

@endsection
</body>
</html>
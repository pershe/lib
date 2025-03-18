<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjam</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
@extends('petugas.navbar')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Peminjam</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nama:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="w-full px-4 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="w-full px-4 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700">Alamat:</label>
                <input type="text" name="address" id="address" value="{{ $user->address }}" class="w-full px-4 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700">Nomor Telepon:</label>
                <input type="text" name="phone" id="phone" value="{{ $user->phone }}" class="w-full px-4 py-2 border rounded">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
            </div>
        </form>
    </div>
    @endsection
</body>
</html>

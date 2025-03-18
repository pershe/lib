<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Peminjam⚖️</title>
</head>


<body class="bg-gray-100">

@extends('petugas.navbar')

@section('content')

@if(session('success'))
    <div class="bg-green-200 text-green-800 p-4 rounded-lg mb-4">
        {!! session('success') !!}
    </div>
@endif

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">📋 Data Peminjam</h1>
            <a href="{{ route('user.create') }}" class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg shadow-lg transition">
                ➕ Tambah Peminjam
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Daftar Pengguna</h2>
        <a href="{{ route('user.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">Tambah Pengguna</a>
    </div>

                <div class="overflow-x-auto">
                    <table class="w-full border rounded-lg shadow-md">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="px-4 py-3 text-sm font-bold text-gray-600">Nama</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-600">Email</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-600">Alamat</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-600">Telepon</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-600">Foto</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="bg-gray-100 border-b text-center text-sm text-gray-700">
                                    <td class="px-4 py-3">{{ $user->name }}</td>
                                    <td class="px-4 py-3">{{ $user->email }}</td>
                                    <td class="px-4 py-3">{{ $user->address }}</td>
                                    <td class="px-4 py-3">{{ $user->phone }}</td>
                                    <td class="px-4 py-3">
                                        @if ($user->photo)
                                            <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto Profil" class="w-12 h-12 rounded-full border border-gray-300 shadow-sm">
                                        @else
                                            <span class="text-gray-500 italic">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded shadow hover:bg-yellow-600">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')" class="bg-red-500 text-white px-3 py-1 rounded shadow hover:bg-red-600">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>

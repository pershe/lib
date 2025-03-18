<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Peminjam⚖️</title>
</head>

<body class="bg-gray-100">

@extends('admin.navbar')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">📋 Data Peminjam</h1>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="overflow-x-auto">
                <table class="w-full border rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-50 border-b">
                            <th class="px-4 py-3 text-sm font-bold text-gray-600">Nama</th>
                            <th class="px-4 py-3 text-sm font-bold text-gray-600">Email</th>
                            <th class="px-4 py-3 text-sm font-bold text-gray-600">Alamat</th>
                            <th class="px-4 py-3 text-sm font-bold text-gray-600">Telepon</th>
                            <th class="px-4 py-3 text-sm font-bold text-gray-600">Foto</th>
                            <th class="px-4 py-3 text-sm font-bold text-gray-600">Role</th>
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
                                    <form action="{{ route('admin.updateRole', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="role" class="border rounded p-1" onchange="this.form.submit()">
                                            <option value="peminjam" {{ $user->role == 'peminjam' ? 'selected' : '' }}>Peminjam</option>
                                            <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                        </select>
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

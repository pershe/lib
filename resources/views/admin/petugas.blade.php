@extends('admin.navbar')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800">📋 Data Petugas</h1>

    <div class="bg-white rounded-lg shadow-lg p-6 mt-4">
        <table class="w-full border rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="px-4 py-3 text-sm font-bold text-gray-600">Nama</th>
                    <th class="px-4 py-3 text-sm font-bold text-gray-600">Email</th>
                    <th class="px-4 py-3 text-sm font-bold text-gray-600">Alamat</th>
                    <th class="px-4 py-3 text-sm font-bold text-gray-600">Telepon</th>
                    <th class="px-4 py-3 text-sm font-bold text-gray-600">Role</th>
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
                            <form action="{{ route('admin.updateRole', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="role" onchange="this.form.submit()" class="border rounded p-2">
                                    <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                    <option value="peminjam" {{ $user->role == 'peminjam' ? 'selected' : '' }}>Peminjam</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-4 py-3">
                            <button class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

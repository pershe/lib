<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>loans⚖️</title>

</head>

<body class="text-gray-800 font-inter">

@extends('petugas.navbar')

@section('content')


<div class="p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">⚖️ Daftar Peminjaman</h1>

    <div class="overflow-x-auto">
        <table class="w-full border rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-3 text-sm font-bold text-gray-600">ID</th>
                    <th class="p-3 text-sm font-bold text-gray-600">Peminjam</th>
                    <th class="p-3 text-sm font-bold text-gray-600">Buku</th>
                    <th class="p-3 text-sm font-bold text-gray-600">Tanggal Peminjaman</th>
                    <th class="p-3 text-sm font-bold text-gray-600">Tanggal Kembali</th>
                    <th class="p-3 text-sm font-bold text-gray-600">Status</th>
                    <th class="p-3 text-sm font-bold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $pinjam)
                <tr class="bg-gray-100 border-b text-center text-sm text-gray-700">
                    <td class="p-3">{{ $pinjam->id }}</td>
                    <td class="p-3">{{ $pinjam->user ? $pinjam->user->name : 'User tidak ditemukan' }}</td>
                    <td class="p-3">{{ $pinjam->book ? $pinjam->book->judul : 'Buku tidak ditemukan' }}</td>
                    <td class="p-3">{{ $pinjam->tanggal_peminjaman }}</td>
                    <td class="p-3">{{ $pinjam->tanggal_pengembalian ?? 'Belum dikembalikan' }}</td>
                    <td class="p-3">
                        <span class="{{ $pinjam->status == 'dipinjam' ? 'bg-red-500' : 'bg-green-500' }} text-white px-3 py-1 rounded-full text-xs">
                            {{ $pinjam->status }}
                        </span>
                    </td>
                    <td class="p-3 flex justify-center space-x-2">
                        <a href="{{ route('peminjaman.edit', $pinjam->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white px-3 py-1 rounded-md text-xs">
                            Edit
                        </a>
                        <form action="{{ route('peminjaman.destroy', $pinjam->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?')"
                                class="bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4 flex justify-end">
        <a href="{{ route('peminjaman.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg shadow-lg">
            ➕ Tambah Peminjaman
        </a>
    </div>
</div>


</script>
@endsection
</body>
</html>

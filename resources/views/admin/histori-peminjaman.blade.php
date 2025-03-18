@extends('admin.navbar')

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800"></h1>
    <div class="flex items-center justify-between px-6 py-4">
        <h1 class="text-3xl font-bold text-gray-800">📜 Histori Peminjaman</h1>
        <a href="{{ route('generate.pdf') }}" class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg shadow-lg transition">
            📄 Generate PDF
        </a>
    </div>


    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-blue-600 text-white">
                    <th class="p-3 border-r">ID</th>
                    <th class="p-3 border-r">📌 Peminjam</th>
                    <th class="p-3 border-r">📖 Buku</th>
                    <th class="p-3 border-r">📅 Tanggal Peminjaman</th>
                    <th class="p-3 border-r">📆 Tanggal Pengembalian</th>
                    <th class="p-3">🔖 Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($histori as $item)
                <tr class="border-b hover:bg-gray-100 transition">
                    <td class="p-3 border-r text-center">{{ $item->id }}</td>
                    <td class="p-3 border-r">{{ $item->user->name }}</td>
                    <td class="p-3 border-r">
                        {{ $item->book ? $item->book->judul : 'Buku tidak ditemukan' }}
                    </td>
                    <td class="p-3 border-r text-center">{{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->format('d M Y') }}</td>
                    <td class="p-3 border-r text-center">{{ \Carbon\Carbon::parse($item->tanggal_pengembalian)->format('d M Y') }}</td>
                    <td class="p-3 text-center">
                        @if ($item->status == 'dipinjam')
                            <span class="px-3 py-1 bg-yellow-500 text-white rounded-full text-sm">Dipinjam</span>
                        @else
                            <span class="px-3 py-1 bg-green-500 text-white rounded-full text-sm">Dikembalikan</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

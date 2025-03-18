@extends('peminjam.navbar')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-semibold text-center mb-6 text-gray-800">📖 Formulir Peminjaman Buku</h2>

    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
        <h4 class="text-xl font-bold text-gray-900">{{ $book->judul }}</h4> <br>
        <p class="text-gray-600"><strong>✍️ Penulis:</strong> {{ $book->penulis }}</p>
        <p class="text-gray-600"><strong>🏢 Penerbit:</strong> {{ $book->penerbit }}</p>
        <p class="text-gray-600"><strong>🏢 Penerbit:</strong> {{ $book->description }}</p>
        <p class="text-gray-600"><strong>📅 Tahun Terbit:</strong> {{ $book->tahun_terbit }}</p>
        <p class="text-gray-600"><strong>📦 Jumlah Tersedia:</strong> {{ $book->jumlah }}</p>
        {{-- Form Peminjaman --}}
        <form action="{{ route('peminjaman.booking', $book->id) }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="tanggal_pengembalian" class="block text-gray-700 font-medium">🗓️ Tanggal Pengambilan</label>
                <input type="date" name="tanggal_pengembalian" class="mt-1 w-full border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <button type="submit" class="w-full py-2 px-4 rounded-md font-semibold text-white bg-green-500 hover:bg-green-600 transition duration-300 {{ $book->jumlah == 0 ? 'bg-gray-400 cursor-not-allowed' : '' }}" {{ $book->jumlah == 0 ? 'disabled' : '' }}>
                ✅ Konfirmasi Peminjaman
            </button>
        </form>
    </div>
</div>
@endsection

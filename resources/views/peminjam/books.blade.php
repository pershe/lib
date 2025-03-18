@extends('peminjam.navbar')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-semibold text-center mb-8 text-gray-800">📚 Daftar Buku</h2>
    <div class="grid grid-cols-3 gap-8">
        @foreach ($books as $book)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row h-52 md:h-64 p-6">

                {{-- Gambar di kiri --}}
                <div class="w-full md:w-1/3">
                    @if($book->gambar)
                        <img class="w-full h-full object-cover aspect-[3/2.5] rounded-lg" src="{{ asset('storage/' . $book->gambar) }}" alt="{{ $book->judul }}">
                    @else
                        <img class="w-full h-full object-cover aspect-[3/2.5] rounded-lg" src="{{ asset('images/default-book.png') }}" alt="Gambar Tidak Tersedia">
                    @endif
                </div>

                {{-- Bagian teks dan tombol di kanan --}}
                <div class="flex flex-col justify-center w-full md:w-2/3 pl-6 order-1">
                    <h3 class="text-xl font-bold text-gray-900">{{ $book->judul }}</h3>
                    <p class="text-gray-600 text-sm">✍️ {{ $book->penulis }}</p>

                    {{-- Tombol untuk meminjam buku --}}
                    <form action="{{ route('peminjaman.store') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <a href="{{ route('peminjaman.showBooking', $book->id) }}" class="block w-32 text-center py-2 px-4 rounded-md font-semibold text-white bg-blue-500 hover:bg-blue-600 transition duration-300
                        {{ $book->jumlah == 0 ? 'bg-gray-400 cursor-not-allowed' : '' }}">
                            Pinjam
                        </a>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Illuminate\Support\Str;

class BukusSeeder extends Seeder
{
    public function run()
    {
        Book::create([
            'kategoribook_id' => 1,
            'judul' => 'Laravel for Beginner',
            'penulis' => 'Taylor Otwell',
            'penerbit' => 'Laravel Press',
            'description' => 'Panduan lengkap Laravel.',
            'code' => Str::random(10), // Gunakan kode unik
            'tahun_terbit' => 2022,
            'jumlah' => 10,
            'gambar' => 'books/default.jpg', // Pastikan ada gambar default
        ]);
    }
}

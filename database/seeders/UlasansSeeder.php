<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Ulasan;

class UlasansSeeder extends Seeder
{
    public function run()
    {
        Ulasan::create([
            'book_id' => 1,
            'peminjam_id' => 1,
            'rating' => 5,
            'ulasan' => 'Buku yang sangat bagus dan bermanfaat!'
        ]);
    }
}

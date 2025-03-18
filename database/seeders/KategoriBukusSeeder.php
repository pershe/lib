<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategoribook;

class KategoriBukusSeeder extends Seeder
{
    public function run()
    {
        KategoriBook::create(['nama_kategori' => 'Programming']);
        KategoriBook::create(['nama_kategori' => 'Novel']);
        KategoriBook::create(['nama_kategori' => 'Sejarah']);
    }
}


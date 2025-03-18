<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\peminjamanbook;

class PeminjamansSeeder extends Seeder
{
    public function run()
    {
        peminjamanbook::create([
            'user_id' => 1,
            'book_id' => 1,
            'tanggal_peminjaman' => now(),
            'tanggal_pengembalian' => now()->addDays(7),
            'status' => 'dipinjam'
        ]);
    }
}

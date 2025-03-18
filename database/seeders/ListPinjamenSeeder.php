<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\lis_pinjam;

class ListPinjamenSeeder extends Seeder
{
    public function run()
    {
        lis_pinjam::create([
            'book_id' => 1,
            'peminjamanbook_id' => 1
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\listkategoribook;
use Illuminate\Database\Seeder;

class ListKategorisSeeder extends Seeder
{
    public function run()
    {
        listkategoribook::create([
            'kategoribook_id' => 1,
            'book_id' => 1
        ]);
    }
}


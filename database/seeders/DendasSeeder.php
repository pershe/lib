<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\lis_denda;

class DendasSeeder extends Seeder
{
    public function run()
    {
        lis_denda::create([
            'peminjamanbook_id' => 1,
            'nominal' => 5000,
            'dibayar' => false,
            'status' => 'belum_dibayar'
        ]);
    }
}

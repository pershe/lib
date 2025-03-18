<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'role' => 'admin',
                'password' => Hash::make('password123'),
                'address' => 'Jl. Admin No.1',
                'phone' => '081234567890',
                'identification_number' => 'ID123456',
                'photo' => null,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Petugas User',
                'email' => 'petugas@example.com',
                'role' => 'petugas',
                'password' => Hash::make('password123'),
                'address' => 'Jl. Petugas No.2',
                'phone' => '081234567891',
                'identification_number' => 'ID123457',
                'photo' => null,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Peminjam User',
                'email' => 'peminjam@example.com',
                'role' => 'peminjam',
                'password' => Hash::make('password123'),
                'address' => 'Jl. Peminjam No.3',
                'phone' => '081234567892',
                'identification_number' => 'ID123458',
                'photo' => null,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

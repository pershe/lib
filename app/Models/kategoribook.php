<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategoribook extends Model
{
    protected $table = 'kategoribooks'; // Pastikan sesuai dengan nama tabel di database

    protected $fillable = [
        'nama_kategori',
    ];
}
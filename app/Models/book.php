<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'kategoribook_id', 'judul', 'penulis', 'penerbit', 'description', 'code', 'tahun_terbit', 'jumlah', 'gambar'
    ];

    // Relasi ke tabel kategoribooks
    public function kategoribook()
    {
        return $this->belongsTo(Kategoribook::class, 'kategoribook_id');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjamanbook::class);
    }
}

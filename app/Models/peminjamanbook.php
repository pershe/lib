<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjamanbook extends Model
{
    protected $table = 'peminjamanbooks';

    protected $fillable = [
        'user_id', 'book_id', 'tanggal_peminjaman', 'tanggal_pengembalian', 'status'
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relasi ke model Book
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
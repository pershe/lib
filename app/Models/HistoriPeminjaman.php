<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'histori_peminjaman';

    protected $fillable = [
        'user_id',
        'book_id',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
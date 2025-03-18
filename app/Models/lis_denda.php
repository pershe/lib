<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lis_Denda extends Model
{
    use HasFactory;

    protected $fillable = ['peminjamanbook_id', 'nominal', 'dibayar', 'status'];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjamanbook::class, 'peminjamanbook_id');
    }
}

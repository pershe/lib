<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class lis_pinjam extends Model
{
    protected $table = 'lis_pinjams';

    protected $fillable = [
        'book_id',
        'peminjamanbook_id'
    ];

    public function buku (){
        return $this->BelongsTo(Book::class, 'book_id', 'id');
    }

    public function peminjaman (){
        return $this->BelongsTo(peminjamanbook::class, 'peminjamanbook_id', 'id');
    }
}

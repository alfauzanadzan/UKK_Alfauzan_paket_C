<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class Book extends Model
{
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun',
        'stok',
    ];

    /**
     * Relasi ke peminjaman
     */
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
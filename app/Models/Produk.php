<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'user_id',
        'kode_produk',
        'nama_produk',
        'kategori_id',
        'harga',
        'deskripsi',
        'foto',
        'stok'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'kategori_id');
    }
}

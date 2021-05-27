<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'user_id',
        'kode',
        'kategori'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function produk()
    {
        return $this->hasMany('App\Models\Produk');
    }
}

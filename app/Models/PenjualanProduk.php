<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenjualanProduk extends Model
{
    protected $table = 'penjualan_produk';

    protected $fillable = [
        'penjualan_id',
        'user_id',
        'produk_id',
        'qty',
        'total'
    ];

    public $timestamps = TRUE;

    public function penjualan()
    {
        return $this->belongsToMany('App\Models\Penjualan');
    }

    public function produk()
    {
        return $this->belongsTo('App\Models\Produk');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

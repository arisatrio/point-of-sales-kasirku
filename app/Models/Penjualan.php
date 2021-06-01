<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualans';

    protected $fillable = [
        'user_id',
        'member_id',
        'kode',
        'grand_total',
        'jumlah_bayar',
        'kembalian',
        'catatan',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function penjualanProduk()
    {
        return $this->hasMany('App\Models\PenjualanProduk');
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }
}

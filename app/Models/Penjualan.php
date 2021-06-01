<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

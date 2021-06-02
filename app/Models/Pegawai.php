<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'user_id',
        'pegawai_id',
        'nama_pegawai',
        'password'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

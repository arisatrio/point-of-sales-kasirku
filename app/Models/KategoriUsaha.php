<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriUsaha extends Model
{
    protected $table = 'kategori_usaha';
    protected $fillable = [
        'kategori_usaha'
    ];

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
}

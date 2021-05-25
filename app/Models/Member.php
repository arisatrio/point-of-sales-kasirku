<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Member extends Model
{
    protected $fillable = [
        'user_id',
        'id_member',
        'nama',
        'nohp',
        'alamat'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

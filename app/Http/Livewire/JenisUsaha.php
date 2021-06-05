<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\KategoriUsaha;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class JenisUsaha extends Component
{
    public function render()
    {
        $data = KategoriUsaha::all();
        //$user = Auth::user()->id;

        //$user = User::find($user)->with('kategoriUsaha');
        //dd(auth()->user()->jenis_usaha);

        return view('livewire.jenis-usaha', compact('data'));
    }
}

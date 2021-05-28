<?php

namespace App\Http\Livewire;

use App\Facades\Cart;

use Livewire\Component;
use App\Models\Produk;

class ProdukClick extends Component
{
    public function Add($id)
    {
        Cart::add(Produk::where('id', $id)->first());

        $this->emit('Added');
    }

    public function render()
    {
        $produk = Produk::paginate(15);

        return view('livewire.produk-click', compact('produk'));
    }
}

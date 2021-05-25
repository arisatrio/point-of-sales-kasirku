<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produk;

class ProdukClick extends Component
{
    public $item;
    public $produk;
    public $qty = 0;
    public $qtyCount;

    public function Add($id)
    {
        $produk = Produk::find($id);
        $this->produk = $produk;
        $this->emit('tambahProduk', $produk->id);
    }

    public function render()
    {
        return view('livewire.produk-click');
    }
}

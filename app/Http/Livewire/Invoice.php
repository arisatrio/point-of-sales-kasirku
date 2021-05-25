<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produk;

class Invoice extends Component
{

    public $qty = 0;
    public $item;
    public $produk;
    public $qtyCount;

    protected $listeners = ['tambahProduk'];

    public function tambahProduk($produkId)
    {
        $produk = Produk::find($produkId);
        $this->item = $produk;
        $this->qty = $this->qty + 1;
    }

    public function render()
    {
        return view('livewire.invoice');
    }
}

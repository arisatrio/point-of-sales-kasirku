<?php

namespace App\Http\Livewire;

use App\Facades\Cart;

use Livewire\Component;
use App\Models\Produk;
use App\Models\Member;

class Invoice extends Component
{
    public $cartTotal = 0;
    public $qty = 0;
    public $subtotal = 0;

    public $grandTotal;

    public $cart;

    protected $listeners = [
        'Added' => 'UpdateCart',
        'productRemoved'    => 'UpdateCart'
    ];

    public function mount()
    {
        $this->cart = Cart::get();
    }

    public function UpdateCart()
    {
        $this->cartTotal = count(Cart::get()['produk']);
        $this->cart = Cart::get();

        $this->qty = $this->qty + 1;
        //dd(Cart::get());
        //$this->subtotal = $this->qty * Cart::get()['produk', 'harga'];
    }

    public function removeItem($id)
    {
        Cart::remove($id);
        $this->qty = $this->qty - 1;

        $this->cart = Cart::get();

        $this->emit('produkRemoved');
    }

    public function render()
    {
        $this->cartTotal = count(Cart::get()['produk']);
        $key = 'subtotal';
        $this->grandTotal   = array_sum(array_column($this->cart['produk'], $key));

        $member = Member::all();
        return view('livewire.invoice', compact('member'));
    }
}

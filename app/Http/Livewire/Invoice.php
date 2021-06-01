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
    public $uang = 0;
    public $kembalian = 0;

    protected $listeners = [
        'Added' => 'UpdateCart',
        'productRemoved'    => 'UpdateCart',
        'clear' => 'UpdateCart'
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
    }

    public function removeItem($id)
    {
        Cart::remove($id);
        $this->qty = $this->qty - 1;

        $this->cart = Cart::get();

        $this->emit('produkRemoved');
    }

    public function setUangPas($uang)
    {
        $this->uang = $uang;
    }

    public function setUangNull()
    {
        $this->uang = 0;
    }

    public function setUang($uang)
    {
        $this->uang = $this->uang + $uang;
    }

    public function checkout()
    {
        Cart::clear();
        $this->cart = Cart::get();
        $this->emit('clear');
    }

    public function render()
    {
        $this->cartTotal = count(Cart::get()['produk']);
        $key = 'subtotal';
        $this->grandTotal   = array_sum(array_column($this->cart['produk'], $key));
        $this->kembalian =  $this->uang - $this->grandTotal;

        $member = Member::all();
        return view('livewire.invoice', compact('member'));
    }
}

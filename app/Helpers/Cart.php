<?php

namespace App\Helpers;

use App\Models\Produk;

class Cart
{
    public function __construct()
    {
        if ($this->get() === null) {
            $this->set($this->empty());
        }
    }

    public function add(Produk $produk)
    {
        $cart = $this->get();

        $cartProdukId = array_column($cart['produk'], 'id');
        $produk->qty = !empty($produk->qty) ? $produk->qty : 1;
        $produk->subtotal = $produk->harga;

        if (in_array($produk->id, $cartProdukId)) {
            $cart['produk'] = $this->produkCartIncrement($produk->id, $cart['produk']);
            $this->set($cart);
            return;
        }

        array_push($cart['produk'], $produk);
        $this->set($cart);
    }

    public function produkCartIncrement($produkId, $cartItems)
    {
        $qty = 1;
        $cartItems = array_map(function ($item) use ($produkId, $qty) {
            if ($produkId == $item['id']) {
                $item['qty'] += $qty;
                $item['subtotal'] = $item['qty'] * $item['harga'];
            }

            return $item;
        }, $cartItems);

        return $cartItems;
    }

    public function remove($id)
    {
        $cart = $this->get();

        array_splice($cart['produk'], array_search($id, array_column($cart['produk'], 'id')), 1);

        $this->set($cart);
    }

    public function clear()
    {
        $this->set($this->empty());
    }

    public function empty()
    {
        return [
            'produk' => [],
        ];
    }

    public function get()
    {
        return request()->session()->get('cart');
    }

    public function set($cart)
    {
        session()->put('cart', $cart);
    }
}

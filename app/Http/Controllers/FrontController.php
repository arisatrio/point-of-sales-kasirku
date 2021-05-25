<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;

class FrontController extends Controller
{
    public function dashboard()
    {
        $produk = Produk::all();

        return view('dashboard', compact('produk'));
    }
}

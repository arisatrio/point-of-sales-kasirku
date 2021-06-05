<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pesanan;

class FrontController extends Controller
{
    public function dashboard()
    {
        return view('transaksi');
    }
}

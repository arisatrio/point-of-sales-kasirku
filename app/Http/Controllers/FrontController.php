<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;

class FrontController extends Controller
{
    public function dashboard()
    {
        //$produk = Produk::paginate(15);

        return view('dashboard');
    }

    public function soalSatu(Request $request)
    {
        $output = $request->validate([
            'input'      => 'required|numeric',
        ]);

        $output['input'];

        $i = 0;
        $bil = 2;

        while ($i < $output['input']) {
            $cek = 0;

            for ($j = 2; $j <= $bil; $j++) {
                if ($bil % $j == 0) {
                    $cek++;
                }
            }
            if ($cek == 1) {
                echo $bil;
                if ($i < $output['input'] - 1) {
                    echo " ";
                } else {
                    echo ".";
                }
                $i++;
            }
            $bil++;
        };
    }

    public function soalSatuB(Request $request)
    {
        $output = $request->validate([
            'input'      => 'required|numeric',
        ]);

        $output['input'];

        for ($i = 1; $i <= $output['input']; $i++) {
            for ($j = 1; $j <= $output['input'] - $i; $j++) {
                echo " -";
            };

            for ($k = 1; $k <= $i; $k++) {
                echo " * ";
            };
            echo "<br>";
        };
    }
}

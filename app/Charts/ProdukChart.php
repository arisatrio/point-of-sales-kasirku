<?php

declare(strict_types=1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;

use App\Models\Produk;
use App\Models\Penjualan;

class ProdukChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public ?string $routeName = 'produk_chart';

    public function handler(Request $request): Chartisan
    {
        $today = Carbon::now();
        $firstDay = $today->startOfMonth()->toDateString();
        $lastDay = $today->endOfMonth()->toDateString();
        $period = CarbonPeriod::create($firstDay, $lastDay);
        foreach ($period as $item) {
            $bulanIni[] = $item->format('d');
        }

        //$produk = Produk::has('user')->pluck('nama_produk');
        // $thisMonth = Penjualan::has('user')->whereMonth('created_at', $today->format('m'))->whereYear('created_at', $today->format('Y'))->pluck('');

        $penjualan = Penjualan::select('id', 'created_at')->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('d'); // grouping by date
        });

        $data = $penjualan->toArray();

        return Chartisan::build()
            ->labels($bulanIni)
            ->dataset('Sample', [1]);
    }
}

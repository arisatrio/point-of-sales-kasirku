<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

use App\Models\Chart;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\PenjualanProduk;

class DashboardController extends Controller
{
    public function index()
    {
        //setlocale(LC_ALL, 'ID');
        $today = Carbon::today()->locale('id');

        $lastMonth = Penjualan::has('user')->whereMonth('created_at', $today->subMonth()->format('m'))->whereYear('created_at', $today->format('Y'))->sum('grand_total');
        $thisMonth = Penjualan::has('user')->whereMonth('created_at', $today->today()->format('m'))->whereYear('created_at', $today->format('Y'))->sum('grand_total');
        $lastDay  = Penjualan::has('user')->whereDate('created_at', $today->yesterday())->sum('grand_total');
        $thisDay   = Penjualan::has('user')->whereDate('created_at', $today->today())->sum('grand_total');


        if ($lastMonth != 0) {
            $persentaseBulan = $thisMonth / $lastMonth * 100;
        } else {
            $persentaseBulan = 0;
        }

        if ($lastDay != 0) {
            $sisa = $thisDay - $lastDay;
            $persentaseHari = ($sisa / $lastDay) * 100;
        } else {
            $persentaseHari = 0;
        }

        $firstDay = $today->startOfMonth()->toDateString();
        $lastDay = $today->endOfMonth()->toDateString();
        $period = CarbonPeriod::create($firstDay, $lastDay);
        foreach ($period as $item) {
            $bulanIni[] = $item->format('d');
        }

        $data = DB::table('penjualans')
            ->where('user_id', auth()->user()->id)
            ->get(['created_at', 'grand_total'])
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('d');
            });

        $data2 = Penjualan::select('grand_total')
            ->where('user_id', auth()->user()->id)
            ->whereDate('created_at', '>', $today->today()->subDays(30))

            ->pluck('grand_total');
        // ->groupBy(function ($date) {
        //     return Carbon::parse($date->created_at)->format('d');
        // });

        //$penjualan = $data->toArray();



        // $chart = new Chart;
        // $chart->labels = (array_keys($penjualan));
        // $chart->dataset = (array_values($penjualan));
        // $data = $data->toArray();
        // $date = (array_keys($data));
        //$data = (array_values($data));

        //$new = (array_values($data2));
        //dd($data->toArray());

        // $data = Penjualan::groupBy('date')
        //     ->get(array(
        //         DB::raw('Date(created_at) as date'),
        //         DB::raw('SUM(grand_total) as "grand_total"')
        //     ));


        return view('dashboard', compact('today', 'thisMonth', 'thisDay', 'persentaseBulan', 'persentaseHari', 'data'));
    }
}


        // $firstDay = $today->startOfMonth()->toDateString();
        // $lastDay = $today->endOfMonth()->toDateString();
        // $period = CarbonPeriod::create($firstDay, $lastDay);
        // foreach ($period as $item) {
        //     $bulanIni[] = $item->format('d');
        // }

        // $penjualan = Penjualan::select('id', 'created_at')->get()->groupBy(function ($date) {
        //     return Carbon::parse($date->created_at)->format('d'); // grouping by date
        // });
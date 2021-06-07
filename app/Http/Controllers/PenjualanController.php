<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

use App\Models\Penjualan;
use App\Models\PenjualanProduk;
use App\Helpers\Cart;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::has('user', auth()->user()->id)->with('member', 'penjualanProduk')->get();
        //dd($penjualan);

        return view('penjualan', compact('penjualan'));
    }

    public function get_transaction_id()
    {
        $id = Penjualan::query()
            ->where('kode', 'like', 'T' . date('ymd') . '%')
            ->selectRaw('max(substring(kode,8))+1 as kode');

        if ($id->count() > 0) {

            $id = 'T' . date('ymd') . sprintf("%04d", $id->first()->kode);
            //echo json_encode(['status'=>'success','message'=>$id]);
            return $id;
        } else {
            $id = 'T' . date('ymd') . '0001';
            //echo json_encode(['status'=>'success','message'=>$id]);

            return $id;
        }
    }

    public function store(Request $request)
    {
        $produk = json_decode($request->cart, TRUE);
        //dd($request->member_id);

        try {
            DB::beginTransaction();

            $penjualan = Penjualan::create([
                'user_id'       => auth()->user()->id,
                'member_id'     => $request->member_id,
                'kode'          => $this->get_transaction_id(),
                'grand_total'   => $request->grand_total,
                'jumlah_bayar'  => $request->jumlah_bayar,
                'kembalian'     => $request->kembalian,
                'catatan'       => $request->catatan,
                'status'        => $request->status
            ]);
            $penjualan->save();

            $iterasi = count($produk);
            $insert = [];
            for ($i = 0; $i < $iterasi; $i++) {
                $insert = [
                    'penjualan_id'  => $penjualan->id,
                    'user_id'       => $penjualan->user_id,
                    'produk_id'     => $produk[$i]['id'],
                    'qty'           => $produk[$i]['qty'],
                    'total'         => $produk[$i]['subtotal']
                ];
                PenjualanProduk::insert($insert);
            };
            DB::commit();

            return redirect()->route('penjualan-detail', $penjualan->id);
        } catch (\Exception $error) {
            DB::rollback();
            return redirect()->back()->with('messages', $error);
        };
    }

    public function show($id)
    {
        $penjualan = Penjualan::has('user')->with('penjualanProduk')->find($id);
        $produkPenj = PenjualanProduk::with('produk')->where('penjualan_id', $penjualan->id)->get();

        return view('penjualan-detail', compact('penjualan', 'produkPenj'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('penjualan-edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

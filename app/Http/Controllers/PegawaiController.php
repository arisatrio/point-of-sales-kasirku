<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function login()
    {
        return view('login-pegawai');
    }
    public function loginPost(Request $request)
    {
        $data = $request->validate([
            'email'         => 'required',
            'password'      => 'required'
        ]);

        if (Auth::guard('pegawai')->attempt($data)) {
            return redirect()->route('pegawai-transaksi');
        };
        return redirect()->back()->with('messages', "Email atau Password salah.!");
    }

    public function index()
    {
        $id = $this->get_id_pegawai();
        $pegawai = Pegawai::has('user', auth()->user()->id)->get();

        return view('pegawai', compact('id', 'pegawai'));
    }

    public function get_id_pegawai()
    {
        $getId = Pegawai::query()
            ->where('pegawai_id', 'like', 'Kasir-' . '%')
            ->selectRaw('max(substring(pegawai_id,8))+1 as pegawai_id');

        if ($getId->count() > 0) {
            $getId = 'Kasir-' . sprintf("%04d", $getId->first()->pegawai_id);
            return $getId;
        } else {
            $getId = 'Kasir-' . '0001';
            return $getId;
        }

        return $getId;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pegawai'          => 'required',
            'password'              => 'required|min:6|confirmed'
        ]);

        $pegawai = Pegawai::create([
            'user_id'       => auth()->user()->id,
            'pegawai_id'    => $this->get_id_pegawai(),
            'nama_pegawai'  => $data['nama_pegawai'],
            'password'      => bcrypt($data['password'])
        ]);
        $pegawai->save();

        return  redirect()->back()->with('messages', "Data Pegawai berhasil ditambahkan.");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\User;
use App\Models\Produk;
use App\Models\KategoriUsaha;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginPost(Request $request)
    {
    }

    public function dashboard()
    {
        $today              = Carbon::today()->locale('id');
        $totalUser          = User::all()->count();
        $totalProduk        = Produk::all()->count();
        $totalKategoriUsaha = KategoriUsaha::all()->count();
        $newUser            = User::where('created_at', $today->today())->count();

        return view('admin.dashboard', compact('today', 'totalUser', 'totalProduk', 'totalKategoriUsaha', 'newUser'));
    }

    public function index_kategori()
    {
        $kategoriUsaha      = KategoriUsaha::all();

        return view('admin.kategori-usaha', compact('kategoriUsaha'));
    }

    public function store_kategori(Request $request)
    {
        $data = $request->validate([
            'kategori_usaha'  => 'required'
        ]);

        $data = KategoriUsaha::create([
            'kategori_usaha'    => $data['kategori_usaha']
        ]);
        $data->save();

        return redirect()->back()->with('messages', 'Data berhasil ditambahkan.');
    }

    public function edit_kategori($id)
    {
        $kategoriUsaha = KategoriUsaha::find($id);

        return view('admin.kategori-usaha-edit', compact('kategoriUsaha'));
    }

    public function update_kategori(Request $request, $id)
    {
        $data = $request->validate([
            'kategori_usaha'  => 'required'
        ]);

        $kategoriUsaha = KategoriUsaha::find($id);
        $kategoriUsaha->update($data);

        return redirect()->route('admin-kategori')->with('messages', 'Data berhasil diperbaharui.');
    }

    public function destroy_kategori($id)
    {
        $kategoriUsaha = KategoriUsaha::find($id);
        $kategoriUsaha->delete();

        return redirect()->route('admin-kategori')->with('messages', 'Data berhasil dihapus.');
    }

    public function index_user()
    {
        $user = User::with('kategoriUsaha')->get();
        $kategoriUsaha      = KategoriUsaha::all();
        //dd($user);

        return view('admin.user', compact('user', 'kategoriUsaha'));
    }

    public function store_user(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string',
            'jenis_usaha'   => 'required|string',
            'alamat_toko'   => 'required|string',
            'nohp'          => 'required|string',
            'email'         => 'required|string|unique:users,email',
            'password'      => 'required|string',
            'password_confirmation'      => 'required|same:password'
        ]);

        $data = User::create([
            'name'          => $data['name'],
            'jenis_usaha'   => $data['jenis_usaha'],
            'alamat_toko'   => $data['alamat_toko'],
            'nohp'          => $data['nohp'],
            'email'         => $data['email'],
            'password'      => bcrypt($data['password'])
        ]);
        $data->save();

        return redirect()->back()->with('messages', 'Data berhasil ditambahkan.');
    }

    public function destroy_user($id)
    {
    }
}

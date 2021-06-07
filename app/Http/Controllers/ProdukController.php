<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function index()
    {
        $kategori = Kategori::has('user')->where('user_id', auth()->user()->id)->get();
        $produk = Produk::has('user')->where('user_id', auth()->user()->id)->with('kategori')->get();

        return view('produk', compact('produk', 'kategori'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_produk'   => 'required|unique:produks',
            'nama_produk'   => 'required',
            'kategori_id'   => 'required',
            'harga'         => 'required|numeric|min:0|not_in:0',
            'deskripsi'     => 'required',
            'foto'          => 'required',
            'stok'          => 'required|numeric|min:0'
        ]);

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $image              = $request->file('foto');
            $imageName          = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath    = public_path('/img/produk');
            $image->move($destinationPath, $imageName);
        }

        $produk = Produk::create([
            'user_id'       => auth()->user()->id,
            'kode_produk'   => $data['kode_produk'],
            'nama_produk'   => $data['nama_produk'],
            'kategori_id'   => $data['kategori_id'],
            'harga'         => $data['harga'],
            'stok'          => $data['stok'],
            'deskripsi'     => $data['deskripsi'],
            'foto'          => $imageName
        ]);

        return redirect('/produk')->with('messages', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        $kategori = Kategori::all();

        return view('produk-edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        if ($request->hasFile('foto')) {
            $data = $request->validate([
                'kode_produk'   => 'required',
                'nama_produk'   => 'required',
                'kategori_id'   => 'required',
                'harga'         => 'required|numeric',
                'deskripsi'     => 'required',
                'stok'          => 'required|numeric',
                'foto'          => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $image              = $request->file('foto');
            $imageName          = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath    = public_path('/img/produk');
            $image->move($destinationPath, $imageName);
            $produk->foto       = $imageName;
        } else {
            $data = $request->validate([
                'kode_produk'   => 'required',
                'nama_produk'   => 'required',
                'kategori_id'   => 'required',
                'harga'         => 'required|numeric',
                'deskripsi'     => 'required',
                'stok'          => 'required|numeric'
            ]);
        }

        $produk->update([
            'kode_produk'   => $data['kode_produk'],
            'nama_produk'   => $data['nama_produk'],
            'kategori_id'   => $data['kategori_id'],
            'harga'         => $data['harga'],
            'stok'          => $data['stok'],
            'deskripsi'     => $data['deskripsi'],
        ]);

        return redirect('/produk')->with('messages', "Data berhasil diperbaharui.");
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        return redirect('/produk')->with('messages', 'Data berhasil dihapus.');
    }
}

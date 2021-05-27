<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        return view('kategori', compact('kategori'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode'      => 'required',
            'kategori'  => 'required'
        ]);

        $kategori = Kategori::create([
            'user_id'   => auth()->user()->id,
            'kode'      => $data['kode'],
            'kategori'  => $data['kategori']
        ]);

        return redirect('/kategori')->with('messages', 'Data berhasil ditambahkan.');;
    }


    public function edit($id)
    {
        $kategori = Kategori::find($id);

        return view('kategori-edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kode'      => 'required',
            'kategori'  => 'required'
        ]);

        $kategori = Kategori::find($id);
        $kategori->update([
            'kode'      => $data['kode'],
            'kategori'  => $data['kategori']
        ]);

        return redirect('/kategori')->with('messages', 'Data berhasil diperbaharui.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect('/kategori')->with('messages', 'Data berhasil dihapus.');
    }
}

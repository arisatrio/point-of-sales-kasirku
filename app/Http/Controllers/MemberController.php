<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $member = Member::all();
        return view('member', compact('member'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'      => 'required',
            'nohp'      => 'required|numeric',
            'alamat'    => 'required'
        ]);

        $tgl = Carbon::now()->format('dmY');
        $last = Member::orderByDesc('created_at')->first();
        $id = (int)$last->id;

        $member = Member::create([
            'user_id'   => auth()->user()->id,
            'id_member'    => 'ID.' . $tgl . '.' . '00' . ($id + 1),
            'nama'      => $data['nama'],
            'nohp'      => $data['nohp'],
            'alamat'    => $data['alamat']
        ]);

        return redirect('/member')->with('messages', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $member = Member::find($id);

        return view('member-edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama'      => 'required',
            'nohp'      => 'required|numeric',
            'alamat'    => 'required'
        ]);

        $member = Member::find($id);
        $member->update([
            'nama'      => $data['nama'],
            'nohp'      => $data['nohp'],
            'alamat'    => $data['alamat']
        ]);

        return redirect('/member')->with('messages', 'Data member berhasi diperbaharui.');
    }

    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();

        return redirect('/member')->with('messages', 'Data berhasil dihapus.');
    }
}

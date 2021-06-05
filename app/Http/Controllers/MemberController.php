<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;
        $member = Member::has('user', $user)->get();
        return view('member', compact('member'));
    }

    public function get_member_id()
    {
        $id = Member::query()
            ->where('id_member', 'like', 'ID' . date('ymd') . '%')
            ->selectRaw('max(substring(id_member,8))+1 as id_member');

        if ($id->count() > 0) {

            $id = 'ID' . date('ymd') . sprintf("%04d", $id->first()->id_member);
            //echo json_encode(['status'=>'success','message'=>$id]);
            return $id;
        } else {
            $id = 'ID' . date('ymd') . '0001';
            //echo json_encode(['status'=>'success','message'=>$id]);

            return $id;
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'      => 'required',
            'nohp'      => 'required|numeric',
            'alamat'    => 'required'
        ]);

        $member = Member::create([
            'user_id'   => auth()->user()->id,
            'id_member'    => $this->get_member_id(),
            'nama'      => $data['nama'],
            'nohp'      => $data['nohp'],
            'alamat'    => $data['alamat']
        ]);

        $member->save();

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

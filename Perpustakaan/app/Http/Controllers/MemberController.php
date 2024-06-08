<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member = Member::all();

        return view('member.tampil', ['member' => $member]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|min:5',
                'alamat' => 'required',
                'no_hp' => 'required',
                'email' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong!',
                'alamat.required' => 'Alamat tidak boleh kosong!',
                'no_hp.required' => 'No Hp tidak boleh kosong!',
                'email.required' => 'Email tidak boleh kosong!',
            ]
        );

        $member = new Member;

        $member->nama = $request->input('nama');
        $member->alamat = $request->input('alamat');
        $member->no_hp = $request->input('no_hp');
        $member->email = $request->input('email');

        $member->save();

        return redirect('/member');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Member::find($id);

        return view('member.detail', ['member' => $member]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Member::find($id);

        return view('member.edit', ['member' => $member]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required|min:5',
                'alamat' => 'required',
                'no_hp' => 'required',
                'email' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong!',
                'alamat.required' => 'Alamat tidak boleh kosong!',
                'no_hp.required' => 'No Hp tidak boleh kosong!',
                'email.required' => 'Email tidak boleh kosong!',
            ]
        );

        Member::where('id', $id)
            ->update(
                [
                    'nama' => $request->input('nama'),
                    'alamat' => $request->input('alamat'),
                    'no_hp' => $request->input('no_hp'),
                    'email' => $request->input('email'),
                ]
            );
        return redirect('/member');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Member::where('id', $id)->delete();

        return redirect('/member');
    }
}

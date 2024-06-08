<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Member;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::all();

        return view('peminjaman.tampil', ['peminjaman' => $peminjaman]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $member = Member::get();
        $buku = Buku::get();
        return view('peminjaman.tambah', ['member' => $member, 'buku' => $buku]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'tanggal_pinjaman' => 'required',
                'tanggal_pengembalian' => 'nullable',
                'member_id' => 'required',
                'buku_id' => 'required',

            ],
            [
                'tanggal_pinjaman.required' => 'Tanggal tidak boleh kosong!',
                'member_id.required' => 'Member Id tidak boleh kosong!',
                'buku_id.required' => 'Buku Id tidak boleh kosong!',

            ]
        );

        $peminjaman = new Peminjaman;
        $peminjaman->tanggal_pinjaman = $request->input('tanggal_pinjaman');
        $peminjaman->tanggal_pengembalian = $request->input('tanggal_pengembalian');
        $peminjaman->member_id = $request->input('member_id');
        $peminjaman->buku_id = $request->input('buku_id');

        $peminjaman->save();

        return redirect('/peminjaman');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $peminjaman = Peminjaman::find($id);

        return view('peminjaman.detail', ['peminjaman' => $peminjaman]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $peminjaman = Peminjaman::find($id);
        $member = Member::get();

        $buku = Buku::get();

        return view('peminjaman.edit', ['peminjaman' => $peminjaman, 'member' => $member, 'buku' => $buku]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'tanggal_pinjaman' => 'required',
                'tanggal_pengembalian' => 'nullable',
                'member_id' => 'required',
                'buku_id' => 'required',

            ],
            [
                'tanggal_pinjaman.required' => 'Tanggal tidak boleh kosong!',
                'member_id.required' => 'Member Id tidak boleh kosong!',
                'buku_id.required' => 'Buku Id tidak boleh kosong!',

            ]
        );

        Peminjaman::where('id', $id)
            ->update(
                [
                    'tanggal_pinjaman' => $request->input('tanggal_pinjaman'),
                    'tanggal_pengembalian' => $request->input('tanggal_pengembalian'),
                    'member_id' => $request->input('member_id'),
                    'buku_id' => $request->input('buku_id'),

                ]
            );
        return redirect('/peminjaman');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Peminjaman::where('id', $id)->delete();

        return redirect('/peminjaman');
    }
}

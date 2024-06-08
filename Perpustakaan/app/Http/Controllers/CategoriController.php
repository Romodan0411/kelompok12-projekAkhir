<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categori;
use App\Models\Buku;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categori = Categori::all();

        if ($request->has('search')) {
            $categori = Categori::where('nama', 'like', '%' . $request->search . '%')->get();
        }

        return view('categori.tampil', ['categori' => $categori]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|min:5',
                'deskripsi' => 'required',
            ]
        );

        $categori = new Categori;

        $categori->nama = $request->input('nama');
        $categori->deskripsi = $request->input('deskripsi');

        $categori->save();

        return redirect('/categori');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categori = Categori::find($id);

        return view('categori.detail', ['categori' => $categori]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categori = Categori::find($id);

        return view('categori.edit', ['categori' => $categori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required|min:5',
                'deskripsi' => 'required',
            ]
        );

        Categori::where('id', $id)
            ->update(
                [
                    'nama' => $request->input('nama'),
                    'deskripsi' => $request->input('deskripsi'),
                ]
            );
        return redirect('/categori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categori::where('id', $id)->delete();

        return redirect('/categori');
    }
}

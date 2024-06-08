<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Categori;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $buku = Buku::all();

        return view('buku.tampil', ['buku' => $buku]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Categori::all();
        return view('buku.tambah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'deskripsi' => 'required',
            'cover' => 'nullable',
        ]);
        $data = new buku();
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move(public_path('img/buku'), $filename);
            $data->cover = $filename;
        }
        $data->judul = $request->judul;
        $data->pengarang = $request->pengarang;
        $data->deskripsi = $request->deskripsi;
        $data->save();
        $data->kategori()->sync($request->kategori);
        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Buku::find($id);
        return view('buku.detail', ['buku' => $buku]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $buku = Buku::find($id);
        $data2 = Categori::all();
        return view('buku.edit', compact('buku', 'data2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Buku::find($id);
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'deskripsi' => 'required',
            'cover' => 'nullable',
        ]);

        if ($request->hasFile('cover')) {
            // hapus cover lama
            if ($data->cover && file_exists(public_path('img/buku/' . $data->cover))) {
                unlink(public_path('img/buku/' . $data->cover));
            }

            $file = $request->file('cover');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move(public_path('img/buku'), $filename);
            $data->cover = $filename;
        }
        $data->judul = $request->judul;
        $data->pengarang = $request->pengarang;
        $data->deskripsi = $request->deskripsi;
        $data->update();
        $data->kategori()->sync($request->kategori);
        return redirect('/buku')->with('success', 'Buku berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Buku::where('id', $id)->delete();

        return redirect('/buku');
    }
}

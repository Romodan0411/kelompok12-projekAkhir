<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

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
        return view('buku.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            
        ],
        [
            'judul.required' =>'judul harus diisi tidak boleh kosong',
            'pengarang.required' =>'pengarang harus diisi tidak boleh kosong',
        ]);

        $buku = new Buku;
 
        $buku->judul = $request->input('judul');
        $buku->pengarang = $request->input('pengarang');
        $buku->save();
 
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
        return view('buku.edit', ['buku' => $buku]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
        ],
        [
            'judul.required' =>'judul harus diisi tidak boleh kosong',
            'pengarang.required' =>'pengarang harus diisi tidak boleh kosong',
        ]);


        Buku::where('id', $id)
        ->update(
            [
                'judul' => $request->input('judul'),
                'pengarang' => $request->input('pengarang'),
            ]
            );

            return redirect('/buku');

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

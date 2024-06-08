@extends('dashboard.layouts.main')

@section('main-title')
    Peminjaman
@endsection

@section('title')
    Detail Peminjaman
@endsection

@section('content')
    <h5>Detail Member Peminjam</h5>
    <table class="table table-bordered">
        <tr>
            <th>Nama :</th>
            <td>{{ $peminjaman->member->nama }}</td>
        </tr>
        <tr>
            <th style="width: 150px;">Alamat :</th>
            <td>{{ $peminjaman->member->alamat }}</td>
        </tr>
        <tr>
            <th>No Handphone :</th>
            <td>{{ $peminjaman->member->no_hp }}</td>
        </tr>
        <tr>
            <th>Email :</th>
            <td>{{ $peminjaman->member->email }}</td>
        </tr>
    </table>
    <br>
    <h5>Detail Waktu Peminjaman</h5>
    <table class="table table-bordered">
        <tr>
            <th>Tanggal Peminjaman :</th>
            <td>{{ $peminjaman->tanggal_pinjaman }}</td>
        </tr>
        <tr>
            <th style="width: 150px;">Tanggal Pengembalian :</th>
            <td>{{ $peminjaman->tanggal_pengembalian }}</td>
        </tr>
    </table>
    <br>
    <h5>Detail Buku Pinjaman</h5>

    <div class="card">
        <div class="row">
            <div class="col-md-auto"><img src="{{ asset('img/buku/' . $peminjaman->buku->cover) }}" class="img-fluid p-3"
                    alt="card images">
            </div>
            <div class="col-md">
                <p class="card-text">Kategori :
                    @foreach ($peminjaman->buku->kategori as $k)
                        <a href="{{ route('categori.show', $k->id) }}" class="badge text-bg-primary">{{ $k->nama }}</a>
                    @endforeach
                </p>
                <p class="card-text">Pengarang : {{ $peminjaman->buku->pengarang }}</p>
                <hr>
                <p class="card-text">Deskripsi : {{ $peminjaman->buku->deskripsi }}</p>
            </div>
        </div>
    </div>

    <a href="{{ route('peminjaman.index') }}" class="btn btn-primary btn-sm">Kembali</a>
@endsection

@extends('dashboard.layouts.main')

@section('main-title')
    Member
@endsection

@section('title')
    Detail Member
@endsection

@section('content')
    <table class="table table-bordered">
        <tr>
            <th>Nama :</th>
            <td>{{ $member->nama }}</td>
        </tr>
        <tr>
            <th style="width: 150px;">Alamat :</th>
            <td>{{ $member->alamat }}</td>
        </tr>
        <tr>
            <th>No Handphone :</th>
            <td>{{ $member->no_hp }}</td>
        </tr>
        <tr>
            <th>Email :</th>
            <td>{{ $member->email }}</td>
        </tr>
    </table>
    <br>
    <h3>Daftar Peminjaman</h3>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($member->peminjaman as $peminjaman)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $peminjaman->buku->judul }}</td>
                    <td>{{ $peminjaman->tanggal_pinjaman }}</td>
                    <td>{{ $peminjaman->tanggal_pengembalian }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="{{ route('member.index') }}" class="btn btn-primary">Kembali</a>
@endsection

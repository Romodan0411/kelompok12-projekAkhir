@extends('dashboard.layouts.main')

@section('content')
<h1>Member ID : {{$peminjaman->member_id}}</h1>
<p>Tanggal Peminjaman :{{$peminjaman->tanggal_pinjaman}}</p>
<p>Tanggal Pengembalian :{{$peminjaman->tanggal_pengembalian}}</p>

<a href="/peminjaman" class="btn btn-primary btn-sm">Kembali</a>
    
@endsection
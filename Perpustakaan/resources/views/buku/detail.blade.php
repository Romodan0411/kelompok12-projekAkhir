@extends('dashboard.layouts.main')
@section('content')

<h3>{{ $buku->judul}}</h3>
<p>{{ $buku->pengarang}}</p>

<a href="/buku" class="btn btn-secondary btn-sm">kembali</a>
@endsection
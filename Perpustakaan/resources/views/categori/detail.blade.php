@extends('dashboard.layouts.main')

@section('main-title')
    Kategori
@endsection

@section('title')
    Detail Kategori
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail kategori</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h3>{{ $categori->nama }}</h3>
            <p>{{ $categori->deskripsi }}</p>
            <hr>
            <h4>Daftar Buku</h4>
            <div class="row row-cols-sm-4">
                @foreach ($categori->buku as $d)
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('img/buku/' . $d->cover) }}" alt="card images" class="card-img shadow border"
                                width="350" height="300">
                            <div class="card-body">
                                <h4>{{ $d->judul }}</h4>
                                <hr>
                                <p class="card-text">
                                    Pengarang : {{ $d->pengarang }}
                                </p>
                                <a href="{{ route('buku.show', $d->id) }}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

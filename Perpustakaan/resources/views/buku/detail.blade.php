@extends('dashboard.layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">data Kategori</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <h1>{{ $buku->judul }}</h1>
                            <hr>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-auto"><img src="{{ asset('img/buku/' . $buku->cover) }}" class="img-fluid"
                                alt="card images">
                        </div>
                        <div class="col-md">
                            <p class="card-text">Kategori :
                                @foreach ($buku->kategori as $k)
                                    <a href="{{ route('categori.show', $k->id) }}"
                                        class="badge text-bg-primary">{{ $k->nama }}</a>
                                @endforeach
                            </p>
                            <p class="card-text">Pengarang : {{ $buku->pengarang }}</p>
                            <hr>
                            <p class="card-text">Deskripsi : {{ $buku->deskripsi }}</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('buku.index') }}" class="btn btn-success">kembali</a>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

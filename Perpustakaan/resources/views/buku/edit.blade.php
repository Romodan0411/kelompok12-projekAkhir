@extends('dashboard.layouts.main')

@section('main-title')
    Buku
@endsection

@section('title')
    Edit Buku
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Buku</h3>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- /.card-header -->
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="judul" class="form-label">judul Buku</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                value="{{ $buku->judul }}">
                        </div>
                        <div class="form-check">
                            <label>Kategori</label>
                            <br>
                            @foreach ($data2 as $k)
                                <input class="form-check-input" type="checkbox" value="{{ $k->id }}"
                                    id="kategori{{ $k->id }}" name="kategori[]">
                                <label class="form-check-label" for="kategori{{ $k->id }}">
                                    {{ $k->nama }}
                                </label>
                                <br>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label for="pengarang" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" id="pengarang" name="pengarang"
                                value="{{ $buku->pengarang }}">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi">{{ $buku->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Sampul Buku</label>
                            <input class="form-control" type="file" id="formFile" name="cover">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('buku.index') }}" class="btn btn-success">kembali</a>
                    </form>
                </div>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

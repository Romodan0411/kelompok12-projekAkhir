@extends('dashboard.layouts.main')

@section('main-title')
    Kategori
@endsection

@section('title')
    Tambah Kategori
@endsection

@section('content')
    <form method="POST" action="/categori">
        {{-- Validation --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Input --}}
        @csrf
        <div class="form-group">
            <label>Nama Categori </label>
            <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group">
            <label>Nama Categori </label>
            <input type="text" class="form-control" name="deskripsi">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@extends('dashboard.layouts.main')

@section('main-title')
    Buku
@endsection

@section('title')
    Daftar Buku
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm">
                    @auth
                        <a href="{{ route('buku.create') }}" class="btn btn-primary mb-2">Tambah Buku</a>
                    @endauth
                </div>
                <div class="col-sm">

                </div>
                <div class="col-sm">
                    <form action="{{ route('buku.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari Buku"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row row-cols-4">

                @forelse ($buku as $d)
                    <div class="col">
                        <div class="card">
                            @php
                                $cover = 'img/buku/' . $d->cover;
                                $coverPath = public_path($cover);
                                $cover = file_exists($coverPath) ? $cover : 'img/fff.png';
                            @endphp
                            <img src="{{ asset($cover) }}" alt="card images" class="card-img shadow border" width="350"
                                height="300">
                            <div class="card-body">
                                <h4>{{ $d->judul }}</h4>
                                <hr>
                                <ul>
                                    <li class="card-text">
                                        Kategori :
                                        @foreach ($d->kategori as $k)
                                            {{ $k->nama }}{{ $loop->last ? '' : ', ' }}
                                        @endforeach
                                    </li>
                                    <li class="card-text">
                                        Pengarang : {{ $d->pengarang }}
                                    </li>
                                </ul>
                                <a href="{{ route('buku.show', $d->id) }}" class="btn btn-primary">Detail</a>
                                @auth
                                    <a href="{{ route('buku.edit', $d->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('buku.destroy', $d->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                @empty
                    <h3>data buku kosong</h3>
                @endforelse
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

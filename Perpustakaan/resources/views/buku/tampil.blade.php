@extends('dashboard.layouts.main')

@section('content')

    <a href="/buku/create" class="btn btn-sm btn-primary">Tambah Data</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Gambar</th>
                <th scope="col">Judul</th>
                <th scope="col">Pengarang</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($buku as $key => $item)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>
                        @if($item->gambar)
                        <div class="image">
                            <img src="{{ asset($item->gambar) }}" class="img-circle elevation-2"
                                alt="{{ $item->judul }} Image">
                        </div>
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->pengarang }}</td>
                    <td>
                        <form action="/buku/{{$item->id}}" method="POST">
                            <a href="/buku/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                            <a href="/buku/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            @csrf
                            @method("Delete")
                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Buku belum ada</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection

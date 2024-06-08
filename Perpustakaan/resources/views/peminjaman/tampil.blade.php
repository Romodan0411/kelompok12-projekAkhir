@extends('dashboard.layouts.main')

@section('main-title')
    Peminjaman
@endsection

@section('title')
    Daftar Peminjaman
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    @auth
        <a href="/peminjaman/create" class="btn btn-sm btn-primary mb-2">Tambah Data</a>
    @endauth
    <div class="card p-2">
        <table class="table table-striped" id="peminjaman">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama peminjam</th>
                    <th scope="col">judul buku</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tanggal Pengembalian</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($peminjaman as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->member->nama }}</td>
                        <td>{{ $item->buku->judul }}</td>
                        <td>{{ $item->tanggal_pinjaman }}</td>
                        <td>{{ $item->tanggal_pengembalian }}</td>
                        <td>
                            <form action="/peminjaman/{{ $item->id }}" method="POST">
                                <a href="{{ route('peminjaman.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                @auth
                                    <a href="/peminjaman/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    @csrf
                                    @method('Delete')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                @endauth
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Tabel Peminjaman Belum Tersedia!</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection

@push('js')
    <script src="{{ asset('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function() {
            $("#peminjaman").DataTable();
        });
    </script>
@endpush

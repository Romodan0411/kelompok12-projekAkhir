@extends('dashboard.layouts.main')

@section('title')
    Daftar Member
@endsection

@section('main-title')
    Member
@endsection

@section('content')
    @auth
        <a href="/member/create" class="btn btn-sm btn-primary mb-2">Tambah</a>
    @endauth

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Handphone</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($member as $key => $item)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <form action="/member/{{ $item->id }}" method="POST">
                            <a href="{{ route('member.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                            @auth
                                <a href="/member/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                @csrf
                                @method('Delete')
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                            @endauth
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Tabel Cast Belum Tersedia!</td>
                </tr>
            @endforelse

        </tbody>
    </table>
@endsection

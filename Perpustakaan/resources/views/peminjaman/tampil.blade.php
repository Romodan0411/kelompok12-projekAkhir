@extends('dashboard.layouts.main')

@section('content')
<a href="/peminjaman/create" class="btn btn-sm btn-primary">Tambah Data</a>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Member</th>
        <th scope="col">Tanggal Peminjaman</th>
        <th scope="col">Tanggal Pengembalian</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($peminjaman as $key => $item)
      <tr>
        <td>{{$item->member_id}}</td>
        <td>{{$item->tanggal_pinjaman}}</td>
        <td>{{$item->tanggal_pengembalian}}</td>
        <td>
            <form action="/peminjaman/{{$item->id}}" method="POST">
                <a href="/peminjaman/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                <a href="/peminjaman/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                @csrf
                @method("Delete")
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
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
@endsection
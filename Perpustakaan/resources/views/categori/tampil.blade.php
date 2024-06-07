@extends('dashboard.layouts.main')

@section('content')
<a href="/categori/create" class="btn btn-sm btn-primary">Tambah</a>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Kategori</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($categori as $key => $item)
      <tr>
        <th scope="row">{{$key + 1}}</th>
        <td>{{$item->nama}}</td>
        <td>
            <form action="/categori/{{$item->id}}" method="POST">
                <a href="/categori/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                <a href="/categori/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                @csrf
                @method("Delete")
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
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
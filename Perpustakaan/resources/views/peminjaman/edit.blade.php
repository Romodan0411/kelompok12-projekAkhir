@extends('dashboard.layouts.main')

@section('content')
<form method="POST" action="/peminjaman/{{$peminjaman->id}}">
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
    @method("put")
    <div class="form-group">
        <label >Member</label>
        <select name="member_id" class="form-control" id="">
            <option value="">---Pilih Nama Anda---</option>
            @forelse ($member as $item)
                @if ($item->id === $peminjaman->member_id)
                    <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                @else
                    <option value="{{$item->id}}">{{$item->nama}}</option>
                @endif
                  
            @empty
                Tidak ada Members
            @endforelse
        </select>
    </div>
    <div class="form-group">
      <label >Tanggal Peminjaman </label>
      <input type="date" value="{{$peminjaman->tanggal_pinjaman}}" class="form-control" name="tanggal_pinjaman">
    </div>
    <div class="form-group">
      <label >Tanggal Pengembalian</label>
      <input type="date" value="{{$peminjaman->tanggal_pengembalian}}" class="form-control" name="tanggal_pengembalian">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
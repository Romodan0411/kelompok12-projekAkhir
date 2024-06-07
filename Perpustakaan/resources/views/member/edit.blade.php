@extends('dashboard.layouts.main')

@section('content')
<form method="POST" action="/member/{{$member->id}}">
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
      <label >Nama </label>
      <input type="text" value="{{$member->nama}}" class="form-control" name="nama">
    </div>
    <div class="form-group">
      <label >Alamat</label>
      <textarea name="alamat" class="form-control" id="" cols="30" rows="10">{{$member->alamat}}</textarea>
    </div>
    <div class="form-group">
      <label >No Handphone</label>
      <input type="number" value="{{$member->no_hp}}"class="form-control" name="no_hp">
    </div>
    <div class="form-group">
      <label >Email</label>
      <input type="text" value="{{$member->email}}"class="form-control" name="email">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
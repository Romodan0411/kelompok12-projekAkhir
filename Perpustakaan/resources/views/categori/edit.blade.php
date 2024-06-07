@extends('dashboard.layouts.main')

@section('content')
<form method="POST" action="/categori/{{$categori->id}}">
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
      <label >Nama Kategori</label>
      <input type="text" value="{{$categori->nama}}" class="form-control" name="nama">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
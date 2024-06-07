@extends('dashboard.layouts.main')
@section('content')

<form method="POST" action="/buku/{{$buku->id}}">

    {{-- untuk Validation --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Ini Form Inputnya --}}
    @csrf
    @method("put")
    <div class="form-group">
      <label>Judul</label>
      <input type="text" value="{{$buku->judul}}" class="form-control" name="judul">
    </div>
    <div class="form-group">
        <label>Pengarang</label>
        <input type="text" value="{{$buku->pengarang}}" class="form-control" name="pengarang">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection



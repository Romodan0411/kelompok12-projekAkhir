@extends('dashboard.layouts.main')

@section('content')
<h1>{{$member->nama}}</h1>
<p>{{$member->alamat}}</p>
<p>{{$member->no_hp}}</p>
<p>{{$member->email}}</p>
    
@endsection
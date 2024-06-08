@extends('dashboard.layouts.main')

@section('main-title')
    Peminjaman
@endsection

@section('title')
    Buat Peminjaman
@endsection

@section('content')
    <form method="POST" action="/peminjaman">
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
        <div class="form-group">
            <label>Member</label>
            <select name="member_id" class="form-control" id="">
                <option value="">---Pilih Nama Anda---</option>
                @forelse ($member as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @empty
                    Tidak ada Members
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label>buku</label>
            <select name="buku_id" class="form-control" id="">
                <option value="">---Pilih Buku---</option>
                @forelse ($buku as $item)
                    <option value="{{ $item->id }}">{{ $item->judul }}</option>
                @empty
                    Tidak ada Members
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Peminjaman </label>
            <input type="date" class="form-control" name="tanggal_pinjaman">
        </div>
        <div class="form-group">
            <label>Tanggal Pengembalian</label>
            <input type="date" class="form-control" name="tanggal_pengembalian">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

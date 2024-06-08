@extends('dashboard.layouts.main')

@section('title')
    About
@endsection

@section('main-title')
    Halaman About
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card m-3 p-3" style="background-color: #f8f9fa">
            <h1 class="text-center">About me</h1>
            <br>
            <h6 class="text-center">Aplikasi web ini dibuat sebagai final projek dari Bootcamp SanberCode,dengan nama
                kelompok,
                <strong>Kelompok
                    12</strong>
            </h6>
            <hr>
            <h3 class="text-center">Anggota Kelompok</h3>
            <ul class="list-group list-group-flush mx-auto" style="width: 20rem; display: flex; justify-content: center;">
                <li class="list-group-item text-center"><a href="https://github.com/muhammadfajri01" target="_blank"
                        class="text-dark">Muhammad
                        Fajri</a>
                </li>
                <li class="list-group-item text-center"><a href="https://github.com/Romodan0411" target="_blank"
                        class="text-dark">Muhammad
                        Romodan</a>
                </li>
                <li class="list-group-item text-center"><a href="https://github.com/AulyaNuraini" target="_blank"
                        class="text-dark">Aulya
                        Nuraini</a>
                </li>
                <li class="list-group-item text-center"><a href="https://github.com/Adesuriani10" target="_blank"
                        class="text-dark">Ade
                        Suriani</a>
                </li>
            </ul>
        </div>
    </div>
@endsection

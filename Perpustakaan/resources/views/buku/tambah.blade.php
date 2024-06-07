@extends('dashboard.layouts.main')
@section('content')
    <form method="POST" action="/buku">
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
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar" accept="img/*" onchange="previewImage(event)">
        </div>
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="judul">
        </div>
        <div class="form-group">
            <label>Pengarang</label>
            <input type="text" class="form-control" name="pengarang">
            </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
        </script>
@endsection
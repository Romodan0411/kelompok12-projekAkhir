@extends('dashboard.layouts.main')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
@endpush
@push('js')
<script src="{{asset('/lte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/lte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script>
  $(function () {
    $("#users").DataTable();
  });
</script>
@endpush

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="users" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection

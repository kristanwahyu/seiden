@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
@endpush

@section('title', 'Dashboard')

@section('sidebar')
    @include('sidebar.admin')
@endsection

@section('content')
  <div class="main-content">
      <div class="container-fluid">
        <div class="jumbotron">
          <h1>Selamat Datang DiHalaman Dashboard Admin DIPA PAPUA</h1>
        </div>
      </div>
  </div>
@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
@endpush

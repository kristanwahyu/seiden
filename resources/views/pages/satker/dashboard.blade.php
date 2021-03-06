@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'Dashboard')

@section('sidebar')
    @include('sidebar.satker')
@endsection

@section('content')
  <div class="main-content">
      <div class="container-fluid">
        <div class="jumbotron">
          <h1>Selamat Datang Di Halaman Dashboard SATKER DIPA PAPUA</h1>
        </div>
      </div>
  </div>
@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.js') }}" charset="UTF-8"></script>
@endpush

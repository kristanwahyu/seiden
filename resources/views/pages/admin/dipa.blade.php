@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'DIPA')

@section('sidebar')
    @include('sidebar.admin')
@endsection

@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{-- Breadcrumb --}}
                <div class="breadcrumb-wrapper">
                    <ul class="breadcrumb">
                        <li><a href=""><i class="fa fa-home fa-fw"></i></a></li>
                        <li class="active-bread">DIPA</li>
                    </ul>
                </div>
                {{-- End Breadcrumb --}}

                {{-- awal tabel DIPA --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">DIPA</h3>
                    </div>
                    {{-- awal panel body --}}
                    <div class="panel-body">
                        <div class="text-right">
                        <span class="label label-primary">Tahun Aktif : 2017</span>
                    </div>
                    <br>
                    {{-- awal pembungkus tabel DIPA --}}
                    <div class="table-responsive">
                            <table class="table table-bordered table-condensed table-striped" id="myTable">

                      </table>
                    </div> {{-- akhir pembungkus tabel DIPA --}}
                    </div> {{-- akhir panel body --}}
                </div> {{-- akhir tabel DIPA --}}
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.js') }}" charset="UTF-8"></script>

<script>
$(function(){
  'use strict';
  var data = [
      [
        "1",
        "SAT001",
        "Satuan Kerja-1",
        `<a href="{{ url('/dipa/dipa-program') }}" class="btn btn-success" role="button"> Pilih</a>`
      ],
      [
        "2",
        "SAT002",
        "Satuan Kerja-2",
        `<a href="{{ url('/dipa/dipa-program') }}" class="btn btn-success" role="button"> Pilih</a>`
      ],
      [
          "3",
          "SAT003",
          "Satuan Kerja-3",
          `<a href="{{ url('/dipa/dipa-program') }}" class="btn btn-success" role="button"> Pilih</a>`
      ],
    ];

  $('#myTable').DataTable({
      "data" : data,
      "columns" : [
          { "title" : "#", "width" : "2%" },
          { "title" : "KODE SATUAN KERJA" },
          { "title" : "SATUAN KERJA" },
          { "title" : "AKSI","width" : "5%", "orderable": false }
      ]
  });

});
</script>
@endpush

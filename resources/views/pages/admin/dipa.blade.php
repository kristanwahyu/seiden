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
              {{-- awal tabel DIPA --}}
              <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">DIPA</h3>
                </div>
                {{-- awal panel body --}}
                <div class="panel-body">
                  <div class="text-right">
                      <button class="btn btn-primary" data-toggle="modal" href='#modal-tambah'><i class="fa fa-plus"></i> Tambah</button>
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
        `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-pilih'> PILIH</button>`
      ],
      [
        "2",
        "SAT002",
        "Satuan Kerja-2",
        `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-pilih'> PILIH</button>`
      ],
      [
          "3",
          "SAT003",
          "Satuan Kerja-3",
          `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-pilih'> PILIH</button>`
      ],
    ];

  $('#myTable').DataTable({
      "data" : data,
      "columns" : [
          { "title" : "#", "width" : "2%" },
          { "title" : "KODE" },
          { "title" : "SATUAN KERJA" },
          { "title" : "ACTION","width" : "5%", "orderable": false }
      ]
  });

});
</script>
@endpush

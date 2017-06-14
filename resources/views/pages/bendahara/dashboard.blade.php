@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'Dashboard Bendahara')

@section('sidebar')
    @include('sidebar.bendahara')
@endsection

@section('content')
  <div class="main-content">
      <div class="breadcrumb-wrapper">
          <ul class="breadcrumb">
              <li class="active-bread"><a href=""><i class="fa fa-home fa-fw"></i></a></li>
          </ul>
      </div>
      {{-- End Breadcrumb --}}
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title">Bendahara</h3>
                  </div>
                  {{-- awal panel body --}}
                  <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed table-striped" id="myTable">

                        </table>
                    </div>

                    {{-- akhir pembungkus form --}}
                  </div> {{-- akhir panel body --}}
                </div> {{-- EDN PANEL --}}
              </div> {{-- END COL-MD-12 --}}
          </div> {{-- END ROW --}}
      </div> {{-- END CONTAINER FLUID --}}
  </div>
@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script>
'use strict';

var data = [
  [
      "1",
      "123.456.789.001",
      "Penbayaran Dana - Belanja Gaji - 2 Orang",
      "2",
      "Orang",
      "Rp. 1.500.000",
      "Rp. 3.000.000",
      "Rp. 3.000.000",
      `<div class='text-center'><span class='label label-success' style='font-size:12px'>UP</span></div>`
  ],
  [
      "2",
      "123.456.789.002",
      "Penbayaran Dana - Belanja Non Gaji - 3 Orang",
      "3",
      "Orang",
      "Rp. 500.000",
      "Rp. 1.500.000",
      "Rp. 1.500.000",
      `<div class='text-center'><span class='label label-success' style='font-size:12px'>UP</span></div>`
  ],
];

$('#myTable').DataTable({
  "data": data,
  "columns" : [
    { "title": "NO", "width": "1%" },
    { "title": "KODE" },
    { "title": "RINCIAN" },
    { "title": "VOL" },
    { "title": "SATUAN" },
    { "title": "NILAI" },
    { "title": "TOTAL" },
    { "title": "DIBAYAR" },
    { "title": "JENIS BAYAR" }
  ]
});
</script>
@endpush

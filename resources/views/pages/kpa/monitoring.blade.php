@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'Detail KPA')

@section('sidebar')
    @include('sidebar.kpa')
@endsection

@section('content')
  {{-- AWAL MAIN CONTENT --}}
<div class="main-content">
    {{-- Breadcrumb --}}
    <div class="breadcrumb-wrapper">
        <ul class="breadcrumb">
            <li><a href="{{ url('/dashboard-kpa') }}"><i class="fa fa-home fa-fw"></i></a></li>
            <li><a href="{{ url('/detail') }}">Data Monitoring</a></li>
            <li class="active-bread"><a href="">Detail Data Monitoring</a></li>
        </ul>
    </div>
    {{-- End Breadcrumb --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- awal tabel detail --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Detail Data Monitoring</h3>
                    </div>
                    {{-- awal panel body --}}
                    <div class="panel-body">
                        <div class="row detail-box">
                          <div class="col-md-6">
                              <table class="table table-borderless detail-table no-margin">
                                  <tbody>
                                    <tr>
                                        <td>TAHUN ANGGARAN</td>
                                        <td>:</td>
                                        <td>2017</td>
                                    </tr>
                                    <tr>
                                        <td>SATUAN KERJA</td>
                                        <td>:</td>
                                        <td>SATKER01 / Satuan Kerja 01</td>
                                    </tr>
                                    <tr>
                                        <td>PROGRAM</td>
                                        <td>:</td>
                                        <td>PRG001 / Program 001</td>
                                    </tr>
                                    <tr>
                                        <td>KEGIATAN</td>
                                        <td>:</td>
                                        <td>KGT001 / Kegiatan 001</td>
                                    </tr>
                                    <tr>
                                        <td>OUTPUT</td>
                                        <td>:</td>
                                        <td>OP001 / Output 001</td>
                                    </tr>
                                    <tr>
                                        <td>SUB OUTPUT</td>
                                        <td>:</td>
                                        <td>SOP001.1 / Sub Output 001.1</td>
                                    </tr>
                                    <tr>
                                        <td>KOMPONEN</td>
                                        <td>:</td>
                                        <td>KP001 / Komponen 001</td>
                                    </tr>
                                    <tr>
                                        <td>SUB KOMPONEN</td>
                                        <td>:</td>
                                        <td>KP001.1 / Sub Komponen 001.1</td>
                                    </tr>
                                    <tr>
                                        <td>AKUN</td>
                                        <td>:</td>
                                        <td>AK001 / Akun 001</td>
                                    </tr>
                                  </tbody>
                              </table>
                          </div>
                        </div>
{{-- LOAD PAKE AJAX --}}
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <span class="btn-detail-open-text"></span> &nbsp;
                                <div class="btn-detail btn-active"><i class="fa fa-chevron-up"></i></div>
                            </div>
                        </div><br>

                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed table-striped" id="myTable">

                            </table>
                        </div>
                    </div>
                    {{-- akhir panel body --}}

                    <div class="panel-footer clearfix">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ url('/detail') }}" class="btn btn-warning" role="button"><i class="fa fa-reply"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div> {{-- akhir tabel DIPA --}}
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MAIN CONTENT --}}

@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('vendor/cleave.js/cleave.min.js') }}"></script>

<script>
'use strict';

var data = [
  [
      "1",
      "UP",
      "Rp. 1.500.000",
      "001",
      "20 Januari 2017",
      "Rp. 3.000.000",
      "Contoh Keterangan SPP",
      "001",
      "20 Januari 2017",
      "Rp. 3.000.000",
      "Contoh Keterangan SPM",
      "001",
      "20 Januari 2017",
      "Rp. 3.000.000",
      "Contoh Keterangan SP2d"
  ],
  [
      "2",
      "LS",
      "Rp. 1.500.000",
      "002",
      "21 Januari 2017",
      "Rp. 3.000.000",
      "Contoh Keterangan SPP",
      "002",
      "22 Januari 2017",
      "Rp. 3.000.000",
      "Contoh Keterangan SPM",
      "002",
      "22 Januari 2017",
      "Rp. 3.000.000",
      "Contoh Keterangan SP2d"
  ],
];

$('#myTable').DataTable({
  "data": data,
  "columns" : [
    { "title": "NO", "width": "1%" },
    { "title": "JENIS BAYAR" },
    { "title": "JUMLAH" },
    { "title": "NO SPP" },
    { "title": "TANGGAL SPP" },
    { "title": "NILAI SPP" },
    { "title": "KETERANGAN SPP" },
    { "title": "NO SPM" },
    { "title": "TANGGAL SPM" },
    { "title": "NILAI SPM" },
    { "title": "KETERANGAN SPM" },
    { "title": "NO SP2D" },
    { "title": "TANGGAL SP2D" },
    { "title": "NILAI SP2D" },
    { "title": "KETERANGAN SP2D" }
  ]
});
</script>
@endpush

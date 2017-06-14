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
  "processing": true,
    "serverSide": true,
    "ajax":{
      type: "GET",
      url: "{{asset('/dipa-bendahara/1')}}"
    },
  "columns" : [
    {
      title: "NO",
        data: "DT_Row_Index",
        orderable: false,
        searchable: false,
        width: "1%",
        render: function(data){
          return "<center>"+data+".</center>";
        }
    },
    {
      title: "KODE",
        data: null,
        defaultContent: "-",
        render: function(data){
          var satu=data.akun_detail.akun.dipa_kode_akun;
          var dua=data.akun_detail.akun.sub_komponen.dipa_kode_sub_komponen;
          var tiga=data.akun_detail.akun.sub_komponen.komponen.dipa_kode_komponen;
          var empat=data.akun_detail.akun.sub_komponen.komponen.sub_output.dipa_kode_sub_output;
          var lima=data.akun_detail.akun.sub_komponen.komponen.sub_output.output.dipa_kode_output;
          var enam=data.akun_detail.akun.sub_komponen.komponen.sub_output.output.kegiatan.dipa_kode_kegiatan;
          var tujuh=data.akun_detail.akun.sub_komponen.komponen.sub_output.output.kegiatan.program.dipa_kode_program;
          var delapan=data.akun_detail.akun.sub_komponen.komponen.sub_output.output.kegiatan.program.satuan_kerja.dipa_kode_satuan_kerja;
          var kode=delapan+"."+tujuh+"."+enam+"."+lima+"."+empat+"."+tiga+"."+dua+"."+satu;
          return kode;
        }
    },
    {
      title: "RINCIAN",
        data: null,
        defaultContent: "-",
        render: function(data){
          var satu=data.akun_detail.akun.dipa_nama_akun;
          var dua=data.akun_detail.dipa_jenis_akun==1?"Belanja Gaji":"Belanja Non Gaji";
          var tiga=data.akun_detail.dipa_volume;
          var empat=data.akun_detail.dipa_satuan;
          var rincian=satu+" | "+dua+" | "+tiga+" "+empat;
          return rincian;
        }
    },
    {
      "title": "VOL",
        data: "akun_detail.dipa_volume",
        defaultContent:"-"
    },
    {
      "title": "VOL",
        data: "akun_detail.dipa_satuan",
        defaultContent:"-"
    },
    {
      "title": "NILAI",
        data: null,
        defaultContent:"-",
        render: function(data){
          var number = data.akun_detail.dipa_harga_satuan;
          var number_change = formatNumber(number);
          var currency = `<div><div class="pull-left">Rp.</div> <div class="pull-right">${number_change}</div></div>`;
          return currency;
        },
        width: "10%"
    },
    {
      "title": "TOTAL",
        data: null,
        defaultContent: '-',
        render: function(data){
          var nilai= data.akun_detail.dipa_harga_satuan;
          var volume= data.akun_detail.dipa_volume;
          var total= nilai*volume;
          var number_change = formatNumber(total.toString());
          var currency = '<div><div class="pull-left">Rp.</div> <div class="pull-right">'+number_change+'</div></div>';
          return currency;
        },
        width: "10%"
    },
    {
      title: "DIBAYAR",
        data: null,
        defaultContent: '-',
        render: function(data){
          var pmb= formatNumber(data.dipa_pembayaran_nilai);
          var pmbb='<div><div class="pull-left">Rp.</div> <div class="pull-right">'+pmb+'</div></div>';
          return pmbb;
        },
        width: "10%"
    }
    // {
    //   "title": "JENIS BAYAR",
    //   data: null,
    //   defaultContent: '-',
    //   render: function($data){
    //     var html="<div class='text-center'><span class='label label-success' style='font-size:12px'>UP</span></div>";
    //     return html;
    //   }
    // }
  ]
});
function formatNumber(x) {
      return x.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
</script>
@endpush

@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'Dashboard PPSPM')

@section('sidebar')
    @include('sidebar.ppspm')
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
                      <h3 class="panel-title">Daftar SPM Yang Harus Dibayar</h3>
                  </div>
                  {{-- awal panel body --}}
                  <div class="panel-body">
                    {{-- awal pembungkus tabel --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed table-striped" id="myTable1">

                        </table>
                    </div> {{-- akhir pembungkus tabel --}}
                    <hr>
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar SP2D Yang Harus Dibayar</h3>
                    </div><br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed table-striped" id="myTable2">

                        </table>
                    </div> {{-- akhir pembungkus tabel --}}

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
<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.js') }}" charset="UTF-8"></script>

<script>
  function angka(data){
    data=data+1;
    return data;
  }
  var table1 = $('#myTable1').DataTable({
    // "data": data1,
    "processing": true,
    "serverSide": true,
    "ajax":{
      type: "GET",
      url: "{{asset('/dipa-spm')}}"
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
        name: 'kode',
        data: "kode",
        defaultContent: "-"
      },
      {
        title: "RINCIAN",
        data: 'rincian',
        name: 'rincian',
        defaultContent: "-"
      },
      {
        "title": "VOL",
        data: "pembayaranspp.akun_detail.dipa_volume",
        name: "pembayaranspp.akun_detail.dipa_volume",
        defaultContent:"-"
      },
      {
        "title": "NILAI",
        data: null,
        name: 'pembayaranspp.akun_detail.dipa_harga_satuan',
        defaultContent:"-",
        render: function(data){
          var number = data.pembayaranspp.akun_detail.dipa_harga_satuan;
          var number_change = formatNumber(number);
          var currency = `<div><div class="pull-left">Rp.</div> <div class="pull-right">${number_change}</div></div>`;
          return currency;
        },
        width: "10%"
      },
      {
        "title": "TOTAL",
        data: null,
        name: 'total',
        defaultContent: '-',
        render: function(data){
          var number_change = formatNumber(data.total);
          var currency = '<div><div class="pull-left">Rp.</div> <div class="pull-right">'+number_change+'</div></div>';
          return currency;
        },
        width: "10%"
      },
      {
        title: "DIBAYAR",
        data: null,
        name: 'pembayaranspp.dipa_pembayaran_nilai',
        defaultContent: '-',
        render: function(data){
          var pmb= formatNumber(data.pembayaranspp.dipa_pembayaran_nilai);
          var pmbb='<div><div class="pull-left">Rp.</div> <div class="pull-right">'+pmb+'</div></div>';
          return pmbb;
        },
        width: "10%"
      },
      { 
        title: "ACTION",
        data: null,
        orderable: false,
        searchable: false,
        width: "1%",
        render: function(data){
          var button="<a href=\"{{ url('/spm') }}/"+data.dipa_pmb_check_spp_id+"\" class=\"btn btn-success\" role=\"button\">SPM</a>";
          return button;
        }
      }
    ]
  });

  $('#myTable2').DataTable({
    // "data": data2,
    "processing": true,
    "serverSide": true,
    "ajax":{
      type: "GET",
      url: "{{asset('/dipa-sp2d')}}"
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
        data: 'kode',
        name: 'kode',
        defaultContent: "-"
      },
      {
        title: "RINCIAN",
        data: 'rincian',
        name: 'rician',
        defaultContent: "-"
      },
      {
        "title": "VOL",
        data: "pembayaran.akun_detail.dipa_volume",
        name: "pembayaran.akun_detail.dipa_volume",
        defaultContent:"-"
      },
      {
        "title": "NILAI",
        data: null,
        name: 'pembayaran.akun_detail.dipa_harga_satuan',
        defaultContent:"-",
        render: function(data){
          var number = data.pembayaran.akun_detail.dipa_harga_satuan;
          var number_change = formatNumber(number);
          var currency = `<div><div class="pull-left">Rp.</div> <div class="pull-right">${number_change}</div></div>`;
          return currency;
        },
        width: "10%"
      },
      {
        "title": "TOTAL",
        data: null,
        name: 'total',
        defaultContent: '-',
        render: function(data){
          var number_change = formatNumber(data.total);
          var currency = '<div><div class="pull-left">Rp.</div> <div class="pull-right">'+number_change+'</div></div>';
          return currency;
        },
        width: "10%"
      },
      {
        title: "DIBAYAR",
        data: null,
        name: 'pembayaranspp.dipa_pembayaran_nilai',
        defaultContent: '-',
        render: function(data){
          var pmb= formatNumber(data.pembayaran.dipa_pembayaran_nilai);
          var pmbb='<div><div class="pull-left">Rp.</div> <div class="pull-right">'+pmb+'</div></div>';
          return pmbb;
        },
        width: "10%"
      },
      { 
        title: "ACTION",
        data: null,
        orderable: false,
        searchable: false,
        width: "1%",
        render: function(data){
          var button="<a href=\"{{ url('/sp2d') }}/"+data.dipa_pmb_check_spm_id+"\" class=\"btn btn-success\" role=\"button\">SP2D</a>";
          return button;
        }
      }
    ]
  });
  function formatNumber(x) {
      return x.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
     
    </script>
@endpush

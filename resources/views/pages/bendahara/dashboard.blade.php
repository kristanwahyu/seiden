@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
@endpush

@section('title', 'Dashboard Bendahara')

@section('sidebar')
    @include('sidebar.bendahara')
@endsection

@section('content')
  {{-- AWAL MAIN CONTENT --}}
  <div class="main-content">
      {{-- Awal Breadcrumb --}}
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

                  </div> {{-- akhir panel body --}}

                </div> {{-- EDN PANEL --}}
              </div> {{-- END COL-MD-12 --}}
          </div> {{-- END ROW --}}
      </div> {{-- END CONTAINER FLUID --}}

  </div>
  {{-- AKHIR MAIN CONTENT --}}
@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script>
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
        data: 'kode',
        name: 'kode',
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
        data: "akun_detail.dipa_volume",
        defaultContent:"-"
    },
    {
      "title": "SATUAN",
        data: "akun_detail.dipa_satuan",
        defaultContent:"-"
    },
    {
      "title": "NILAI",
      name: 'akun_detail.dipa_harga_satuan',
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
        name: 'dipa_pembayaran_nilai',
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

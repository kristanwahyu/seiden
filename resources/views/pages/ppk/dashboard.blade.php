@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'Dashboard PPK')

@section('sidebar')
    @include('sidebar.ppk')
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
                      <h3 class="panel-title">Daftar SPP Yang Harus Dibayar</h3>
                  </div>
                  {{-- awal panel body --}}
                  <div class="panel-body">
                    {{-- awal pembungkus tabel --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed table-striped" id="myTable">

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
  'use strict';
    
    var table = $('#myTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            type : "GET",
            url : "/ppk/show/"
        },
        "columns": [
            {
                title: "NO",
                data: "DT_Row_Index",
                name: "DT_Row_Index",
                orderable: false,
                searchable: false,
                width: "1%"
            },
            {
                title: 'KODE',
                data: 'kode',
                defaultContent: "-",
                name: 'kode'
            },
            {
                title: 'RINCIAN',
                data: 'rincian',
                defaultContent: "-",
                name: 'rincian'
            },
            {
                title: 'VOL',
                data: 'dipa_volume',
                defaultContent: "-",
                name: 'dipa_volume'
            },
            {
                title: '<div class="text-center">NILAI</div>',
                data: null,
                defaultContent: "-",
                name: 'dipa_harga_satuan',
                render: function(data) {
                    var number = data['dipa_harga_satuan'];
                    if (number != null) {
                        var number_change = formatNumber(number);
                        var currency = `<div><div class="pull-left">Rp.</div> <div class="pull-right">${number_change}</div></div>`;
                        return currency.replace();
                    }
                },
                width: "10%"
            },
            {
                title: '<div class="text-center">TOTAL</div>',
                data: null,
                defaultContent: "-",
                name: 'total',
                render: function(data) {
                    var number = data['total'];
                    if (number != null) {
                        var number_change = formatNumber(number);
                        var currency = `<div><div class="pull-left">Rp.</div> <div class="pull-right">${number_change}</div></div>`;
                        return currency.replace();
                    }
                },
                width: "10%"
            },
            {
                title: '<div class="text-center">DIBAYAR</div>',
                data: null,
                defaultContent: "-",
                name: 'bayar',
                render: function(data) {
                    var number = data['bayar'];
                    if (number != null) {
                        var number_change = formatNumber(number);
                        var currency = `<div><div class="pull-left">Rp.</div> <div class="pull-right">${number_change}</div></div>`;
                        return currency.replace();
                    }
                },
                width: "10%"
            },
            {
                title: '<div class="text-center">ACTION</div>',
                data: null,
                name: 'action',
                render: function (data) {
                    var actions = `<a href="/spp/${data['dipa_id_detail_akun']}" class="btn btn-success" role="button">SPP</a>`;
                    return actions.replace();
                },
                width: "15.6%",
                orderable: false,
                searchable: false
            }


        ],
    });

    function formatNumber(x) {
      return x.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
</script>
@endpush

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
            <li class="active-bread"><a href="">Data Monitoring</a></li>
        </ul>
    </div>
    {{-- End Breadcrumb --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- awal tabel detail --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Monitoring</h3>
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
                                        <td>{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['tahun']['dipa_tahun_anggaran']}}</td>
                                    </tr>
                                    <tr>
                                        <td>SATUAN KERJA</td>
                                        <td>:</td>
                                        <td>{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['satuan_kerja']['dipa_kode_satuan_kerja']}} / {{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['satuan_kerja']['dipa_satuan_kerja']}}</td>
                                    </tr>
                                    <tr>
                                        <td>PROGRAM</td>
                                        <td>:</td>
                                        <td>{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['dipa_kode_program']}} / {{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['dipa_nama_program']}}</td>
                                    </tr>
                                    <tr>
                                        <td>KEGIATAN</td>
                                        <td>:</td>
                                        <td>{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['dipa_kode_kegiatan']}} / {{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['dipa_nama_kegiatan']}}</td>
                                    </tr>
                                    <tr>
                                        <td>OUTPUT</td>
                                        <td>:</td>
                                        <td>{{$sub_komponen['komponen']['sub_output']['output']['dipa_kode_output']}} / {{$sub_komponen['komponen']['sub_output']['output']['dipa_nama_output']}}</td>
                                    </tr>
                                    <tr>
                                        <td>SUB OUTPUT</td>
                                        <td>:</td>
                                        <td>{{$sub_komponen['komponen']['sub_output']['dipa_kode_sub_output']}} / {{$sub_komponen['komponen']['sub_output']['dipa_nama_sub_output']}}</td>
                                    </tr>
                                    <tr>
                                        <td>KOMPONEN</td>
                                        <td>:</td>
                                        <td>{{$sub_komponen['komponen']['dipa_kode_komponen']}} / {{$sub_komponen['komponen']['dipa_nama_komponen']}}</td>
                                    </tr>
                                    <tr>
                                        <td>SUB KOMPONEN</td>
                                        <td>:</td>
                                        <td>{{$sub_komponen['dipa_kode_sub_komponen']}} / {{$sub_komponen['dipa_nama_sub_komponen']}}</td>
                                    </tr>
                                    <tr>
                                        <td>AKUN</td>
                                        <td>:</td>
                                        <td>{{$dipa_kode_akun}} / {{$dipa_nama_akun}}</td>
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
$(function(){
'use strict';
var id_akun = "{{$dipa_id_akun}}";
    var table = $('#myTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            type : "GET",
            url : "/kpa/show/"+id_akun
        },
        "columns": [
            {
                title: "NO",
                data: "DT_Row_Index",
                orderable: false,
                searchable: false,
                width: "1%"
            },
            {
                //table buat order default
                data: 'dipa_id_detail_akun',
                searchable: false,
                visible: false
            },
            {
                title: 'KODE',
                data: 'kode',
                defaultContent: "-",
                name: 'subKomponen.dipa_kode_sub_komponen'
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
                name: 'dipa_pembayaran_nilai',
                render: function(data) {
                    var number = data['total_pembayaran'];
                    if (number != null) {
                        var number_change = formatNumber(number);
                        var currency = `<div><div class="pull-left">Rp.</div> <div class="pull-right">${number_change}</div></div>`;
                        return currency.replace();
                    }
                },
                width: "10%"
            },
            /*{
                title: 'JENIS AKUN',
                data: 'dipa_jenis_akun',
                defaultContent: "-",
                render: function (data) {
                    var jenis = data == '1' ? 'Belanja Gaji' : 'Belanja Non Gaji';
                    return jenis.replace();
                },
                searchable: false
            },*/
            {
                title: 'PROGRES',
                data: null,
                defaultContent: "-",
                render: function (data) {
                    var total = data['total'];
                    var total_bayar = data['total_pembayaran'];
                    var progres = (total_bayar/total)*100;
                    var a = Math.floor(progres);

                    var progress = `<div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100" style="width:${a}%">
                                        ${a}%
                                        </div>
                                    </div>`;
                    return progress;
                },
                searchable: false
            },
            {
                title: '<div class="text-center">ACTION</div>',
                data: null,
                render: function (data) {
                   return `<a href="/monitoring/${data['dipa_id_detail_akun']}" class="btn btn-success" role="button">Monitoring</a>`
                },
                width: "8%",
                orderable: false,
                searchable: false
            }
        ],
        "order": [[ 1, "desc" ]]
    });
$('.format-number').toArray().forEach((field) => {
        //cleave.js number format
        return new Cleave(field, {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand',
            numeralDecimalMark: ',',
            delimiter: '.'
        });
    });

    //native number format converter
    function formatNumber(value){
        var currency = new Intl.NumberFormat('de-DE');
        return currency.format(value);
    }
    
    //btn detail box
    $('.btn-detail').click(function(){
        $('.detail-box').slideToggle(200);
        $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
        $(this).siblings('span').toggleClass('btn-detail-open-text btn-detail-close-text');
        $(this).toggleClass('btn-active');
    });
});
</script>
@endpush

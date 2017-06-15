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
                                        <td>{{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['tahun']['dipa_tahun_anggaran']}}</td>
                                    </tr>
                                    <tr>
                                        <td>SATUAN KERJA</td>
                                        <td>:</td>
                                        <td>{{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['satuan_kerja']['dipa_kode_satuan_kerja']}} / {{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['satuan_kerja']['dipa_satuan_kerja']}}</td>
                                    </tr>
                                    <tr>
                                        <td>PROGRAM</td>
                                        <td>:</td>
                                        <td>{{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['dipa_kode_program']}} / {{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['dipa_nama_program']}}</td>
                                    </tr>
                                    <tr>
                                        <td>KEGIATAN</td>
                                        <td>:</td>
                                        <td>{{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['dipa_kode_kegiatan']}} / {{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['dipa_nama_kegiatan']}}</td>
                                    </tr>
                                    <tr>
                                        <td>OUTPUT</td>
                                        <td>:</td>
                                        <td>{{$akun['sub_komponen']['komponen']['sub_output']['output']['dipa_kode_output']}} / {{$akun['sub_komponen']['komponen']['sub_output']['output']['dipa_nama_output']}}</td>
                                    </tr>
                                    <tr>
                                        <td>SUB OUTPUT</td>
                                        <td>:</td>
                                        <td>{{$akun['sub_komponen']['komponen']['sub_output']['dipa_kode_sub_output']}} / {{$akun['sub_komponen']['komponen']['sub_output']['dipa_nama_sub_output']}}</td>
                                    </tr>
                                    <tr>
                                        <td>KOMPONEN</td>
                                        <td>:</td>
                                        <td>{{$akun['sub_komponen']['komponen']['dipa_kode_komponen']}} / {{$akun['sub_komponen']['komponen']['dipa_nama_komponen']}}</td>
                                    </tr>
                                    <tr>
                                        <td>SUB KOMPONEN</td>
                                        <td>:</td>
                                        <td>{{$akun['sub_komponen']['dipa_kode_sub_komponen']}} / {{$akun['sub_komponen']['dipa_nama_sub_komponen']}}</td>
                                    </tr>
                                    <tr>
                                        <td>AKUN</td>
                                        <td>:</td>
                                        <td>{{$akun['dipa_kode_akun']}} / {{$akun['dipa_nama_akun']}}</td>
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

var id_akun = "{{$dipa_id_detail_akun}}";
    var table = $('#myTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            type : "GET",
            url : "/monitoring/show/"+id_akun
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
                data: 'dipa_pembayaran_id',
                searchable: false,
                visible: false
            },
            {
                title: 'JENIS BAYAR',
                data: null,
                defaultContent: "-",
                name: 'dipa_jenis_pembayaran',
                render: function(data) {
                    if(data['dipa_jenis_pembayaran'] == 1)
                        return "UP";
                    else
                        return "LS";
                }
            },
            {
                title: 'JUMLAH',
                data: null,
                defaultContent: "-",
                name: 'dipa_pembayaran_nilai',
                render: function(data) {
                    return "Rp. "+formatNumber(data['dipa_pembayaran_nilai']);
                }
            },
            {
                title: 'SPP',
                data: null,
                defaultContent: "-",
                name: "PembayaranCheckSPP",
                render: function(data) {
                    if(data['pembayaran_check_s_p_p']==null)
                        return `<div class='text-center'><span class='label label-danger' style='font-size:12px'><i class="fa fa-times" aria-hidden="true"></i></span></div>`
                    else
                       return `<div class='text-center'><span class='label label-success' style='font-size:12px'><i class="fa fa-check" aria-hidden="true"></i></span></div>`
                }
            },
            {
                title: 'NO. SPP',
                data: 'pembayaran_check_s_p_p.dipa_spp_no',
                defaultContent: "-",
                name: 'dipa_volume'
                
            },
            {
                title: 'TGL. SPP',
                data: null,
                defaultContent: "-",
                name: 'PembayaranCheckSPP.dipa_spp_tanggal',
                render: function(data){
                    if(data['pembayaran_check_s_p_p'] != null) {
                        var str = data['pembayaran_check_s_p_p']['dipa_spp_tanggal'];
                        var rs = str.substr(0,10);
                        return rs;
                    } else {
                        return '-';
                    }
                }
            },
            {
                title: 'SPM',
                data: null,
                defaultContent: "-",
                name: "PembayaranCheckSPP",
                render: function(data) {
                    if(data['pembayaran_check_s_p_m']==null)
                        return `<div class='text-center'><span class='label label-danger' style='font-size:12px'><i class="fa fa-times" aria-hidden="true"></i></span></div>`
                    else
                       return `<div class='text-center'><span class='label label-success' style='font-size:12px'><i class="fa fa-check" aria-hidden="true"></i></span></div>`
                }
            },
            {
                title: 'NO. SPM',
                data: 'pembayaran_check_s_p_m.dipa_spm_no',
                defaultContent: "-",
                name: 'dipa_volume'
                
            },
            {
                title: 'TGL. SPM',
                data: null,
                defaultContent: "-",
                name: 'dipa_volume',
                render: function(data){
                    if(data['pembayaran_check_s_p_m'] != null) {
                        var str = data['pembayaran_check_s_p_m']['dipa_spm_tanggal'];
                        var rs = str.substr(0,10);
                        return rs;
                    } else {
                        return '-';
                    }
                }
            },
            {
                title: 'SP2D',
                data: null,
                defaultContent: "-",
                name: "PembayaranCheckSPP",
                render: function(data) {
                    if(data['pembayaran_check_s_p2_d']==null)
                        return `<div class='text-center'><span class='label label-danger' style='font-size:12px'><i class="fa fa-times" aria-hidden="true"></i></span></div>`
                    else
                       return `<div class='text-center'><span class='label label-success' style='font-size:12px'><i class="fa fa-check" aria-hidden="true"></i></span></div>`
                }
            },
            {
                title: 'NO. SP2D',
                data: 'pembayaran_check_s_p2_d.dipa_sp2d_no',
                defaultContent: "-",
                name: 'dipa_volume'
                
            },
            {
                title: 'TGL. SP2D',
                data: null,
                defaultContent: "-",
                name: 'dipa_volume',
                render: function(data){
                    if(data['pembayaran_check_s_p2_d'] != null) {
                        var str = data['pembayaran_check_s_p2_d']['dipa_sp2d_tanggal'];
                        var rs = str.substr(0,10);
                        return rs;
                    } else {
                        return '-';
                    }
                }
            },
        ]
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
</script>
@endpush

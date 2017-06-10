@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'DIPA Pembayaran')

@section('sidebar')
    @include('sidebar.satker')
@endsection

@section('content')
  {{-- AWAL MAIN CONTENT --}}
<div class="main-content">
    {{-- Breadcrumb --}}
    <div class="breadcrumb-wrapper">
        <ul class="breadcrumb">
            <li><a href=""><i class="fa fa-home fa-fw"></i></a></li>
           <li><a href="{{ url('/dipa/dipa-program') }}">DIPA</a></li>
            <li><a href="{{ url('/dipa/dipa-kegiatan/'.$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['dipa_id_program']) }}">{{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['dipa_kode_program']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-output/'.$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['dipa_id_kegiatan']) }}">{{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['dipa_kode_kegiatan']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-suboutput/'.$akun['sub_komponen']['komponen']['sub_output']['output']['dipa_id_output']) }}">{{$akun['sub_komponen']['komponen']['sub_output']['output']['dipa_kode_output']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-komponen/'.$akun['sub_komponen']['komponen']['sub_output']['dipa_id_sub_output']) }}">{{$akun['sub_komponen']['komponen']['sub_output']['dipa_kode_sub_output']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-subkomponen/'.$akun['sub_komponen']['komponen']['dipa_id_komponen']) }}">{{$akun['sub_komponen']['komponen']['dipa_kode_komponen']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-akun/'.$akun['sub_komponen']['dipa_id_sub_komponen']) }}">{{$akun['sub_komponen']['dipa_kode_sub_komponen']}}</a></li>
            <li>{{$akun['dipa_kode_akun']}}</li>
            <li class="active-bread">{{$dipa_nama_detail}}</li>
        </ul>
    </div>
    {{-- End Breadcrumb --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- awal tabel DIPA --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">DIPA Pembayaran</h3>
                    </div>
                    {{-- awal panel body --}}
                    <div class="panel-body">
                        <div class="row detail-box">
                          <div class="col-md-12">
                              <table class="table table-borderless table-condensed table-detail no-margin">
                                  <tbody>
                                      <tr>
                                          <td>KODE / SATUAN KERJA</td>
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
                                      <tr>
                                          <td>TAHUN ANGGARAN</td>
                                          <td>:</td>
                                          <td>{{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['tahun']['dipa_tahun_anggaran']}}</td>
                                      </tr>
                                      <tr>
                                          <td>NILAI</td>
                                          <td>:</td>
                                          <td>RP. <span id="nilai">@if($total->total != null) {{$total->total}} @else 0 @endif </span></td>
                                      </tr>
                                      <tr>
                                          <td>RINCIAN</td>
                                          <td>:</td>
                                          <td>{{$dipa_nama_detail}} | @if($dipa_jenis_akun == 1) Belanja Gaji @else Belanja Non Gaji @endif | Volume : {{$dipa_volume}} {{$dipa_satuan}}</td>
                                      </tr>
                                      <tr>
                                          <td>HARGA SATUAN</td>
                                          <td>:</td>
                                          <td>RP. <span id="nilai">{{$dipa_harga_satuan}}</span></td>
                                      </tr>
                                      <tr>
                                          <td>TOTAL HARGA</td>
                                          <td>:</td>
                                          <td>RP. <span id="nilai">{{$dipa_harga_satuan * $dipa_volume}}</span></td>
                                      </tr>
                                      <tr>
                                          <td>DANA TERPAKAI</td>
                                          <td>:</td>
                                          <td>Rp. 0 -</td>
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
                        </div>

                        <?php
                            //$jenis = (jenis_akun_Belanja_Gaji = 1) ? 'BG' : 'BNG';
                            $jenis = $dipa_jenis_akun;

                            //BG = Belanja Gaji, BNG = Belanja Non Gaji
                            $syarat = [
                                '1'  => [
                                    'Dafar Rekapitulasi/ Dafar Nominatif Pembayaran',
                                    'Surat pernyataan tanggung jawab belanja (SPTJB)',
                                    'Kuintansi / Tanda Bukti Pembayaran',
                                    'Surat Setoran Pajak (SSP) (Bila Ada)',
                                    'Kontrak, Ringkasan Kontrak, BAPHP, BAST, Surat Tagihan, BA Pembayaran, Copy NPWP, Copy
                                     Rekening, Jaminan Bank, Bukti Tagihan Daya, Bukti Tagihan Lainnya yang sudah disahkan PPK',
                                    'Undangan/Memo, Surat Tugas, Surat Perjalanan Dinas, Daftar Pengeluaran Riil, Bukti Angkutan,
                                     Bukti Penginapan, LPJ Perjadin',
                                    'SK Tim Verifikasi, SK Perjanjian Kerjasama, SK Penetapan Bantuan, SPTJM Penerima, SPTJB Penerima,
                                     BA Verifikasi, Proposal'
                                ],
                                '2' => [
                                    'Dafar Rekapitulasi/ Dafar Nominatif (Gaji)',
                                    'Surat pernyataan tanggung jawab belanja (SPTJB)',
                                    'Kuintansi / Tanda Bukti Pembayaran',
                                    'Surat Setoran Pajak (SSP)',
                                    'Surat Keputusan Pegawai',
                                    'Surat Tugas/ Ijin, Daftar Rekap Laporan Kinerja Bulanan, Daftar Absen / Kehadiran',
                                    'Surat Pernyataan Pegawai, SKMT, SKBK, Daftar Hadir, Daftar Gaji Terakhir, SK Pembagian Tugas,
                                     Jadwal Mengajar, Daftar Rombel, Copy Sertifikat Pendidik, Copy NRG, Copy NUPTK, Copy NPWP,
                                     Copy Buku Rekening, Laporan Kinerja Bulanan'
                                ]
                            ];
                        ?>

                        {{-- awal pembungkus form persyaratan --}}
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="POST" class="form-horizontal" role="form">
                                    <div class="form-group clearfix">
                                        <label class="col-sm-3 control-label">PEMBAYARAN</label>
                                        <div class="col-sm-9">
                                            <label class="radio-inline"><input type="radio" id="tambah_up" name="jenis_pembayaran" value="1">UP</label>
                                            <label class="radio-inline"><input type="radio" id="tambah_ls" name="jenis_pembayaran" value="0">LS</label>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="col-sm-3 control-label">SYARAT</label>
                                            <div class="checkbox col-sm-9">
                                            <table class="table table-bordered table-condensed table-hover table-syarat no-margin">
                                                {{-- <thead>
                                                    <tr>
                                                        <th width="3%">#</th>
                                                        <th width="15%">SYARAT</th>
                                                        <th>KETERANGAN</th>
                                                    </tr>
                                                </thead> --}}
                                                <tbody>
                                                    <tr>
                                                        <td><input type="checkbox" disabled></td>
                                                        <td>Syarat 1</td>
                                                        <td class="td-file">
                                                            <button href="#" class="btn btn-success btn-xxs"><i class="fa fa-upload"></i></button>
                                                            <span><input type="file" name="syarat1" class="file_syarat"></span>
                                                        </td>
                                                        <td><a href="#" class="btn btn-success btn-xxs disabled"><i class="fa fa-download"></i></a></td>
                                                        <td><button type="button" class="btn btn-default btn-xxs btn-syarat"><i class="fa fa-chevron-down"></i></button></td>
                                                    </tr>
                                                    <tr class="row-hidden">
                                                        <td></td>
                                                        <td colspan="4">{{ $syarat[$jenis][0] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" disabled></td>
                                                        <td>Syarat 2</td>
                                                        <td class="td-file">
                                                            <button href="#" class="btn btn-success btn-xxs"><i class="fa fa-upload"></i></button>
                                                            <span><input type="file" name="syarat2" class="file_syarat"></span>
                                                        </td>
                                                        <td><a href="#" class="btn btn-success btn-xxs disabled"><i class="fa fa-download"></i></a></td>
                                                        <td><button type="button" class="btn btn-default btn-xxs btn-syarat"><i class="fa fa-chevron-down"></i></button></td>
                                                    </tr>
                                                    <tr class="row-hidden">
                                                        <td>-</td>
                                                        <td colspan="4">{{ $syarat[$jenis][1] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" disabled></td>
                                                        <td>Syarat 3</td>
                                                        <td class="td-file">
                                                            <button href="#" class="btn btn-success btn-xxs"><i class="fa fa-upload"></i></button>
                                                            <span><input type="file" name="syarat3" class="file_syarat"></span>
                                                        </td>
                                                        <td><a href="#" class="btn btn-success btn-xxs disabled"><i class="fa fa-download"></i></a></td>
                                                        <td><button type="button" class="btn btn-default btn-xxs btn-syarat"><i class="fa fa-chevron-down"></i></button></td>
                                                    </tr>
                                                    <tr class="row-hidden">
                                                        <td>-</td>
                                                        <td colspan="4">{{ $syarat[$jenis][2] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" disabled></td>
                                                        <td>Syarat 4</td>
                                                        <td class="td-file">
                                                            <button href="#" class="btn btn-success btn-xxs"><i class="fa fa-upload"></i></button>
                                                            <span><input type="file" name="syarat4" class="file_syarat"></span>
                                                        </td>
                                                        <td><a href="#" class="btn btn-success btn-xxs disabled"><i class="fa fa-download"></i></a></td>
                                                        <td><button type="button" class="btn btn-default btn-xxs btn-syarat"><i class="fa fa-chevron-down"></i></button></td>
                                                    </tr>
                                                    <tr class="row-hidden">
                                                        <td>-</td>
                                                        <td colspan="4">{{ $syarat[$jenis][3] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" disabled></td>
                                                        <td>Syarat 5</td>
                                                        <td class="td-file">
                                                            <button href="#" class="btn btn-success btn-xxs"><i class="fa fa-upload"></i></button>
                                                            <span><input type="file" name="syarat5" class="file_syarat"></span>
                                                        </td>
                                                        <td><a href="#" class="btn btn-success btn-xxs disabled"><i class="fa fa-download"></i></a></td>
                                                        <td><button type="button" class="btn btn-default btn-xxs btn-syarat"><i class="fa fa-chevron-down"></i></button></td>
                                                    </tr>
                                                    <tr class="row-hidden">
                                                        <td>-</td>
                                                        <td colspan="4">{{ $syarat[$jenis][4] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" disabled></td>
                                                        <td>Syarat 6</td>
                                                        <td class="td-file">
                                                            <button href="#" class="btn btn-success btn-xxs"><i class="fa fa-upload"></i></button>
                                                            <span><input type="file" name="syarat6" class="file_syarat"></span>
                                                        </td>
                                                        <td><a href="#" class="btn btn-success btn-xxs disabled"><i class="fa fa-download"></i></a></td>
                                                        <td><button type="button" class="btn btn-default btn-xxs btn-syarat"><i class="fa fa-chevron-down"></i></button></td>
                                                    </tr>
                                                    <tr class="row-hidden">
                                                        <td>-</td>
                                                        <td colspan="4">{{ $syarat[$jenis][5] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" disabled></td>
                                                        <td>Syarat 7</td>
                                                        <td class="td-file">
                                                            <button href="#" class="btn btn-success btn-xxs"><i class="fa fa-upload"></i></button>
                                                            <span><input type="file" name="syarat7" class="file_syarat"></span>
                                                        </td>
                                                        <td><a href="#" class="btn btn-success btn-xxs disabled"><i class="fa fa-download"></i></a></td>
                                                        <td><button type="button" class="btn btn-default btn-xxs btn-syarat"><i class="fa fa-chevron-down"></i></button></td>
                                                    </tr>
                                                    <tr class="row-hidden">
                                                        <td>-</td>
                                                        <td colspan="4">{{ $syarat[$jenis][6] }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="col-sm-3 control-label">NILAI</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pembayaran_nilai" name="pembayaran_nilai" placeholder="Contoh : Rp. 15.000.000">
                                            <input type="hidden" value="{{$dipa_id_detail_akun}}" id="id_detail_akun">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="col-sm-3 control-label">KETERANGAN</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" id="pembayaran_keterangan" name="pembayaran_keterangan" placeholder="Contoh : Isi keterangan disini"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- akhir pembungkus form persyaratan --}}
                        </div>
                    </div>
                    {{-- akhir panel body --}}

                    <div class="panel-footer clearfix">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ url('/dipa/dipa-subkomponen') }}" class="btn btn-warning" role="button"><i class="fa fa-reply"></i> Kembali</a>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary btn-tambah" status="0" data-id="1"><i class="fa fa-tasks"></i> Draft</button>
                                <button class="btn btn-success btn-tambah" status="1" data-id=""><i class="fa fa-save"></i> Ajukan</button>
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
<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.js') }}" charset="UTF-8"></script>

<script>
$(function(){
    'use strict';

    //btn detail box
    $('.btn-detail').click(function(){
        $('.detail-box').slideToggle(200);
        $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
        $(this).siblings('span').toggleClass('btn-detail-open-text btn-detail-close-text');
        $(this).toggleClass('btn-active');
    });

    //btn detail syarat
    $('.btn-syarat').click(function(){
        $(this).parents('tr').next().toggle();
        $(this).toggleClass('btn-danger btn-default');
        $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
    });

     $(".btn-tambah").click(function(){
        var id_pembayaran = $(this).data('id');
        if (id_pembayaran == "") {
            var text_sweet = 'Data Pembayaran ini akan di simpan. dan tidak dapat di rubah lagi';
            var tanggal = '{{date("Y-m-d")}}';
            var status = '1';
        } else {
            var text_sweet = 'Data Pembayaran ini akan di simpan di draft, dan dapat di rubah lagi';
            var tanggal = null;
            var status = '0';
        }
        var formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('pembayaran_tanggal', tanggal);
        formData.append('jenis_pembayaran', $('input[type="radio"][name="jenis_pembayaran"]').val());
        formData.append('id_detail_akun', $('#id_detail_akun').val());
        formData.append('pembayaran_nilai', $('#pembayaran_nilai').val());
        formData.append('pembayaran_keterangan', $('#pembayaran_keterangan').val());
        formData.append('pembayaran_status', status);
        formData.append('syarat1', $('input[name="syarat1"]')[0].files[0]);
        formData.append('syarat2', $('input[name="syarat2"]')[0].files[0]);
        formData.append('syarat3', $('input[name="syarat3"]')[0].files[0]);
        formData.append('syarat4', $('input[name="syarat4"]')[0].files[0]);
        formData.append('syarat5', $('input[name="syarat5"]')[0].files[0]);
        formData.append('syarat6', $('input[name="syarat6"]')[0].files[0]);
        formData.append('syarat7', $('input[name="syarat7"]')[0].files[0]);

        swal({
            title: "Apakah Anda Yakin ?",
            text: text_sweet,
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#00a65a",
            confirmButtonText: "Ya, Yakin !",
            cancelButtonText: "Tidak, Batalkan !",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true
        },
        function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url : "/dipa/dipa-pembayaran/store",
                    type : "POST",
                    data : formData,
                    contentType: false, // ini di perlukan
                    processData: false, // ini juga
                    success : function(data, status){
                        if(status=="success"){
                            setTimeout(function(){
                                swal({
                                    title: "Sukses",
                                    text: "Data Tersimpan!",
                                    type: "success"
                                    },
                                    function(){
                                        window.location = "/bangke";
                                    });
                                }, 1000);
                        }
                        $('#modal-tambah').modal('hide');
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        setTimeout(function(){
                            swal("Error deleting!", "Please try again", "error");
                        }, 1000);
                    }
                });
            } else {
            swal('Dibatalkan', 'Data Detail Akun Batal Simpan :)', 'error');
                $('#modal-tambah').modal('hide');
            }
        });
    });

    $(".file_syarat").on('change', function(){
        if($(this).val() == "") {
            $(this).closest('tr').find('input[type="checkbox"]').prop('checked', false);
        } else {
            $(this).closest('tr').find('input[type="checkbox"]').prop('checked', true);
        }
    });

    $("#myTable").on('click','.ubah-detail', function(){
        $.get("/dipa/dipa-rincian/get/"+$(this).data('id'), function(data, status){
            if(status == 'success'){
                console.log(data);
                $("#ubah_harga_satuan").val(data['dipa_harga_satuan']);
                $("#ubah_nama_detail").val(data['dipa_nama_detail']);
                $("#ubah_satuan").val(data['dipa_satuan']);
                $("#ubah_vol").val(data['dipa_volume']);
            }
        });
    });

    $("#btn-ubah").click(function(){
        var id = $('#param_id').val();
        swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Akun Ini Akan Diubah",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#00a65a",
            confirmButtonText: "Ya, Yakin !",
            cancelButtonText: "Tidak, Batalkan !",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true
        },
        function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url : "/dipa/dipa-akun/update/"+id,
                    type : "PUT",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "kode_akun" : $("#ubah_kode_akun").val(),
                        "nama_akun" : $("#ubah_nama_akun").val()
                    },
                    success : function(data, status){
                        if(status=="success"){
                            setTimeout(function(){
                                swal({
                                    title: "Sukses",
                                    text: "Data Tersimpan!",
                                    type: "success"
                                    },
                                    function(){
                                        table.ajax.reload();
                                    });
                                }, 1000);
                        }
                        $('#modal-ubah').modal('hide');
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        setTimeout(function(){
                            swal("Error deleting!", "Please try again", "error");
                        }, 1000);
                    }
                });
            } else {
            swal('Dibatalkan', 'Data Akun Batal di Ubah :)', 'error');
                $('#modal-ubah').modal('hide');
            }
        });
    });
    $("#myTable").on('click','.hapus-akun', function(){
        var id = $(this).data('id');
        swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Akun Ini Akan Dihapus PERMANEN !",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "red",
            confirmButtonText: "Ya, Yakin !",
            cancelButtonText: "Tidak, Batalkan !",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true
        },
        function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url : "/dipa/dipa-akun/delete/"+id,
                    type : "delete",
                    data : {
                        "_token": "{{ csrf_token() }}"
                    },
                    success : function(data, status){
                        if(status=="success"){
                            setTimeout(function(){
                                swal({
                                    title: "Sukses",
                                    text: "Data Tersimpan!",
                                    type: "success"
                                    },
                                    function(){
                                        table.ajax.reload();
                                    });
                                }, 1000);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        setTimeout(function(){
                            swal("Error deleting!", "Please try again", "error");
                        }, 1000);
                    }
                });
            } else {
                swal('Dibatalkan', 'Data Akun Batal Hapus :)', 'error');
            }
        });
    });
    $('#modal-tambah').on('hidden.bs.modal', function (e) {
        $(this)
            .find("input")
            .val('')
            .end()
    })

});

function tambah(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data Akun Ini Akan Disimpan ",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#00a65a",
    confirmButtonText: "Ya, Yakin !",
    cancelButtonText: "Tidak, Batalkan !",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm) {
      swal("Berhasil!", "Data Akun Berhasil Simpan", "success");
      $('#modal-tambah').modal('hide');
    } else {
      swal('Dibatalkan', 'Data Akun Batal Simpan :)', 'error');
      $('#modal-tambah').modal('hide');
    }
  });
}

function ubah(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data Akun Ini Akan Diubah ",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#00a65a",
    confirmButtonText: "Ya, Yakin !",
    cancelButtonText: "Tidak, Batalkan !",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm) {
      swal("Berhasil!", "Data Akun Berhasil Diubah", "success");
      $('#modal-ubah').modal('hide');
    } else {
      swal('Dibatalkan', 'Data Akun Batal Diubah :)', 'error');
      $('#modal-ubah').modal('hide');
    }
  });
}

function hapus(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data Akun Ini Akan Dihapus",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, Yakin !",
    cancelButtonText: "Tidak, Batalkan !",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm) {
      swal("Berhasil!", "Data Akun Berhasil Dihapus", "success");
    } else {
      swal('Dibatalkan', 'Data Akun Batal Dihapus :)', 'error');
    }
  });
}
</script>
@endpush

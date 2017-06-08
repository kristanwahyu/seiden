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
            {{-- <li><a href="{{ url('/dipa/dipa-kegiatan/'.$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['dipa_id_program']) }}">{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['dipa_kode_program']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-output/'.$sub_komponen['komponen']['sub_output']['output']['kegiatan']['dipa_id_kegiatan']) }}">{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['dipa_kode_kegiatan']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-suboutput/'.$sub_komponen['komponen']['sub_output']['output']['dipa_id_output']) }}">{{$sub_komponen['komponen']['sub_output']['output']['dipa_kode_output']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-komponen/'.$sub_komponen['komponen']['sub_output']['dipa_id_sub_output']) }}">{{$sub_komponen['komponen']['sub_output']['dipa_kode_sub_output']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-subkomponen/'.$sub_komponen['komponen']['dipa_id_komponen']) }}">{{$sub_komponen['komponen']['dipa_kode_komponen']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-akun/'.$sub_komponen['dipa_id_sub_komponen']) }}">{{$sub_komponen['dipa_kode_sub_komponen']}}</a></li>
            <li class="active-bread">{{$dipa_kode_akun}}</li> --}}
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
                                          <td></td>
                                          {{-- <td>{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['satuan_kerja']['dipa_kode_satuan_kerja']}} / {{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['satuan_kerja']['dipa_satuan_kerja']}}</td> --}}
                                      </tr>
                                      <tr>
                                          <td>PROGRAM</td>
                                          <td>:</td>
                                          <td></td>
                                          {{-- <td>{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['dipa_kode_program']}} / {{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['dipa_nama_program']}}</td> --}}
                                      </tr>
                                      <tr>
                                          <td>KEGIATAN</td>
                                          <td>:</td>
                                          <td></td>
                                          {{-- <td>{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['dipa_kode_kegiatan']}} / {{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['dipa_nama_kegiatan']}}</td> --}}
                                      </tr>
                                      <tr>
                                          <td>OUTPUT</td>
                                          <td>:</td>
                                          <td></td>
                                          {{-- <td>{{$sub_komponen['komponen']['sub_output']['output']['dipa_kode_output']}} / {{$sub_komponen['komponen']['sub_output']['output']['dipa_nama_output']}}</td> --}}
                                      </tr>
                                      <tr>
                                          <td>SUB OUTPUT</td>
                                          <td>:</td>
                                          <td></td>
                                          {{-- <td>{{$sub_komponen['komponen']['sub_output']['dipa_kode_sub_output']}} / {{$sub_komponen['komponen']['sub_output']['dipa_nama_sub_output']}}</td> --}}
                                      </tr>
                                      <tr>
                                          <td>KOMPONEN</td>
                                          <td>:</td>
                                          <td></td>
                                          {{-- <td>{{$sub_komponen['komponen']['dipa_kode_komponen']}} / {{$sub_komponen['komponen']['dipa_nama_komponen']}}</td> --}}
                                      </tr>
                                      <tr>
                                          <td>SUB KOMPONEN</td>
                                          <td>:</td>
                                          <td></td>
                                          {{-- <td>{{$sub_komponen['dipa_kode_sub_komponen']}} / {{$sub_komponen['dipa_nama_sub_komponen']}}</td> --}}
                                      </tr>
                                      <tr>
                                          <td>AKUN</td>
                                          <td>:</td>
                                          <td></td>
                                          {{-- <td>{{$dipa_kode_akun}} / {{$dipa_nama_akun}}</td> --}}
                                      </tr>
                                      <tr>
                                          <td>TAHUN ANGGARAN</td>
                                          <td>:</td>
                                          <td></td>
                                          {{-- <td>{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['tahun']['dipa_tahun_anggaran']}}</td> --}}
                                      </tr>
                                      <tr>
                                          <td>NILAI</td>
                                          <td>:</td>
                                          <td>RP. 12.500.000</td>
                                      </tr>
                                      <tr>
                                          <td>RINCIAN</td>
                                          <td>:</td>
                                          <td>Pembayaran Dana - Belanja Pegawai - Volume : 2 - Satuan : 2 Orang</td>
                                      </tr>
                                      <tr>
                                          <td>HARGA SATUAN</td>
                                          <td>:</td>
                                          <td>Rp. 1.500.000</td>
                                      </tr>
                                      <tr>
                                          <td>TOTAL HARGA</td>
                                          <td>:</td>
                                          <td>Rp. 3.000.000</td>
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

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <span class="btn-detail-open-text"></span> &nbsp;
                                <div class="btn-detail btn-active"><i class="fa fa-chevron-up"></i></div>
                            </div>
                        </div>

                        <?php
                            //$jenis = (jenis_akun_Belanja_Gaji = 1) ? 'BG' : 'BNG';
                            $jenis = 'BG';

                            //BG = Belanja Gaji, BNG = Belanja Non Gaji
                            $syarat = [
                                'BG'  => [
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
                                'BNG' => [
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
                                            <label class="radio-inline"><input type="radio" id="tambah_up" name="tambah" value="1">UP</label>
                                            <label class="radio-inline"><input type="radio" id="tambah_ls" name="tambah" value="0">LS</label>
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
                                                        <td><input type="checkbox"></td>
                                                        <td>Syarat 1</td>
                                                        <td class="td-file">
                                                            <button href="#" class="btn btn-success btn-xxs"><i class="fa fa-upload"></i></button>
                                                            <span><input type="file"></span>
                                                        </td>
                                                        <td><a href="#" class="btn btn-success btn-xxs disabled"><i class="fa fa-download"></i></a></td>
                                                        <td><button type="button" class="btn btn-default btn-xxs btn-syarat"><i class="fa fa-chevron-down"></i></button></td>
                                                    </tr>
                                                    <tr class="row-hidden">
                                                        <td>-</td>
                                                        <td colspan="4">{{ $syarat[$jenis][0] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox"></td>
                                                        <td>Syarat 2</td>
                                                        <td class="td-file">
                                                            <button href="#" class="btn btn-success btn-xxs"><i class="fa fa-upload"></i></button>
                                                            <span><input type="file"></span>
                                                        </td>
                                                        <td><a href="#" class="btn btn-success btn-xxs disabled"><i class="fa fa-download"></i></a></td>
                                                        <td><button type="button" class="btn btn-default btn-xxs btn-syarat"><i class="fa fa-chevron-down"></i></button></td>
                                                    </tr>
                                                    <tr class="row-hidden">
                                                        <td>-</td>
                                                        <td colspan="4">{{ $syarat[$jenis][1] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox"></td>
                                                        <td>Syarat 3</td>
                                                        <td class="td-file">
                                                            <button href="#" class="btn btn-success btn-xxs disabled"><i class="fa fa-upload"></i></button>
                                                            <span><input type="file"></span>
                                                        </td>
                                                        <td><a href="#" class="btn btn-success btn-xxs "><i class="fa fa-download"></i></a></td>
                                                        <td><button type="button" class="btn btn-default btn-xxs btn-syarat"><i class="fa fa-chevron-down"></i></button></td>
                                                    </tr>
                                                    <tr class="row-hidden">
                                                        <td>-</td>
                                                        <td colspan="4">{{ $syarat[$jenis][2] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox"></td>
                                                        <td>Syarat 4</td>
                                                        <td class="td-file">
                                                            <button href="#" class="btn btn-success btn-xxs"><i class="fa fa-upload"></i></button>
                                                            <span><input type="file"></span>
                                                        </td>
                                                        <td><a href="#" class="btn btn-success btn-xxs disabled"><i class="fa fa-download"></i></a></td>
                                                        <td><button type="button" class="btn btn-default btn-xxs btn-syarat"><i class="fa fa-chevron-down"></i></button></td>
                                                    </tr>
                                                    <tr class="row-hidden">
                                                        <td>-</td>
                                                        <td colspan="4">{{ $syarat[$jenis][3] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox"></td>
                                                        <td>Syarat 5</td>
                                                        <td class="td-file">
                                                            <button href="#" class="btn btn-success btn-xxs"><i class="fa fa-upload"></i></button>
                                                            <span><input type="file"></span>
                                                        </td>
                                                        <td><a href="#" class="btn btn-success btn-xxs disabled"><i class="fa fa-download"></i></a></td>
                                                        <td><button type="button" class="btn btn-default btn-xxs btn-syarat"><i class="fa fa-chevron-down"></i></button></td>
                                                    </tr>
                                                    <tr class="row-hidden">
                                                        <td>-</td>
                                                        <td colspan="4">{{ $syarat[$jenis][4] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox"></td>
                                                        <td>Syarat 6</td>
                                                        <td class="td-file">
                                                            <button href="#" class="btn btn-success btn-xxs"><i class="fa fa-upload"></i></button>
                                                            <span><input type="file"></span>
                                                        </td>
                                                        <td><a href="#" class="btn btn-success btn-xxs disabled"><i class="fa fa-download"></i></a></td>
                                                        <td><button type="button" class="btn btn-default btn-xxs btn-syarat"><i class="fa fa-chevron-down"></i></button></td>
                                                    </tr>
                                                    <tr class="row-hidden">
                                                        <td>-</td>
                                                        <td colspan="4">{{ $syarat[$jenis][5] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox"></td>
                                                        <td>Syarat 7</td>
                                                        <td class="td-file">
                                                            <button href="#" class="btn btn-success btn-xxs"><i class="fa fa-upload"></i></button>
                                                            <span><input type="file"></span>
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
                                            <input type="text" class="form-control" id="tambah_nilai" name="tambah_nilai" placeholder="Contoh : Rp. 15.000.000">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="col-sm-3 control-label">KETERANGAN</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" id="tambah_keterangan" name="tambah_keterangan" placeholder="Contoh : Isi keterangan disini"></textarea>
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
                                <button class="btn btn-primary" data-toggle="modal" href='#modal-draft'><i class="fa fa-plus"></i> Draft</button>
                                <button class="btn btn-success" data-toggle="modal" href='#modal-ajukan'><i class="fa fa-plus"></i> Ajukan</button>
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

     $("#btn-tambah").click(function(){
        swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Detail Ini Akan Disimpan",
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
                    url : "/dipa/dipa-rincian/store",
                    type : "POST",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "nama_detail" : $("#tambah_nama_detail").val(),
                        "volume" : $("#tambah_vol").val(),
                        "satuan" :$("#tambah_satuan").val(),
                        "harga_satuan" : $("#tambah_harga_satuan").val(),
                        "jenis_akun" : $("#tambah_jenis_akun").val(),
                        "id_akun" : $("#id_akun").val()
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

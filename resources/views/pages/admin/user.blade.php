@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'User')

@section('sidebar')
    @include('sidebar.admin')
@endsection

@section('content')
{{-- AWAL MAIN CONTENT --}}
<div class="main-content">
    {{-- Breadcrumb --}}
    <div class="breadcrumb-wrapper">
        <ul class="breadcrumb">
            <li><a href=""><i class="fa fa-home fa-fw"></i></a></li>
            <li class="active-bread">User</li>
        </ul>
    </div>
    {{-- End Breadcrumb --}} 

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- awal tabel user --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">User</h3>
                    </div>
                    {{-- awal panel body --}}
                    <div class="panel-body">
                        <div class="text-right">
                            <button class="btn btn-primary" data-toggle="modal" href='#modal-tambah'><i class="fa fa-plus"></i> Tambah</button>
                        </div>
                        <br>
                        {{-- awal pembungkus tabel user --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed table-striped" id="myTable">

                            </table>
                        </div> {{-- akhir pembungkus tabel user --}}
                    </div> {{-- akhir panel body --}}
                </div> {{-- akhir tabel user --}}
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MAIN CONTENT --}}

{{-- AWAL MODAL TAMBAH USER --}}
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data User</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">User Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="tambah_username" name="tambah_username" placeholder="Contoh : nasrullah">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama Lengkap</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="tambah_nama_lengkap" name="tambah_nama_lengkap" placeholder="Contoh : Fais Nasrullah">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Jenis User</label>
                                <div class="col-sm-8">
                                <select id="jenis_user" class="form-control" data-style="btn-white">
                                    <option selected>- Pilih Jenis User -</option>
                                    <option value="1">Admin</option>
                                    <option value="2">KPA</option>
                                    <option value="3">PPK</option>
                                    <option value="4">Staf Pengelolah / Satuan Kerja</option>
                                    <option value="5">PPSM</option>
                                    <option value="6">Operator SIMA</option>
                                    <option value="7">Operator SIBA</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-8">
                                <label class="radio-inline"><input type="radio" id="aktif" name="status" value="1" checked>Aktif</label>
                                <label class="radio-inline"><input type="radio" id="tidak_aktif" name="status" value="0">Tidak Aktif</label>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="tambah()">Simpan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL TAMBAH USER --}}

{{-- AWAL MODAL UBAH USER --}}
<div class="modal fade" id="modal-ubah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ubah Data User</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">User Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="ubah_username" name="ubah_username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Lengkap</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="ubah_nama_lengkap" name="ubah_nama_lengkap">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jenis User</label>
                            <div class="col-sm-8">
                                <select id="jenis_user" class="form-control" data-style="btn-white">
                                <option value="1">Admin</option>
                                <option value="2">KPA</option>
                                <option value="3">PPK</option>
                                <option value="4">Staf Pengelolah / Satuan Kerja</option>
                                <option value="5">PPSM</option>
                                <option value="6">Operator SIMA</option>
                                <option value="7">Operator SIBA</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-8">
                            <label class="radio-inline"><input type="radio" id="aktif" name="status" value="1">Aktif</label>
                            <label class="radio-inline"><input type="radio" id="tidak_aktif" name="status" value="0">Tidak Aktif</label>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="ubah()">Simpan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR MODAL UBAH USER --}}
@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

<script>
$(function(){
  'use strict';
  var data = [
      [
          "1",
          "joko",
          "Joko Widodo",
          "Admin",
          `<span class="label label-success">AKTIF</span>`,
          `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-ubah'> UBAH</button>
          <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="hapus()"> HAPUS</button>`
      ],
      [
          "2",
          "susilo",
          "Susilo Bambang",
          "KPA",
          `<span class="label label-danger">TIDAK AKTIF</span>`,
          `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-ubah'> UBAH</button>
          <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="hapus()"> HAPUS</button>`
      ]
    ];

  $('#myTable').DataTable({
      "data" : data,
      "columns" : [
          { "title" : "#", "width" : "2%" },
          { "title" : "USERNAME" },
          { "title" : "NAMA LENGKAP" },
          { "title" : "JENIS USER" },
          { "title" : "STATUS USER"},
          { "title" : "AKSI","width" : "11%", "orderable": false }
      ]
  });

});

function tambah(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data User Ini Akan Disimpan ",
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
      swal("Berhasil!", "Data User Berhasil Simpan", "success");
      $('#modal-tambah').modal('hide');
    } else {
      swal('Dibatalkan', 'Data User Batal Simpan :)', 'error');
      $('#modal-tambah').modal('hide');
    }
  });
}

function ubah(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data User Ini Akan Diubah ",
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
      swal("Berhasil!", "Data User Berhasil Diubah", "success");
      $('#modal-ubah').modal('hide');
    } else {
      swal('Dibatalkan', 'Data User Batal Diubah :)', 'error');
      $('#modal-ubah').modal('hide');
    }
  });
}
</script>
@endpush

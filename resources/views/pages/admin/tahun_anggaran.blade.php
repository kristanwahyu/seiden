@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'Tahun Anggaran')

@section('sidebar')
    @include('sidebar.admin')
@endsection

@section('content')
  {{-- AWAL MAIN CONTENT --}}
  <div class="main-content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

              {{-- awal tabel tahun anggaran --}}
              <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Tahun Anggaran</h3>
                </div>
                {{-- awal panel body --}}
                <div class="panel-body">
                  <div class="text-right">
                      <button class="btn btn-primary" data-toggle="modal" href='#modal-tambah'><i class="fa fa-plus"></i> Tambah</button>
                  </div>
                  <br>
                  {{-- awal pembungkus tabel tahun anggaran --}}
                  <div class="table-responsive">
                      <table class="table table-bordered table-condensed table-striped" id="myTable">

                      </table>
                  </div> {{-- akhir pembungkus tabel tahun anggaran --}}
                </div> {{-- akhir panel body --}}
              </div> {{-- akhir tabel tahun anggaran --}}
            </div>
        </div>
      </div>
  </div>
  {{-- AKHIR MAIN CONTENT --}}

  {{-- AWAL MODAL TAMBAH TAHUN ANGGARAN --}}
  <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Tambah Tahun Anggaran</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Tahun Anggaran</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tahun_anggaran" name="tahun_anggaran" placeholder="Contoh : 2010">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              </div>
          </div>
      </div>
  </div>
  {{-- AKHIR MODAL TAMBAH TAHUN ANGGARAN --}}

  {{-- AWAL MODAL UBAH TAHUN ANGGARAN --}}
  <div class="modal fade" id="modal-ubah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Tahun Anggaran</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Tahun Anggaran</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tahun_anggaran" name="tahun_anggaran">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              </div>
          </div>
      </div>
  </div>
  {{-- AKHIR MODAL UBAH TAHUN ANGGARAN --}}
@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.js') }}" charset="UTF-8"></script>

<script>
$(function(){
  'use strict';
  var data = [
      [
          "1",
          "2015",
          `<span class="label label-danger">TIDAK AKTIF</span>`,
          `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-ubah'> UBAH</button>
          <button class="btn btn-primary btn-sm" data-toggle="modal" onclick="aktif()"> AKTIF</button>`
      ],
      [
          "2",
          "2016",
          `<span class="label label-danger">TIDAK AKTIF</span>`,
          `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-ubah'> UBAH</button>
          <button class="btn btn-primary btn-sm" data-toggle="modal" onclick="aktif()"> AKTIF</button>`
      ],
      [
          "3",
          "2017",
          `<span class="label label-success">AKTIF</span>`,
          `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-ubah'> UBAH</button> ` // YANG MEMILIKI STATUS AKTIF, MAKA BUTTON AKTIF TIDAK DIMUNCULKAN
      ],
    ];

  $('#myTable').DataTable({
      "data" : data,
      "columns" : [
          { "title" : "#", "width" : "2%" },
          { "title" : "TAHUN ANGGARAN" },
          { "title" : "STATUS"},
          { "title" : "ACTION","width" : "10%", "orderable": false }
      ]
  });

});

function aktif(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Tahun Anggaran Ini Akan Diaktifkan ",
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
      swal("Berhasil!", "Tahun Anggaran Berhasil Diaktifkan", "success");
    } else {
      swal('Dibatalkan', 'Tahun Anggaran Batal Diaktifkan :)', 'error');
    }
  });
}
</script>
@endpush
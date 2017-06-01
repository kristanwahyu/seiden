@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'DIPA Output')

@section('sidebar')
    @include('sidebar.admin')
@endsection

@section('content')
  {{-- AWAL MAIN CONTENT --}}
  <div class="main-content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

              <div class="well">
                <div class="form-group">
                  <table style="width:50%">
                    <tr>
                      <td><b><h3>Kode Satuan Kerja </h3></b></td>
                      <td><b><h3> : </h3></b></td>
                      <td><b><h3> SAT001</h3></b></td>
                    </tr>
                    <tr>
                      <td><b><h3>Satuan Kerja </h3></b></td>
                      <td><b><h3> : </h3></b></td>
                      <td><b><h3> Satuan Kerja-1</h3></b></td>
                    </tr>
                    <tr>
                      <td><b><h3>Program </h3></b></td>
                      <td><b><h3> : </h3></b></td>
                      <td><b><h3> PRG0001 - Program-1</h3></b></td>
                    </tr>
                    <tr>
                      <td><b><h3>Kegiatan </h3></b></td>
                      <td><b><h3> : </h3></b></td>
                      <td><b><h3> KGT00001 - Kegiatan-1</h3></b></td>
                    </tr>
                    <tr>
                      <td><b><h3>Tahun Anggaran </h3></b></td>
                      <td><b><h3> : </h3></b></td>
                      <td><b><h3> 2017</h3></b></td>
                    </tr>
                    <tr>
                      <td><b><h3>Nilai </h3></b></td>
                      <td><b><h3> : </h3></b></td>
                      <td><b><h3> Rp. 300.000.000</h3></b></td>
                    </tr>
                  </table>
                </div>
              </div>

              {{-- awal tabel DIPA --}}
              <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">DIPA Output</h3>
                </div>
                {{-- awal panel body --}}
                <div class="panel-body">
                  <div class="text-right">
                      <button class="btn btn-primary" data-toggle="modal" href='#modal-tambah'><i class="fa fa-plus"></i> Tambah</button>
                  </div>
                  <br>
                  {{-- awal pembungkus tabel DIPA --}}
                  <div class="table-responsive">
                      <table class="table table-bordered table-condensed table-striped" id="myTable">

                      </table>
                  </div> {{-- akhir pembungkus tabel DIPA --}}
                  <div class="text-left">
                      <a href="{{ url('/dipa-kegiatan') }}" class="btn btn-warning" role="button"><i class="fa fa-reply"></i> Kembali</a>
                  </div>
                </div> {{-- akhir panel body --}}
              </div> {{-- akhir tabel DIPA --}}
            </div>
        </div>
      </div>
  </div>
  {{-- AKHIR MAIN CONTENT --}}

  {{-- AWAL MODAL TAMBAH OUTPUT --}}
  <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Tambah Output</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode Output</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_kode_output" name="tambah_kode_output" placeholder="Contoh : OP00001">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama Output</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_nama_output" name="tambah_nama_output" placeholder="Contoh : Output-1.1">
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
  {{-- AKHIR MODAL TAMBAH OUTPUT --}}

  {{-- AWAL MODAL UBAH OUTPUT --}}
  <div class="modal fade" id="modal-ubah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Output</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode Output</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_kode_output" name="ubah_kode_output">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama Output</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_nama_output" name="ubah_nama_output">
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
  {{-- AKHIR MODAL UBAH OUTPUT --}}
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
        "OP00001",
        "Output-1.1",
        "Rp. 100.000.000",
        `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-ubah'> UBAH</button>
        <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="hapus()"> HAPUS</button>
        <a href="{{ url('/dipa-suboutput') }}" class="btn btn-success" role="button"> Pilih</a>`
      ],
      [
        "2",
        "OP00002",
        "Output-1.2",
        "Rp. 200.000.000",
        `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-ubah'> UBAH</button>
        <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="hapus()"> HAPUS</button>
        <a href="{{ url('/dipa-suboutput') }}" class="btn btn-success" role="button"> Pilih</a>`
      ],
    ];

  $('#myTable').DataTable({
      "data" : data,
      "columns" : [
          { "title" : "#", "width" : "2%" },
          { "title" : "KODE OUTPUT" },
          { "title" : "NAMA OUTPUT" },
          { "title" : "NILAI" },
          { "title" : "AKSI","width" : "16%", "orderable": false }
      ]
  });

});

function tambah(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data Output Ini Akan Disimpan ",
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
      swal("Berhasil!", "Data Output Berhasil Simpan", "success");
      $('#modal-tambah').modal('hide');
    } else {
      swal('Dibatalkan', 'Data Output Batal Simpan :)', 'error');
      $('#modal-tambah').modal('hide');
    }
  });
}

function ubah(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data Output Ini Akan Diubah ",
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
      swal("Berhasil!", "Data Output Berhasil Diubah", "success");
      $('#modal-ubah').modal('hide');
    } else {
      swal('Dibatalkan', 'Data Output Batal Diubah :)', 'error');
      $('#modal-ubah').modal('hide');
    }
  });
}

function hapus(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Output Ini Akan Dihapus",
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
      swal("Berhasil!", "Output Berhasil Dihapus", "success");
    } else {
      swal('Dibatalkan', 'Output Batal Dihapus :)', 'error');
    }
  });
}
</script>
@endpush

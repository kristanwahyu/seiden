@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'DIPA Program')

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
                      <td><b><h3>Tahun Anggaran </h3></b></td>
                      <td><b><h3> : </h3></b></td>
                      <td><b><h3> 2017</h3></b></td>
                    </tr>
                  </table>
                </div>
              </div>

              {{-- awal tabel DIPA --}}
              <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">DIPA Program</h3>
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
                      <button class="btn btn-warning" data-toggle="modal"><i class="fa fa-reply"></i> <a href="{{ url('/dipa') }}"> <span style="color: white;">Kembali</span></button>
                  </div>
                </div> {{-- akhir panel body --}}
              </div> {{-- akhir tabel DIPA --}}
            </div>
        </div>
      </div>
  </div>
  {{-- AKHIR MAIN CONTENT --}}

  {{-- AWAL MODAL TAMBAH PROGRRAM --}}
  <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Tambah Program</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode Program</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="kode_program" name="kode_program" placeholder="Contoh : PRG0001">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama Program</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="nama_program" name="nama_program" placeholder="Contoh : Program-1">
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
  {{-- AKHIR MODAL TAMBAH PROGRRAM --}}

  {{-- AWAL MODAL UBAH PROGRRAM --}}
  <div class="modal fade" id="modal-ubah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Tambah Program</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode Program</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="kode_program" name="kode_program">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama Program</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="nama_program" name="nama_program">
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
  {{-- AKHIR MODAL UBAH PROGRRAM --}}
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
        "PRG0001",
        "Program-1",
        "Rp. 300.000.000",
        `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-ubah'> UBAH</button>
        <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="hapus()"> HAPUS</button>
        <button class="btn btn-success btn-sm" data-toggle="modal" href='/dipa-program'> PILIH</button>`
      ],
      [
        "2",
        "PRG0002",
        "Program-2",
        "Rp. 10.000.000",
        `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-ubah'> UBAH</button>
        <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="hapus()"> HAPUS</button>
        <button class="btn btn-success btn-sm" data-toggle="modal" href='/dipa-program'> PILIH</button>`
      ],
    ];

  $('#myTable').DataTable({
      "data" : data,
      "columns" : [
          { "title" : "#", "width" : "2%" },
          { "title" : "KODE PROGRAM" },
          { "title" : "NAMA PROGRAM" },
          { "title" : "NILAI" },
          { "title" : "ACTION","width" : "16%", "orderable": false }
      ]
  });

});

function hapus(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Program Ini Akan Dihapus",
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
      swal("Berhasil!", "Program Berhasil Dihapus", "success");
    } else {
      swal('Dibatalkan', 'Program Batal Dihapus :)', 'error');
    }
  });
}
</script>
@endpush

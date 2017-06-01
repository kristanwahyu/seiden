@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'Satuan Kerja')

@section('sidebar')
    @include('sidebar.admin')
@endsection

@section('content')
  {{-- AWAL MAIN CONTENT --}}
  <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- Breadcrumb --}}
                <div class="breadcrumb-wrapper">
                    <ul class="breadcrumb">
                        <li><a href=""><i class="fa fa-home fa-fw"></i></a>
                        </li>
                        <li class="active-bread">Satuan Kerja</li>
                    </ul>
                </div>
                {{-- End Breadcrumb --}} 
              
              	{{-- awal tabel satuan kerja --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Satuan Kerja</h3>
                    </div>
                    {{-- awal panel body --}}
                    <div class="panel-body">
                        <div class="text-right">
                            <button class="btn btn-primary" data-toggle="modal" href='#modal-tambah'><i class="fa fa-plus"></i> Tambah</button>
                        </div>
                        <br> 
                        {{-- awal pembungkus tabel satuan kerja --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed table-striped" id="myTable">

                            </table>
                        </div> {{-- akhir pembungkus tabel satuan kerja --}}
                    </div> {{-- akhir panel body --}}
                </div> {{-- akhir tabel satuan kerja --}}
            </div>
        </div>
    </div>
</div>
  {{-- AKHIR MAIN CONTENT --}}

  {{-- AWAL MODAL TAMBAH SATUAN KERJA --}}
  <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Tambah Satuan Kerja</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode Satuan Kerja</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_kode_satuan_kerja" name="tambah_kode_satuan_kerja" placeholder="Contoh : SAT001">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Satuan Kerja</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_satuan_kerja" name="tambah_satuan_kerja" placeholder="Contoh : Satuan Kerja-1">
                                  </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-8">
                                  <label class="radio-inline"><input type="radio" id="aktif" name="status">Aktif</label>
                                  <label class="radio-inline"><input type="radio" id="tidak_aktif" name="status">Tidak Aktif</label>
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
  {{-- AKHIR MODAL TAMBAH SATUAN KERJA --}}

  {{-- AWAL MODAL UBAH SATUAN KERJA --}}
  <div class="modal fade" id="modal-ubah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Satuan Kerja</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode Satuan Kerja</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_kode_satuan_kerja" name="ubah_kode_satuan_kerja">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Satuan Kerja</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_satuan_kerja" name="ubah_satuan_kerja">
                                  </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-8">
                                  <label class="radio-inline"><input type="radio" id="aktif" name="ubah_status">Aktif</label>
                                  <label class="radio-inline"><input type="radio" id="tidak_aktif" name="ubah_status">Tidak Aktif</label>
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
  {{-- AKHIR MODAL UBAH SATUAN KERJA --}}
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
        "SAT001",
        "Satuan Kerja-1",
        `<span class="label label-success">AKTIF</span>`,
        `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-ubah'> UBAH</button>`
      ],
      [
        "2",
        "SAT002",
        "Satuan Kerja-2",
        `<span class="label label-danger">TIDAK AKTIF</span>`,
        `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-ubah'> UBAH</button>`
      ],
      [
          "3",
          "SAT003",
          "Satuan Kerja-3",
          `<span class="label label-success">AKTIF</span>`,
          `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-ubah'> UBAH</button>`
      ],
    ];

  $('#myTable').DataTable({
      "data" : data,
      "columns" : [
          { "title" : "#", "width" : "2%" },
          { "title" : "KODE" },
          { "title" : "SATUAN KERJA" },
          { "title" : "STATUS"},
          { "title" : "AKSI","width" : "5%", "orderable": false }
      ]
  });

});

function tambah(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data Satuan Kerja Ini Akan Disimpan ",
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
      swal("Berhasil!", "Data Satuan Kerja Berhasil Simpan", "success");
      $('#modal-tambah').modal('hide');
    } else {
      swal('Dibatalkan', 'Data Satuan Kerja Batal Simpan :)', 'error');
      $('#modal-tambah').modal('hide');
    }
  });
}

function ubah(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data Satuan Kerja Ini Akan Diubah ",
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
      swal("Berhasil!", "Data Satuan Kerja Berhasil Diubah", "success");
      $('#modal-ubah').modal('hide');
    } else {
      swal('Dibatalkan', 'Data Satuan Kerja Batal Diubah :)', 'error');
      $('#modal-ubah').modal('hide');
    }
  });
}
</script>
@endpush

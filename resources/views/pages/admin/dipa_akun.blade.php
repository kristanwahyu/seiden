@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'DIPA Akun')

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
                      <td><b><h3>Output </h3></b></td>
                      <td><b><h3> : </h3></b></td>
                      <td><b><h3> OP00001 - Output-1.1</h3></b></td>
                    </tr>
                    <tr>
                      <td><b><h3>Sub Output </h3></b></td>
                      <td><b><h3> : </h3></b></td>
                      <td><b><h3> SOP00001 - SubOutput-1.1</h3></b></td>
                    </tr>
                    <tr>
                      <td><b><h3>Komponen </h3></b></td>
                      <td><b><h3> : </h3></b></td>
                      <td><b><h3> KP00001 - Komponen-1.1</h3></b></td>
                    </tr>
                    <tr>
                      <td><b><h3>Sub Komponen </h3></b></td>
                      <td><b><h3> : </h3></b></td>
                      <td><b><h3> SKP00001 - SubKomponen-1.1</h3></b></td>
                    </tr>
                    <tr>
                      <td><b><h3>Tahun Anggaran </h3></b></td>
                      <td><b><h3> : </h3></b></td>
                      <td><b><h3> 2017</h3></b></td>
                    </tr>
                    <tr>
                      <td><b><h3>Nilai </h3></b></td>
                      <td><b><h3> : </h3></b></td>
                      <td><b><h3> Rp. 12.500.000</h3></b></td>
                    </tr>
                  </table>
                </div>
              </div>

              {{-- awal tabel DIPA --}}
              <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">DIPA Akun</h3>
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
                      <a href="{{ url('/dipa-subkomponen') }}" class="btn btn-warning" role="button"><i class="fa fa-reply"></i> Kembali</a>
                  </div>
                </div> {{-- akhir panel body --}}
              </div> {{-- akhir tabel DIPA --}}
            </div>
        </div>
      </div>
  </div>
  {{-- AKHIR MAIN CONTENT --}}

  {{-- AWAL MODAL TAMBAH AKUN --}}
  <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Tambah Akun</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode Akun</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_kode_akun" name="tambah_kode_akun" placeholder="Contoh : AK0001">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama Akun</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_nama_akun" name="tambah_nama_akun" placeholder="Contoh : Akun 01">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Vol</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_vol" name="tambah_vol" placeholder="Contoh : 3">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Satuan</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_satuan" name="tambah_satuan" placeholder="Contoh : Orang">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Harga Satuan</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_harga_satuan" name="tambah_harga_satuan" placeholder="Contoh : Rp. 2.500.000">
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
  {{-- AKHIR MODAL TAMBAH AKUN --}}

  {{-- AWAL MODAL UBAH AKUN --}}
  <div class="modal fade" id="modal-ubah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Akun</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kode Akun</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ubah_kode_akun" name="ubah_kode_akun">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama Akun</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ubah_nama_akun" name="ubah_nama_akun">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Vol</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ubah_vol" name="ubah_vol">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Satuan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ubah_satuan" name="ubah_satuan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Harga Satuan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ubah_harga_satuan" name="ubah_harga_satuan">
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
  {{-- AKHIR MODAL UBAH AKUN --}}
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
        "AK0001",
        "Akun 01",
        "1",
        "Orang",
        "Rp. 7.500.000",
        "Rp. 7.500.000",
        `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-ubah'> UBAH</button>
        <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="hapus()"> HAPUS</button>
        <a href="{{ url('/#') }}" class="btn btn-success" role="button"> Pilih</a>`
      ],
      [
        "2",
        "AK0002",
        "Akun 02",
        "2",
        "Kegiatan",
        "Rp. 2.500.000",
        "Rp. 5.000.000",
        `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-ubah'> UBAH</button>
        <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="hapus()"> HAPUS</button>
        <a href="{{ url('/#') }}" class="btn btn-success" role="button"> Pilih</a>`
      ],
    ];

  $('#myTable').DataTable({
      "data" : data,
      "columns" : [
          { "title" : "#", "width" : "2%" },
          { "title" : "KODE AKUN" },
          { "title" : "NAMA AKUN" },
          { "title" : "VOL" },
          { "title" : "SATUAN" },
          { "title" : "HARGA SATUAN" },
          { "title" : "NILAI" },
          { "title" : "AKSI","width" : "16%", "orderable": false }
      ]
  });

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

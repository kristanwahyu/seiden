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
    {{-- Breadcrumb --}}
    <div class="breadcrumb-wrapper">
        <ul class="breadcrumb">
            <li><a href=""><i class="fa fa-home fa-fw"></i></a></li>
            <li><a href="">DIPA</a></li>
            <li class="active-bread">Satuan Kerja-1</li>
        </ul>
    </div>
    {{-- End Breadcrumb --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- <div class="well">
                    <div class="form-group">
                        <table style="width:50%">
                            <tr>
                                <td><b><h3>Kode Satuan Kerja </h3></b>
                                </td>
                                <td><b><h3> : </h3></b>
                                </td>
                                <td><b><h3> SAT001</h3></b>
                                </td>
                            </tr>
                            <tr>
                                <td><b><h3>Satuan Kerja </h3></b>
                                </td>
                                <td><b><h3> : </h3></b>
                                </td>
                                <td><b><h3> Satuan Kerja-1</h3></b>
                                </td>
                            </tr>
                            <tr>
                                <td><b><h3>Program </h3></b>
                                </td>
                                <td><b><h3> : </h3></b>
                                </td>
                                <td><b><h3> 2017</h3></b>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div> --}}

                {{-- awal tabel DIPA --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">DIPA Program</h3>
                    </div>
                    {{-- awal panel body --}}
                    <div class="panel-body">
                        <div class="row detail-box">
                            <div class="col-md-4">
                                <table class="table table-borderless detail-table no-margin">
                                    <tbody>
                                        <tr>
                                            <td>KODE SATUAN KERJA</td>
                                            <td>:</td>
                                            <td>SAT0001</td>
                                        </tr>
                                        <tr>
                                            <td>SATUAN KERJA</td>
                                            <td>:</td>
                                            <td>SATUAN KERJA-1</td>
                                        </tr>
                                        <tr>
                                            <td>PROGRAM</td>
                                            <td>:</td>
                                            <td>PRG0001-PROGRAM1</td>
                                        </tr>
                                        <tr>
                                            <td>KEGIATAN</td>
                                            <td>:</td>
                                            <td>KGT0001-KEGIATAN1</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-borderless detail-table no-margin">
                                    <tbody>
                                        <tr>
                                            <td>OUTPUT</td>
                                            <td>:</td>
                                            <td>OP0001-OUTPUT1</td>
                                        </tr>
                                        <tr>
                                            <td>SUB OUTPUT</td>
                                            <td>:</td>
                                            <td>SOP0001-SUBOUTPUT1.1</td>
                                        </tr>
                                        <tr>
                                            <td>KOMPONEN</td>
                                            <td>:</td>
                                            <td>KOMPONEN1</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-borderless detail-table no-margin">
                                    <tbody>
                                        <tr>
                                            <td>SUB KOMPONEN</td>
                                            <td>:</td>
                                            <td class="text-right">SUBKOMPONEN1.1</td>
                                        </tr>
                                        <tr>
                                            <td>TAHUN ANGGARAN</td>
                                            <td>:</td>
                                            <td class="text-right">2017</td>
                                        </tr>
                                        <tr>
                                            <td>NILAI</td>
                                            <td>:</td>
                                            <td class="text-right">RP. 12.500.000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn btn-primary" data-toggle="modal" href='#modal-tambah'><i class="fa fa-plus"></i> Tambah</button>
                            </div>
                            <div class="col-sm-6 text-right">
                                <span>Lihat Detail Program &nbsp;</span>
                                <div class="btn-detail btn-active"><i class="fa fa-chevron-up"></i></div>
                            </div>
                        </div>
                        <br> 
                        {{-- awal pembungkus tabel DIPA --}}
                        <div class="table-responsive">
                            {{-- <div class="btn-filter-search"><i class="fa fa-chevron-down"></i></div> --}}
                            <table class="table table-bordered table-condensed table-striped" id="myTable">

                            </table>
                        </div> {{-- akhir pembungkus tabel DIPA --}}
                        <div class="text-left">
                            <a href="{{ url('/dipa') }}" class="btn btn-warning" role="button"><i class="fa fa-reply"></i> Kembali</a>
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
                                      <input type="text" class="form-control" id="tambah_kode_program" name="tambah_kode_program" placeholder="Contoh : PRG0001">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama Program</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_nama_program" name="tambah_nama_program" placeholder="Contoh : Program-1">
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
  {{-- AKHIR MODAL TAMBAH PROGRRAM --}}

  {{-- AWAL MODAL UBAH PROGRRAM --}}
  <div class="modal fade" id="modal-ubah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Program</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode Program</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_kode_program" name="ubah_kode_program">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama Program</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_nama_program" name="ubah_nama_program">
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
        <a href="{{ url('/dipa/dipa-kegiatan') }}" class="btn btn-success" role="button"> Pilih</a>`
        ],
        [
        "2",
        "PRG0002",
        "Program-2",
        "Rp. 10.000.000",
        `<button class="btn btn-warning btn-sm" data-toggle="modal" href='#modal-ubah'> UBAH</button>
        <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="hapus()"> HAPUS</button>
        <a href="{{ url('/dipa/dipa-kegiatan') }}" class="btn btn-success" role="button"> Pilih</a>`
        ],
    ];

    $('#myTable').DataTable({
        "data" : data,
        "columns" : [
            { "title" : "#", "width" : "2%" },
            { "title" : "KODE PROGRAM" },
            { "title" : "NAMA PROGRAM" },
            { "title" : "NILAI" },
            { "title" : "AKSI","width" : "16%", "orderable": false }
        ]
    });

    //btn filter search
    $('.btn-detail').click(function(){
        $('.detail-box').slideToggle(200);
        $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
        $(this).toggleClass('btn-active');
    });

});

function tambah(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data Program Ini Akan Disimpan ",
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
        swal("Berhasil!", "Data Program Berhasil Simpan", "success");
        $('#modal-tambah').modal('hide');
    } else {
        swal('Dibatalkan', 'Data Program Batal Simpan :)', 'error');
        $('#modal-tambah').modal('hide');
    }
    });
}

function ubah(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data Program Ini Akan Diubah ",
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
      swal("Berhasil!", "Data Program Berhasil Diubah", "success");
      $('#modal-ubah').modal('hide');
    } else {
      swal('Dibatalkan', 'Data Program Batal Diubah :)', 'error');
      $('#modal-ubah').modal('hide');
    }
  });
}

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

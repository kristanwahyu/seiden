@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
@endpush

@section('title', 'Master KPPBC')

@section('sidebar')
    @include('sidebar.admin')
@endsection

@section('content')
  {{-- AWAL MAIN CONTENT --}}
<div class="main-content">
    {{-- Breadcrumb --}}
    <div class="content-heading clearfix">
        <div class="heading-left">
            <h1 class="page-title">Kantor Pengawasan dan Pelayanan pada Direktorat Jenderal Bea dan Cukai</h1>
            <p class="page-subtitle">Fasilitas untuk create, read, dan update master data KPPBC</p>
        </div>
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Master Data</a></li>
            <li class="active">KPPBC</li>
        </ul>
    </div>
    {{-- End Breadcrumb --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

              	{{-- awal tabel kpbc --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Master KPBC</h3>
                    </div>
                    {{-- awal panel body --}}
                    <div class="panel-body">
                        <div class="text-right">
                            <button class="btn btn-primary" data-toggle="modal" href='#modal-tambah'  id="new-kpbc"><i class="fa fa-plus"></i> Tambah</button>
                        </div>
                        <br>
                        {{-- awal pembungkus tabel satuan kerja --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed table-striped" id="myTable">

                            </table>
                        </div> {{-- akhir pembungkus tabel satuan kerja --}}
                    </div> {{-- akhir panel body --}}
                </div> {{-- akhir tabel satuan kerja --}}

            </div> {{-- End col-md-12 --}}
        </div> {{-- End Row --}}
    </div> {{-- End Container Fluid --}}
 
</div>
{{-- AKHIR MAIN CONTENT --}}

  {{-- AWAL MODAL TAMBAH kpbc --}}
  <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Tambah KPPBC</h4>
              </div>
              <div class="modal-body">
                  <form action="{{url('/kpbc/store')}}" method="POST" class="form-horizontal" role="form" id="formTambah">
                    {{ csrf_field() }}
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode KPPBC</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_kode_kpbc" placeholer="Contoh : 00001" name="kode_kpbc">
                                  </div>
                                  <span class="text-danger">
                                    <strong id="kode-error"></strong>
                                </span>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama KPPBC</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_nama_kpbc" name="nama_kpbc" placeholder="Contoh : KPPBC xxxx/Kantor Kanwil xxxx">
                                      <span class="text-danger">
                                        <strong id="nama-error"></strong>
                                    </span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Eselon KPPBC</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_eselon_kpbc" name="eselon_kpbc" placeholder="Contoh : 10000">
                                      <span class="text-danger">
                                        <strong id="eselon-error"></strong>
                                    </span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kota KPPBC</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_kota_kpbc" name="kota_kpbc" placeholder="Contoh : Kota Semarang">
                                      <span class="text-danger">
                                        <strong id="kota-error"></strong>
                                    </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-simpan">Simpan</button>
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
                  <h4 class="modal-title">Ubah KPBC</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form" id="formUbah">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode KPBC</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_kite_kode_kpbc" name="kode_kpbc">
                                      <input type="hidden" id="id_binding">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama KPBC</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_kite_nama_kpbc" name="nama_kpbc">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Eselon KPBC</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_kite_eselon_kpbc" name="nama_kpbc">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kota KPBC</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_kite_kota_kpbc" name="nama_kpbc">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-ubah-simpan">Simpan</button>
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

<script>
$(function(){
    'use strict';
    var table = $('#myTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            type : "GET",
            url : "/kpbc/show"
        },
        "columns": [
            {
                title: "NO",
                data: "DT_Row_Index",
                name: "DT_Row_Index",
                orderable: false,
                searchable: false,
                width: "1%"
            },
            {
                title: 'KODE KPBC',
                data: 'kite_kode_kpbc',
                defaultContent: "-",
                name: 'kite_kode_kpbc'
            },
            {
                title: 'NAMA KPBC',
                data: 'kite_nama_kpbc',
                defaultContent: "-",
                name: 'kite_nama_kpbc'
            },
            {
                title: 'ESELON KPBC',
                data: 'kite_eselon_kpbc',
                defaultContent: "-",
                name: 'kite_eselon_kpbc'
            },
            {
                title: 'KOTA KPBC',
                data: 'kite_kota_kpbc',
                defaultContent: "-",
                name: 'kite_kota_kpbc'
            },
            {
                title: '<div class="text-center">ACTION</div>',
                data: null,
                name: 'action',
                render: function (data) {
                    var actions = '';
                    actions = `<button class='btn btn-warning btn-sm ubah-kpbc' data-toggle='modal' data-id='${data["kite_id_kpbc"]}' href='#modal-ubah'><i class='fa fa-pencil'></i> Ubah</button>
                                <button class='btn btn-danger btn-sm hapus-kpbc' data-toggle='modal' data-id='${data['kite_id_kpbc']}'><i class='fa fa-trash'></i> Hapus</button>`;                    
                    return actions.replace();
                },
                width: "13%",
                orderable: false,
                searchable: false,
            }


        ],
    });

    //generate code
   // $("#new-satker").on('click', function(){
     //   $.get("/satuan-kerja/code-generate", function(data, status){
       //     if(status == 'success'){
         //       $('#tambah_kode_kpbc').val(data);
           // }
       // });
   // });
    //sweet

    $("#btn-simpan").click(function(){
            swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Master KPPBC Ini Akan Disimpan ",
            type: "warning",
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
                    url : "/kpbc/store", 
                    type : "post",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "kode_kpbc" : $("#tambah_kode_kpbc").val(),
                        "nama_kpbc" : $("#tambah_nama_kpbc").val(),
                        "eselon_kpbc" : $("#tambah_eselon_kpbc").val(),
                        "kota_kpbc" : $("#tambah_kota_kpbc").val()
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
                            swal("Gagal", "Data Gagal Disimpan", "error");
                        }, 1000);
                    }
                });
            } else {
            swal('Dibatalkan', 'Data Master KPPBC Batal Simpan :)', 'error');
            $('#modal-tambah').modal('hide');
            }
        });
    });

    //UBAH
    $("#myTable").on('click','.ubah-kpbc', function(){
        $.get("/kpbc/get/"+$(this).data('id'), function(data, status){
            if(status == 'success'){
                console.log(data);
                $("#ubah_kite_kode_kpbc").val(data['kite_kode_kpbc']);
                $("#ubah_kite_nama_kpbc").val(data['kite_nama_kpbc']);
                $("#ubah_kite_eselon_kpbc").val(data['kite_eselon_kpbc']);
                $("#ubah_kite_kota_kpbc").val(data['kite_kota_kpbc']);
                $("#id_binding").val(data['kite_id_kpbc']);
            }
        });
    });

    $("#btn-ubah-simpan").click(function(){
        swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Satuan Kerja Ini Akan Diubah ",
            type: "warning",
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
                    url : "/kpbc/update/"+$("#id_binding").val(),
                    type : "PUT",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "kode_kpbc" : $("#ubah_kite_kode_kpbc").val(),
                        "nama_kpbc" : $("#ubah_kite_nama_kpbc").val(),
                        "eselon_kpbc" : $("#ubah_kite_eselon_kpbc").val(),
                        "kota_kpbc" : $("#ubah_kite_kota_kpbc").val(),
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
                            swal("Gagal", "Data Gagal Diubah", "error");
                        }, 1000);
                    }
                });
            } else {
            swal('Dibatalkan', 'Data Satuan Kerja Batal Simpan :)', 'error');
                $('#modal-tambah').modal('hide');
            }
        });
    });

    //hapus
    $("#myTable").on('click','.hapus-kpbc', function(){
    var data = $(this).data('id');
    swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Master KPBC akan di hapus PERMANEN ! ",
            type: "warning",
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
                    url : "/kpbc/delete/"+data,
                    type : "DELETE",
                    data : {
                        "_token": "{{ csrf_token() }}"
                    },
                    success : function(data, status){
                        if(status=="success"){
                            setTimeout(function(){
                                swal({
                                    title: "Sukses",
                                    text: "Data Terhapus!",
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
            swal('Dibatalkan', 'Data tidak dihapus :)', 'error');
            }
        });
});

    $('#modal-tambah').on('hidden.bs.modal', function (e) {
        $(this)
            .find("input[type='text']")
            .val('')
            .end()
    });
});


</script>
@endpush

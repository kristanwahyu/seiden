@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
@endpush

@section('title', 'Master Vendor')

@section('sidebar')
    @include('sidebar.admin')
@endsection

@section('content')
  {{-- AWAL MAIN CONTENT --}}
<div class="main-content">
    {{-- Breadcrumb --}}
    <div class="content-heading clearfix">
        <div class="heading-left">
            <h1 class="page-title">Vendor</h1>
            <p class="page-subtitle">Fasilitas untuk create, read, dan update master data Vendor</p>
        </div>
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Master Data</a></li>
            <li class="active">Vendor</li>
        </ul>
    </div>
    {{-- End Breadcrumb --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

              	{{-- awal tabel vendor --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Master Vendor</h3>
                    </div>
                    {{-- awal panel body --}}
                    <div class="panel-body">
                        <div class="text-right">
                            <button class="btn btn-primary" data-toggle="modal" href='#modal-tambah'  id="new-vendor"><i class="fa fa-plus"></i> Tambah</button>
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

  {{-- AWAL MODAL TAMBAH vendor --}}
  <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Tambah Vendor</h4>
              </div>
              <div class="modal-body">
                  <form action="{{url('/vendor/store')}}" method="POST" class="form-horizontal" role="form" name="validasiTambah" id="formTambah">
                    {{ csrf_field() }}
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">NPWP Vendor</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_kode_vendor" placeholer="Contoh : 00001" name="kode_vendor" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama Vendor</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_nama_vendor" name="nama_vendor" placeholder="Contoh : PT XXXXXXXXXXX">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Alamat Vendor</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_eselon_vendor" name="eselon_vendor" placeholder="Contoh : 10000">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Negara Vendor</label>
                                  <div class="col-sm-8">
                                    <select class="form-control negara" id="negara" name="negara" data-id="">
                                    </select>                                  
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Status Vendor</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="status" id="status" data-id="">
                                        <option value="Supplier">Supplier</option>
                                        <option value="Importir">Importir</option>
                                        <option value="Customer">Customer</option>
                                        <option value="Eksportir">Eksportir</option>
                                    </select>                                
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
                  <h4 class="modal-title">Ubah vendor</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form" id="formUbah">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode vendor</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_kite_kode_vendor" name="kode_vendor">
                                      <input type="hidden" id="id_binding">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama vendor</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_kite_nama_vendor" name="nama_vendor">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Eselon vendor</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_kite_eselon_vendor" name="nama_vendor">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kota vendor</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_kite_kota_vendor" name="nama_vendor">
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
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    'use strict';

    //datatable
    var table = $('#myTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            type : "GET",
            url : "/vendors/show"
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
                title: 'NPWP VENDOR',
                data: 'kite_npwp_vendor',
                defaultContent: "-",
                name: 'kite_npwp_vendor'
            },
            {
                title: 'NAMA VENDOR',
                data: 'kite_nama_vendor',
                defaultContent: "-",
                name: 'kite_nama_vendor'
            },
            {
                title: 'ALAMAT VENDOR',
                data: 'kite_alamat_vendor',
                defaultContent: "-",
                name: 'kite_alamat_vendor'
            },
            {
                title: 'NEGARA VENDOR',
                data: 'kite_negara_vendor',
                defaultContent: "-",
                name: 'kite_negara_vendor'
            },
            {
                title: 'STATUS VENDOR',
                data: 'kite_status_vendor',
                defaultContent: "-",
                name: 'kite_status_vendor'
            },
            {
                title: '<div class="text-center">ACTION</div>',
                data: null,
                name: 'action',
                render: function (data) {
                    var actions = '';
                    actions = `<button class='btn btn-warning btn-sm ubah-vendor' data-toggle='modal' data-id='${data["kite_id_vendor"]}' href='#modal-ubah'><i class='fa fa-pencil'></i> Ubah</button>
                                <button class='btn btn-danger btn-sm hapus-vendor' data-toggle='modal' data-id='${data['kite_id_vendor']}'><i class='fa fa-trash'></i> Hapus</button>`;                    
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
         //       $('#tambah_kode_vendor').val(data);
           // }
       // });
   // });
    //sweet

    //select
            $('.negara').select2({
                    placeholder: 'Pilih Negara ...',
                    minimumInputLength: 3,
                    ajax: {
                        url: "/vendors/negara",
                        dataType: 'json',
                        processResults: function (data) {
                            return {
                                results:  $.map(data, function (item) {
                                        return {
                                            text: item.kite_nama_negara,
                                            id: item.kite_id_negara
                                        }
                                    })
                            };
                        },
                        cache: true,
                    },
                });



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
                    url : "/vendor/store", 
                    type : "post",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "kode_vendor" : $("#tambah_kode_vendor").val(),
                        "nama_vendor" : $("#tambah_nama_vendor").val(),
                        "eselon_vendor" : $("#tambah_eselon_vendor").val(),
                        "kota_vendor" : $("#tambah_kota_vendor").val()
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
    $("#myTable").on('click','.ubah-vendor', function(){
        $.get("/vendor/get/"+$(this).data('id'), function(data, status){
            if(status == 'success'){
                console.log(data);
                $("#ubah_kite_kode_vendor").val(data['kite_kode_vendor']);
                $("#ubah_kite_nama_vendor").val(data['kite_nama_vendor']);
                $("#ubah_kite_eselon_vendor").val(data['kite_eselon_vendor']);
                $("#ubah_kite_kota_vendor").val(data['kite_kota_vendor']);
                $("#id_binding").val(data['kite_id_vendor']);
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
                    url : "/vendors/update/"+$("#id_binding").val(),
                    type : "PUT",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "kode_vendor" : $("#ubah_kite_kode_vendor").val(),
                        "nama_vendor" : $("#ubah_kite_nama_vendor").val(),
                        "eselon_vendor" : $("#ubah_kite_eselon_vendor").val(),
                        "kota_vendor" : $("#ubah_kite_kota_vendor").val(),
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
    $("#myTable").on('click','.hapus-vendor', function(){
    var data = $(this).data('id');
    swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Master vendor akan di hapus PERMANEN ! ",
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
                    url : "/vendor/delete/"+data,
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

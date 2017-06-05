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
    {{-- Breadcrumb --}}
    <div class="breadcrumb-wrapper">
        <ul class="breadcrumb">
            <li><a href=""><i class="fa fa-home fa-fw"></i></a>
            </li>
            <li class="active-bread">Satuan Kerja</li>
        </ul>
    </div>
    {{-- End Breadcrumb --}} 
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{-- Breadcrumb --}}

                {{-- End Breadcrumb --}}
              
              	{{-- awal tabel satuan kerja --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Satuan Kerja</h3>
                    </div>
                    {{-- awal panel body --}}
                    <div class="panel-body">
                        <div class="text-right">
                            <button class="btn btn-primary" data-toggle="modal" href='#modal-tambah'  id="new-satker"><i class="fa fa-plus"></i> Tambah</button>
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
                  <form action="{{url('/satuan-kerja/store')}}" method="POST" class="form-horizontal" role="form" id="formTambah">
                    {{ csrf_field() }}
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode Satuan Kerja</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_kode_satuan_kerja" name="kode_satKer">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Satuan Kerja</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_satuan_kerja" name="nama_satKer" placeholder="Contoh : Satuan Kerja-1">
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
                  <h4 class="modal-title">Ubah Satuan Kerja</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form" id="formUbah">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode Satuan Kerja</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_kode_satuan_kerja" name="kode_satKer">
                                      <input type="hidden" id="id_binding">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Satuan Kerja</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_satuan_kerja" name="nama_satKer">
                                  </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-8">
                                  <label class="radio-inline"><input type="radio" id="edit_aktif" name="ubah_status" value="1">Aktif</label>
                                  <label class="radio-inline"><input type="radio" id="edit_tidak_aktif" name="ubah_status" value="0">Tidak Aktif</label>
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
            url : "/satuan-kerja/show"
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
                title: 'KODE',
                data: 'dipa_kode_satuan_kerja',
                defaultContent: "-",
                name: 'dipa_kodeSK'
            },
            {
                title: 'NAMA SATUAN KERJA',
                data: 'dipa_satuan_kerja',
                defaultContent: "-",
                name: 'dipa_namaSK'
            },
            {
                title: '<div class="text-center">STATUS</div>',
                data: null,
                defaultContent: "-",
                name: 'dipa_satuan_kerja_status',
                render: function (data) {
                    var status = '';
                    if(data['dipa_satuan_kerja_status'] == 1) {
                        status = "<div class='text-center'><span class='label label-success' style='font-size:12px'>Aktif</span></div>";
                    } else {
                        status = "<div class='text-center'><span class='label label-danger' style='font-size:12px'>Tidak Aktif</span></div>";
                    }
                    return status.replace();
                },
                width: "10%",
                orderable: false
            },
            {  
                title: '<div class="text-center">ACTION</div>',
                data: null,
                name: 'action',
                render: function (data) {
                    var actions = '';
                    actions = "<button class='btn btn-warning btn-sm center-block ubah-satker' data-toggle='modal'' data-id='"+data['dipa_id_satuan_kerja']+"' href='#modal-ubah'><i class='fa fa-pencil'></i> Ubah</button>";
                    return actions.replace();
                },
                width: "8%",
                orderable: false
            }


        ],
    });

    //generate code
   // $("#new-satker").on('click', function(){
     //   $.get("/satuan-kerja/code-generate", function(data, status){
       //     if(status == 'success'){
         //       $('#tambah_kode_satuan_kerja').val(data);
           // }
       // });
   // });
    //sweet

    $("#btn-simpan").click(function(){
            swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Satuan Kerja Ini Akan Disimpan ",
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
                    url : "/satuan-kerja/store",
                    type : "POST",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "kode_satKer" : $("#tambah_kode_satuan_kerja").val(),
                        "nama_satKer" : $("#tambah_satuan_kerja").val(),
                        "status" : $('input[name=status]:checked', '#formTambah').val()
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
            swal('Dibatalkan', 'Data Satuan Kerja Batal Simpan :)', 'error');
            $('#modal-tambah').modal('hide');
            }
        });
    });

    //UBAH
    $("#myTable").on('click','.ubah-satker', function(){
        $.get("/satuan-kerja/get/"+$(this).data('id'), function(data, status){
            if(status == 'success'){
                console.log(data);
                $("#ubah_kode_satuan_kerja").val(data['dipa_kode_satuan_kerja']);
                $("#ubah_satuan_kerja").val(data['dipa_satuan_kerja']);
                if(data['dipa_satuan_kerja_status'] == 1) {
                    $("#edit_tidak_aktif").prop('checked',false);
                    $("#edit_aktif").prop('checked',true);
                } else {
                    $("#edit_tidak_aktif").prop('checked',false);
                    $("#edit_tidak_aktif").prop('checked',true);
                }
                $("#id_binding").val(data['dipa_id_satuan_kerja']);
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
                    url : "/satuan-kerja/update/"+$("#id_binding").val(),
                    type : "PUT",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "kode_satKer" : $("#ubah_kode_satuan_kerja").val(),
                        "nama_satKer" : $("#ubah_satuan_kerja").val(),
                        "status" : $('input[name=ubah_status]:checked', '#formUbah').val()
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
            swal('Dibatalkan', 'Data Satuan Kerja Batal Simpan :)', 'error');
                $('#modal-tambah').modal('hide');
            }
        });
    });
});

 
</script>
@endpush

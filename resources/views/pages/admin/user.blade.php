@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
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

    {{-- awal container fluid --}}
    <div class="container-fluid">
        <div class="row"> {{-- awal row --}}
            <div class="col-md-12"> {{-- awal col-md-12 --}}

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

            </div> {{-- akhir col-md-12 --}}
        </div> {{-- akhir row --}}
    </div> {{-- akhir container fluid --}}

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
                  <form action="" method="POST" class="form-horizontal" role="form" id="formTambah">
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
                                  <label class="col-sm-3 control-label">Password</label>
                                  <div class="col-sm-8">
                                      <input type="password" class="form-control" id="tambah_password" name="tambah_password" placeholder="Min: 8 Digit">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Jenis User</label>
                                  <div class="col-sm-8">
                                    <select id="tambah_jenis_user" class="form-control" data-style="btn-white">
                                      <option selected>- Pilih Jenis User -</option>
                                      <option value="1">Admin</option>
                                      <option value="2">KPA</option>
                                      <option value="3">PPK</option>
                                      <option value="4">Staf Pengelolah / Satuan Kerja</option>
                                      <option value="5">PPSPM</option>
                                      <option value="6">Operator SIMAK</option>
                                      <option value="7">Operator SAIBA</option>
                                      <option value="8">Operator Perlengkapan</option>
                                      <option value="9">Bendahara</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label" id="label_satker" style="display:none">Satuan Kerja</label>
                                  <div class="col-sm-8">
                                    <select id="tambah_satker_user" class="form-control" data-style="btn-white" style="display:none">
                                      {{-- ajax satker --}}
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-8">
                                  <label class="radio-inline"><input type="radio" id="aktif" name="tambah_status" value="1" checked>Aktif</label>
                                  <label class="radio-inline"><input type="radio" id="tidak_aktif" name="tambah_status" value="0">Tidak Aktif</label>
                                </div>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-simpan">Simpan</button>
                <button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
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
                  <form action="" method="POST" class="form-horizontal" role="form" id="ubahForm">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">User Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ubah_username" name="ubah_username">
                                    <input type="hidden" id="id_binding">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama Lengkap</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="ubah_nama_lengkap" name="ubah_nama_lengkap" placeholder="Contoh : Fais Nasrullah">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Jenis User</label>
                                <div class="col-sm-8">
                                <select id="ubah_jenis_user" class="form-control" data-style="btn-white">
                                    <option selected>- Pilih Jenis User -</option>
                                    <option value="1">Admin</option>
                                    <option value="2">KPA</option>
                                    <option value="3">PPK</option>
                                    <option value="4">Staf Pengelolah / Satuan Kerja</option>
                                    <option value="5">PPSPM</option>
                                    <option value="6">Operator SIMAK</option>
                                    <option value="7">Operator SAIBA</option>
                                    <option value="8">Operator Perlengkapan</option>
                                    <option value="9">Bendahara</option>
                                </select>
                                </div>
                            </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label" id="ubah_label_satker" style="display:none">Satuan Kerja</label>
                                  <div class="col-sm-8">
                                    <select id="ubah_satker_user" class="form-control" data-style="btn-white" style="display:none">
                                      {{-- ajax satker --}}
                                    </select>
                                  </div>
                              </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Status</label>
                              <div class="col-sm-8">
                                <label class="radio-inline"><input type="radio" id="ubah_aktif" name="ubah_status" value="1">Aktif</label>
                                <label class="radio-inline"><input type="radio" id="ubah_tidak_aktif" name="ubah_status" value="0">Tidak Aktif</label>
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
  {{-- AKHIR MODAL UBAH USER --}}
@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

<script>
var satker = "";
$(function(){
    'use strict';
     var table = $('#myTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            type : "GET",
            url : "/user/show"
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
                title: 'USERNAME',
                data: 'username',
                defaultContent: "-",
                name: 'username'
            },
            {
                title: 'NAMA LENGKAP',
                data: 'dipa_nama_pengguna',
                defaultContent: "-",
                name: 'dipa_nama_pengguna'
            },
            {
                title: '<div class="text-center">JENIS USER</div>',
                data: null,
                defaultContent: "-",
                name: 'dipa_jenis_pengguna',
                render: function (data) {
                    var status = '';
                    if (data['dipa_jenis_pengguna'] == 1) {
                        status = '<div class="text-center">ADMIN</div>';
                    } else if (data['dipa_jenis_pengguna'] == 2) {
                        status = '<div class="text-center">KPA</div>';
                    } else if (data['dipa_jenis_pengguna'] == 3) {
                        status = '<div class="text-center">PPK</div>';
                    } else if (data['dipa_jenis_pengguna'] == 4) {
                        status = '<div class="text-center">STAF (SATKER)</div>';
                    } else if (data['dipa_jenis_pengguna'] == 5) {
                        status = '<div class="text-center">PPSPM</div>';
                    } else if (data['dipa_jenis_pengguna'] == 6) {
                        status = '<div class="text-center">OP. SIMAK</div>';
                    } else if (data['dipa_jenis_pengguna'] == 7) {
                        status = '<div class="text-center">OP. SAIBA</div>';
                    } else if (data['dipa_jenis_pengguna'] == 8) {
                        status = '<div class="text-center">OP. Perlengkapan</div>';
                    } else {
                        status = '<div class="text-center">Bendahara</div>';
                    }
                    return status.replace();
                },
                width: "10%",
                orderable: false
            },

            {
                title: 'SATUAN KERJA',
                data: 'satuan_kerja.dipa_satuan_kerja',
                defaultContent: "-",
                name: 'satuanKerja.dipa_satuan_kerja',
                orderable: false
            },
            {
                title: '<div class="text-center">STATUS</div>',
                data: null,
                defaultContent: "-",
                name: 'dipa_pengguna_status',
                render: function (data) {
                    var status = '';
                    if(data['dipa_pengguna_status'] == 1) {
                        status = "<div class='text-center'><span class='label label-success' style='font-size:12px'>Aktif</span></div>";
                    } else {
                        status = "<div class='text-center'><span class='label label-danger' style='font-size:12px'>Tidak Aktif</span></div>";
                    }
                    return status.replace();
                },
                width: "10%",
                orderable: false,
                searchable: false
            },
            {
                title: '<div class="text-center">ACTION</div>',
                data: null,
                name: 'action',
                render: function (data) {
                    var actions = '';
                    var param = '';
                    if (data['dipa_jenis_pengguna'] == 1) {
                        param = 'disabled';
                    }
                    actions = `<button class='btn btn-warning btn-sm ubah-user' data-toggle='modal' data-id='${data['dipa_id_pengguna']}' href='#modal-ubah'><i class='fa fa-pencil'></i> Ubah</button>
                                <button class='btn btn-danger btn-sm hapus-user' data-toggle='modal' data-id='${data['dipa_id_pengguna']}' ${param}><i class='fa fa-trash'></i> Hapus</button>`;
                    return actions.replace();
                },
                width: "12.3%",
                orderable: false,
                searchable: false
            }


        ],
    });
    //APABILA PPK DAN STAFF
    $("#tambah_jenis_user").change(function(){
        if($(this).val() == 3 || $(this).val() == 4) {
            $('#label_satker').show(200);
            $('#tambah_satker_user').show(200);
            if(satker == ""){
                loadSatker($('#tambah_satker_user', null));
            }
        } else {
            $('#label_satker').hide(200);
            $('#tambah_satker_user').hide(200);
            $('#tambah_satker_user').val(null);
        }
    });
    $("#ubah_jenis_user").change(function(){
        if($(this).val() == 3 || $(this).val() == 4) {
            $('#ubah_label_satker').show(200);
            $('#ubah_satker_user').show(200);
            if(satker == ""){
                loadSatker($('#ubah_satker_user'), null);
            }
        } else {
            $('#ubah_label_satker').hide(200);
            $('#ubah_satker_user').hide(200);
            $('#ubah_satker_user').val(null);
        }
    });
    //SWEET TAMBAH
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
                    url : "/user/store",
                    type : "POST",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "username" : $("#tambah_username").val(),
                        "nama_user" : $("#tambah_nama_lengkap").val(),
                        "password" : $("#tambah_password").val(),
                        "status" : $('input[name=tambah_status]:checked', '#formTambah').val(),
                        "jenis" : $("#tambah_jenis_user").val(),
                        "satker_user" : $('#tambah_satker_user').val()
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
                        $('#modal-tambah input select').val('');
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

    // UBAH
    $("#myTable").on('click','.ubah-user', function(){
        $.get("/user/get/"+$(this).data('id'), function(data, status){
            if(status == 'success'){
                $("#ubah_username").val(data['username']);
                $("#ubah_nama_lengkap").val(data['dipa_nama_pengguna']);
                $("#ubah_jenis_user").val(data['dipa_jenis_pengguna']);
                if(data['dipa_pengguna_status'] == 1) {
                    $('#ubah_tidak_aktif').prop('checked', false);
                    $("#ubah_aktif").prop('checked', true);
                } else {
                    $('#ubah_aktif').prop('checked', false);
                    $("#ubah_tidak_aktif").prop('checked', true);
                }
                if(data['dipa_jenis_pengguna'] == 1) {
                    $('#ubah_tidak_aktif').prop('disabled', true);
                    $("#ubah_aktif").prop('disabled', true);
                }
                $("#id_binding").val(data['dipa_id_pengguna']);
                if(data['dipa_jenis_pengguna'] == 3 || data['dipa_jenis_pengguna'] == 4) {
                    $('#ubah_label_satker').show(200);
                    $('#ubah_satker_user').show(200);
                    loadSatker($('#ubah_satker_user'),data['dipa_id_satuan_kerja']);
                    //$("#ubah_satker_user").append('<option value="'+data['dipa_id_satuan_kerja']+'" selected>'+data['satuan_kerja']['dipa_kode_satuan_kerja']+' - '+data['satuan_kerja']['dipa_satuan_kerja']+'</option>');
                } else {
                    $('#ubah_label_satker').hide(200);
                    $('#ubah_satker_user').hide(200);
                    $('#ubah_satker_user').val('');
                }

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
                    url : "/user/update/"+$("#id_binding").val(),
                    type : "PUT",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "username" : $("#ubah_username").val(),
                        "nama_user" : $("#ubah_nama_lengkap").val(),
                        "status" : $('input[name=ubah_status]:checked', '#ubahForm').val(),
                        "jenis" : $("#ubah_jenis_user").val(),
                        "satker_user" : $('#ubah_satker_user').val()
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

//HAPUS
$("#myTable").on('click','.hapus-user', function(){
    var data = $(this).data('id');
    swal({
            title: "Apakah Anda Yakin ?",
            text: "Data user akan di hapus PERMANEN ! ",
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
                    url : "/user/delete/"+data,
                    type : "delete",
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
        .find("input[type='text'], select")
        .val('')
        .end()
    });

});

function loadSatker(e,f){
    $.get("/satuan-kerja/get", function(data, status){
        if(status == 'success') {
            if(f == null){
                satker += "<option selected>- Pilih Satuan Kerja -</option>";
                for(var i = 0; i < data.length; i++) {
                    satker += '<option value="'+data[i]['dipa_id_satuan_kerja']+'">'+data[i]['dipa_kode_satuan_kerja']+' - '+data[i]['dipa_satuan_kerja']+'</option>';
                }
                e.append(satker);
            } else {
                var satker2;
                for(var i = 0; i < data.length; i++) {
                    if(data[i]['dipa_id_satuan_kerja']==f){
                        satker2 += '<option value="'+data[i]['dipa_id_satuan_kerja']+'" selected>'+data[i]['dipa_kode_satuan_kerja']+' - '+data[i]['dipa_satuan_kerja']+'</option>';
                    } else {
                        satker2 += '<option value="'+data[i]['dipa_id_satuan_kerja']+'">'+data[i]['dipa_kode_satuan_kerja']+' - '+data[i]['dipa_satuan_kerja']+'</option>';
                    }
                }
                e.empty();
                e.append(satker2);
            }
        }
    });
}
</script>
@endpush

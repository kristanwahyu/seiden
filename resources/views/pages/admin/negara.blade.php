@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
@endpush

@section('title', 'Master Negara')

@section('sidebar')
    @include('sidebar.admin')
@endsection

@section('content')
  {{-- AWAL MAIN CONTENT --}}
<div class="main-content">
    {{-- Breadcrumb --}}
    <div class="content-heading clearfix">
        <div class="heading-left">
            <h1 class="page-title">Negara</h1>
            <p class="page-subtitle">Fasilitas untuk create, read, dan update master data negara</p>
        </div>
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Master Data</a></li>
            <li class="active">Negara</li>
        </ul>
    </div>
    {{-- End Breadcrumb --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- validate --}}
                {{-- menampilkan error validasi --}}
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

              	{{-- awal tabel negara --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Negara</h3>
                    </div>
                    {{-- awal panel body --}}
                    <div class="panel-body">
                        <div class="text-right">
                            <button class="btn btn-primary" data-toggle="modal" href='#modal-tambah'  id="new-satker"><i class="fa fa-plus"></i> Tambah</button>
                        </div>
                        <br>
                        {{-- awal pembungkus tabel satuan kerja --}}
                        <div class="table-responsive">
                            @verbatim
                            <table class="table table-bordered table-condensed table-striped" id="myTable">

                            </table>
                            @endverbatim
                        </div> {{-- akhir pembungkus tabel satuan kerja --}}
                    </div> {{-- akhir panel body --}}
                </div> {{-- akhir tabel satuan kerja --}}

            </div> {{-- End col-md-12 --}}
        </div> {{-- End Row --}}
    </div> {{-- End Container Fluid --}}

</div>
{{-- AKHIR MAIN CONTENT --}}

  {{-- AWAL MODAL TAMBAH NEGARA --}}
  <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Tambah Negara</h4>
              </div>
              <div class="modal-body">
                  <form action="{{url('/negara/store')}}" name="tambahNegara" method="POST" class="form-horizontal" role="form" id="formTambah" novalidate>
                    {{ csrf_field() }}
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode Negara</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_kode_negara" placeholer="Contoh : HK" name="kode_negara" required>
                                      <span class="text-danger">
                                        <strong id="kode-error"></strong>
                                    </span>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama Negara</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_nama_negara" name="nama_negara" placeholder="Contoh : Hongkong" required>
                                      <span class="text-danger">
                                        <strong id="nama-error"></strong>
                                    </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-simpan" data-toggle="modal" data-target="#tambah">Simpan</button>
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
                  <h4 class="modal-title">Ubah Negara</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form" id="formUbah">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode Negara</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_kite_kode_negara" name="kode_negara">
                                      <input type="hidden" id="id_binding">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama Negara</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_kite_nama_negara" name="nama_negara">
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
        processing: true,
        serverSide: true,
        ajax: '{{{ route('api.shownegara') }}}',
        columns: [
            {
                title: "NO",
                data: "DT_Row_Index",
                name: "DT_Row_Index",
                orderable: false,
                searchable: false,
                width: "1%"
            },
            {
                title: 'KODE NEGARA',
                data: 'kite_kode_negara',
                defaultContent: "-",
                name: 'kite_kode_negara'
            },
            {
                title: 'NAMA NEGARA',
                data: 'kite_nama_negara',
                defaultContent: "-",
                name: 'kite_nama_negara'
            },
            {
                title: '<div class="text-center">ACTION</div>',
                data: null,
                name: 'action',
                render: function (data) {
                    var actions = '';
                    actions = `<button class='btn btn-warning btn-sm ubah-negara' data-toggle='modal' data-id='${data['kite_id_negara']}' href='#modal-ubah'><i class='fa fa-pencil'></i> Ubah</button>
                                <button class='btn btn-danger btn-sm hapus-satker' data-toggle='modal' data-id='${data['kite_id_negara']}'><i class='fa fa-trash'></i> Hapus</button>`;
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
         //       $('#tambah_kode_satuan_kerja').val(data);
           // }
       // });
   // });
    //sweet

    $("#btn-simpan").click(function(){
            swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Master Negara Ini Akan Disimpan ",
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
                var registerForm = $("#formTambah");
                var formData = registerForm.serialize();
                $('#kode-error').html("");
                $('#nama-error').html("");

                $.ajax({
                    url : "/negara/store",
                    type : "POST",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "kode_negara" : $("#tambah_kode_negara").val(),
                        "nama_negara" : $("#tambah_nama_negara").val()
                    },
                    success : function(data){
                        console.log(data);
                        if(data.errors){
                            setTimeout(function(){
                            swal("Gagal", "Data Gagal Disimpan", "error");
                            }, 1000);

                            if(data.errors.kode_negara){
                                $('#kode-error').html(data.errors.kode_negara[0]);
                            }
                            if(data.errors.nama_negara){
                                $('#nama-error').html(data.errors.nama_negara[0]);
                            }

                            $('#modal-tambah').modal('show');
                        }
                        if(data.success){
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
                                $('#modal-tambah').modal('hide');
                        }
                    },
                });
            } else {
            swal('Dibatalkan', 'Data Master Negara Batal Simpan :)', 'error');
            $('#modal-tambah').modal('hide');
            }
        });
    });

    

    //UBAH
    $("#myTable").on('click','.ubah-negara', function(){
        $.get("/negara/get/"+$(this).data('id'), function(data, status){
            if(status == 'success'){
                console.log(data);
                $("#ubah_kite_kode_negara").val(data['kite_kode_negara']);
                $("#ubah_kite_nama_negara").val(data['kite_nama_negara']);
                $("#id_binding").val(data['kite_id_negara']);
            }
        });
    });

    $("#btn-ubah-simpan").click(function(){
        swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Negara Ini Akan Diubah ",
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
                    url : "/negara/update/"+$("#id_binding").val(),
                    type : "PUT",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "kode_negara" : $("#ubah_kite_kode_negara").val(),
                        "nama_negara" : $("#ubah_kite_nama_negara").val(),
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
    $("#myTable").on('click','.hapus-satker', function(){
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
                    url : "/negara/delete/"+data,
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

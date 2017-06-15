@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'DIPA Komponen')

@section('sidebar')
    @include('sidebar.satker')
@endsection

@section('content')
  {{-- AWAL MAIN CONTENT --}}
<div class="main-content">
    {{-- Breadcrumb --}}
    <div class="breadcrumb-wrapper">
        <ul class="breadcrumb">
            <li><a href=""><i class="fa fa-home fa-fw"></i></a></li>
            <li><a href="{{ url('/dipa/dipa-program') }}">DIPA</a></li>
            <li><a href="{{ url('/dipa/dipa-kegiatan/'.$output['kegiatan']['program']['dipa_id_program']) }}">{{$output['kegiatan']['program']['dipa_kode_program']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-output/'.$output['kegiatan']['dipa_id_kegiatan']) }}">{{$output['kegiatan']['dipa_kode_kegiatan']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-suboutput/'.$output['dipa_id_output']) }}">{{$output['dipa_kode_output']}}</a></li>
            <li class="active-bread">{{$dipa_kode_sub_output}}</li>
        </ul>
    </div>
    {{-- End Breadcrumb --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- awal tabel DIPA --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">DIPA Komponen</h3>
                    </div>
                    {{-- awal panel body --}}
                    <div class="panel-body">
                        <div class="row detail-box">
                          <div class="col-md-6">
                              <table class="table table-borderless detail-table no-margin">
                                  <tbody>
                                      <tr>
                                          <td>KODE / SATUAN KERJA</td>
                                          <td>:</td>
                                          <td>{{$output['kegiatan']['program']['satuan_kerja']['dipa_kode_satuan_kerja']}} / {{$output['kegiatan']['program']['satuan_kerja']['dipa_satuan_kerja']}}</td>
                                      </tr>
                                      <tr>
                                          <td>PROGRAM</td>
                                          <td>:</td>
                                          <td>{{$output['kegiatan']['program']['dipa_kode_program']}} / {{$output['kegiatan']['program']['dipa_nama_program']}}</td>
                                      </tr>
                                      <tr>
                                          <td>KEGIATAN</td>
                                          <td>:</td>
                                          <td>{{$output['kegiatan']['dipa_kode_kegiatan']}} / {{$output['kegiatan']['dipa_nama_kegiatan']}}</td>
                                      </tr>
                                      <tr>
                                          <td>OUTPUT</td>
                                          <td>:</td>
                                          <td>{{$output['dipa_kode_output']}} / {{$output['dipa_nama_output']}}</td>
                                      </tr>
                                      <tr>
                                          <td>SUB OUTPUT</td>
                                          <td>:</td>
                                          <td>{{$dipa_kode_sub_output}} / {{$dipa_nama_sub_output}}</td>
                                      </tr>
                                      <tr>
                                          <td>TAHUN ANGGARAN</td>
                                          <td>:</td>
                                          <td>{{$output['kegiatan']['program']['tahun']['dipa_tahun_anggaran']}}</td>
                                      </tr>
                                      <tr>
                                          <td>NILAI</td>
                                          <td>:</td>
                                          <td>RP. <span id="nilai">@if($total->total != null) {{$total->total}} @else 0 @endif </span></td>
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
                                <span class="btn-detail-open-text"></span> &nbsp;
                                <div class="btn-detail btn-active"><i class="fa fa-chevron-up"></i></div>
                            </div>
                        </div>
                        <br>

                        {{-- awal pembungkus tabel DIPA --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed table-striped" id="myTable">

                            </table>
                        </div> {{-- akhir pembungkus tabel DIPA --}}
                        <div class="text-left">
                            <a href="{{ url('/dipa/dipa-suboutput/'.$output['dipa_id_output']) }}" class="btn btn-warning" role="button"><i class="fa fa-reply"></i> Kembali</a>
                        </div>
                    </div> {{-- akhir panel body --}}
                </div> {{-- akhir tabel DIPA --}}
            </div>
        </div>
    </div>
</div>
  {{-- AKHIR MAIN CONTENT --}}

  {{-- AWAL MODAL TAMBAH KOMPONEN --}}
  <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Tambah Komponen</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode Komponen</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_kode_komponen" name="tambah_kode_komponen" placeholder="Contoh : KP00001">
                                      <input type="hidden" name="id_sub_output" value="{{$dipa_id_sub_output}}" id="id_sub_output"/>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama Komponen</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_nama_komponen" name="tambah_nama_komponen" placeholder="Contoh : Komponen-1.1">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-tambah">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              </div>
          </div>
      </div>
  </div>
  {{-- AKHIR MODAL TAMBAH KOMPONEN --}}

  {{-- AWAL MODAL UBAH KOMPONEN --}}
  <div class="modal fade" id="modal-ubah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Komponen</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Kode Komponen</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_kode_komponen" name="ubah_kode_komponen">
                                      <input type="hidden" id="param_id">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama Komponen</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_nama_komponen" name="ubah_nama_komponen">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-ubah">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              </div>
          </div>
      </div>
  </div>
  {{-- AKHIR MODAL UBAH KOMPONEN --}}
@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.js') }}" charset="UTF-8"></script>

<script>
$(function(){
    $('#nilai').text(function(index, value) {
        return value
        .replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        ;
    });

    'use strict';
    var id_sub_output = "{{$dipa_id_sub_output}}";
    var table = $('#myTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            type : "GET",
            url : "/dipa/dipa-komponen/show/"+id_sub_output
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
                title: 'KODE KOMPONEN',
                data: 'dipa_kode_komponen',
                defaultContent: "-",
                name: 'dipa_kode_komponen'
            },
            {
                title: 'NAMA KOMPONEN',
                data: 'dipa_nama_komponen',
                defaultContent: "-",
                name: 'dipa_nama_komponen'
            },
            {
                title: '<div class="text-center">NILAI</div>',
                data: null,
                defaultContent: "-",
                name: 'total',
                render: function(data) {
                    var number = data['total'];
                    if (number != null) {
                        var number_change = formatNumber(number);
                        var currency = `<div><div class="pull-left">Rp.</div> <div class="pull-right">${number_change}</div></div>`;
                        return currency.replace();
                    }
                },
                width: "10%"
            },
            {
                title: '<div class="text-center">ACTION</div>',
                data: null,
                name: 'action',
                render: function (data) {
                    var param = '';
                    if(data['count_sub_komponen'].length > 0) {
                        param = 'data-toggle="tooltip" data-placement="top" title="Program Sudah Memiliki Kegiatan, tidak bisa dihapus" disabled';
                    }
                    var actions = '';
                    actions = `<button class="btn btn-warning btn-sm ubah-komponen" data-id="${data['dipa_id_komponen']}" data-toggle="modal" href='#modal-ubah'> UBAH</button>
                        <button class="btn btn-danger btn-sm hapus-komponen" ${param} data-id="${data['dipa_id_komponen']}"> HAPUS</button>
                        <a href="/dipa/dipa-subkomponen/${data['dipa_id_komponen']}" class="btn btn-success" role="button"> Pilih</a>`;
                    return actions.replace();
                },
                width: "15.6%",
                orderable: false,
                searchable: false
            }


        ],
    });

    //btn detail box
    $('.btn-detail').click(function(){
        $('.detail-box').slideToggle(200);
        $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
        $(this).siblings('span').toggleClass('btn-detail-open-text btn-detail-close-text')
        $(this).toggleClass('btn-active');
    });

    $("#btn-tambah").click(function(){
        swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Komponen Ini Akan Disimpan",
            type: "info",
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
                    url : "/dipa/dipa-komponen/store",
                    type : "POST",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "kode_komponen" : $("#tambah_kode_komponen").val(),
                        "nama_komponen" : $("#tambah_nama_komponen").val(),
                        "id_sub_output" : $("#id_sub_output").val()
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
                            swal("Gagal", "Data Komponen Gagal Disimpan", "error");
                        }, 1000);
                    }
                });
            } else {
            swal('Dibatalkan', 'Data Komponen Batal Simpan :)', 'error');
                $('#modal-tambah').modal('hide');
            }
        });
    });

    $("#myTable").on('click','.ubah-komponen', function(){
        $.get("/dipa/dipa-komponen/get/"+$(this).data('id'), function(data, status){
            if(status == 'success'){
                $("#ubah_kode_komponen").val(data['dipa_kode_komponen']);
                $("#ubah_nama_komponen").val(data['dipa_nama_komponen']);
                $('#param_id').val(data['dipa_id_komponen']);
            }
        });
    });

    $("#btn-ubah").click(function(){
        var id = $('#param_id').val();
        swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Komponen Ini Akan Diubah",
            type: "info",
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
                    url : "/dipa/dipa-komponen/update/"+id,
                    type : "PUT",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "kode_komponen" : $("#ubah_kode_komponen").val(),
                        "nama_komponen" : $("#ubah_nama_komponen").val()
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
                            swal("Gagal", "Data Komponen Gagal Diubah", "error");
                        }, 1000);
                    }
                });
            } else {
            swal('Dibatalkan', 'Data Komponen Batal Diubah :)', 'error');
                $('#modal-ubah').modal('hide');
            }
        });
    });
    $("#myTable").on('click','.hapus-komponen', function(){
        var id = $(this).data('id');
        swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Komponen Ini Akan Dihapus PERMANEN !",
            type: "info",
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
                    url : "/dipa/dipa-komponen/delete/"+id,
                    type : "delete",
                    data : {
                        "_token": "{{ csrf_token() }}"
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
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        setTimeout(function(){
                            swal("Gagal", "Data Komponen Gagal Dihapu", "error");
                        }, 1000);
                    }
                });
            } else {
                swal('Dibatalkan', 'Data Komponen Batal Hapus :)', 'error');
            }
        });
    });
    $('#modal-tambah').on('hidden.bs.modal', function (e) {
        $(this)
            .find("input[type='text']")
            .val('')
            .end()
    })

});

function formatNumber(x) {
    return x.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

</script>
@endpush

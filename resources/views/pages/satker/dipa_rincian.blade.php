@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'DIPA Rincian')

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
            <li><a href="{{ url('/dipa/dipa-kegiatan/'.$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['dipa_id_program']) }}">{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['dipa_kode_program']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-output/'.$sub_komponen['komponen']['sub_output']['output']['kegiatan']['dipa_id_kegiatan']) }}">{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['dipa_kode_kegiatan']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-suboutput/'.$sub_komponen['komponen']['sub_output']['output']['dipa_id_output']) }}">{{$sub_komponen['komponen']['sub_output']['output']['dipa_kode_output']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-komponen/'.$sub_komponen['komponen']['sub_output']['dipa_id_sub_output']) }}">{{$sub_komponen['komponen']['sub_output']['dipa_kode_sub_output']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-subkomponen/'.$sub_komponen['komponen']['dipa_id_komponen']) }}">{{$sub_komponen['komponen']['dipa_kode_komponen']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-akun/'.$sub_komponen['dipa_id_sub_komponen']) }}">{{$sub_komponen['dipa_kode_sub_komponen']}}</a></li>
            <li class="active-bread">{{$dipa_kode_akun}}</li>
        </ul>
    </div>
    {{-- End Breadcrumb --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- awal tabel DIPA --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">DIPA Rincian</h3>
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
                                          <td>{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['satuan_kerja']['dipa_kode_satuan_kerja']}} / {{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['satuan_kerja']['dipa_satuan_kerja']}}</td>
                                      </tr>
                                      <tr>
                                          <td>PROGRAM</td>
                                          <td>:</td>
                                          <td>{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['dipa_kode_program']}} / {{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['dipa_nama_program']}}</td>
                                      </tr>
                                      <tr>
                                          <td>KEGIATAN</td>
                                          <td>:</td>
                                          <td>{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['dipa_kode_kegiatan']}} / {{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['dipa_nama_kegiatan']}}</td>
                                      </tr>
                                      <tr>
                                          <td>OUTPUT</td>
                                          <td>:</td>
                                          <td>{{$sub_komponen['komponen']['sub_output']['output']['dipa_kode_output']}} / {{$sub_komponen['komponen']['sub_output']['output']['dipa_nama_output']}}</td>
                                      </tr>
                                      <tr>
                                          <td>SUB OUTPUT</td>
                                          <td>:</td>
                                          <td>{{$sub_komponen['komponen']['sub_output']['dipa_kode_sub_output']}} / {{$sub_komponen['komponen']['sub_output']['dipa_nama_sub_output']}}</td>
                                      </tr>
                                      <tr>
                                          <td>KOMPONEN</td>
                                          <td>:</td>
                                          <td>{{$sub_komponen['komponen']['dipa_kode_komponen']}} / {{$sub_komponen['komponen']['dipa_nama_komponen']}}</td>
                                      </tr>
                                      <tr>
                                          <td>SUB KOMPONEN</td>
                                          <td>:</td>
                                          <td>{{$sub_komponen['dipa_kode_sub_komponen']}} / {{$sub_komponen['dipa_nama_sub_komponen']}}</td>
                                      </tr>
                                      <tr>
                                          <td>AKUN</td>
                                          <td>:</td>
                                          <td>{{$dipa_kode_akun}} / {{$dipa_nama_akun}}</td>
                                      </tr>
                                      <tr>
                                          <td>TAHUN ANGGARAN</td>
                                          <td>:</td>
                                          <td>{{$sub_komponen['komponen']['sub_output']['output']['kegiatan']['program']['tahun']['dipa_tahun_anggaran']}}</td>
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
                            <a href="{{ url('/dipa/dipa-akun/'.$sub_komponen['dipa_id_sub_komponen']) }}" class="btn btn-warning" role="button"><i class="fa fa-reply"></i> Kembali</a>
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
                  <h4 class="modal-title">Tambah Detail</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama Detail</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="tambah_nama_detail" name="tambah_nama_detail" placeholder="Contoh : detail 01">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Jenis Akun</label>
                                  <div class="col-sm-8">
                                      <select name="tambah_jenis_akun" id="tambah_jenis_akun" class="form-control">
                                            <option value="1">Belanja Gaji</option>
                                            <option value="2">Belanja Non Gaji</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Vol</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control format-number" id="tambah_vol" name="tambah_vol" placeholder="Contoh : 3" value="1">
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
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp.</span>
                      										<input type="text" class="form-control text-right format-number" id="tambah_harga_satuan" name="tambah_harga_satuan" placeholder="Contoh : Rp. 2.500.000">
                                    </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Total</label>
                                  <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="text" class="form-control text-right format-number" id="tambah_total" name="tambah_total" placeholder="0.00" readonly>
                                        <input type="hidden" name="id_akun" value="{{$dipa_id_akun}}" id="id_akun"/>
                                    </div>
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
  {{-- AKHIR MODAL TAMBAH detail --}}

  {{-- AWAL MODAL UBAH detail --}}
  <div class="modal fade" id="modal-ubah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Ubah Detail</h4>
              </div>
              <div class="modal-body">
                  <form action="" method="POST" class="form-horizontal" role="form">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                                  <label class="col-sm-3 control-label">Nama Detail</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_nama_detail" name="ubah_nama_detail" placeholder="Contoh : detail 01">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Jenis Akun</label>
                                  <div class="col-sm-8">
                                      <select name="ubah_jenis_akun" id="ubah_jenis_akun" class="form-control">
                                            <option value="1">Belanja Gaji</option>
                                            <option value="2">Belanja Non Gaji</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Vol</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control format-number" id="ubah_vol" name="ubah_vol" placeholder="Contoh : 3">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Satuan</label>
                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" id="ubah_satuan" name="ubah_satuan" placeholder="Contoh : Orang">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Harga Satuan</label>
                                  <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp.</span>
                                        <input type="text" class="form-control text-right format-number" id="ubah_harga_satuan" name="ubah_harga_satuan" placeholder="Contoh : Rp. 2.500.000">
                                    </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Total</label>
                                  <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp.</span>
										<input type="text" class="form-control text-right format-number" id="ubah_total" name="ubah_total" placeholder="0.00" readonly>
                                        <input type="hidden" name="param-id" id="param-id"/>
                                        <input type="hidden" name="id_akun" value="{{$dipa_id_akun}}"/>
                                    </div>
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
  {{-- AKHIR MODAL UBAH AKUN --}}
@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('vendor/cleave.js/cleave.min.js') }}"></script>

<script>
$(function(){
    'use strict';

    var id_akun = "{{$dipa_id_akun}}";
    var table = $('#myTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            type : "GET",
            url : "/dipa/dipa-rincian/show/"+id_akun
        },
        "columns": [
            {
                title: "NO",
                data: "DT_Row_Index",
                orderable: false,
                searchable: false,
                width: "1%"
            },
            {
                //table buat order default
                data: 'dipa_id_detail_akun',
                searchable: false,
                visible: false
            },
            {
                title: 'NAMA DETAIL',
                data: 'dipa_nama_detail',
                defaultContent: "-",
            },
            {
                title: 'VOLUME',
                data: 'dipa_volume',
                defaultContent: "-",
            },
            {
                title: 'SATUAN',
                data: 'dipa_satuan',
                defaultContent: "-",
            },
            {
                title: 'HARGA SATUAN',
                data: 'dipa_harga_satuan',
                defaultContent: "-",
                render: function(data) {
                    var number = data;
                    if (number != null) {
                        var number_change = formatNumber(number);
                        var currency = `<div><div class="pull-left">Rp.</div> <div class="pull-right">${number_change}</div></div>`;
                        return currency.replace();
                    }
                }
            },
            /*{
                title: 'JENIS AKUN',
                data: 'dipa_jenis_akun',
                defaultContent: "-",
                render: function (data) {
                    var jenis = data == '1' ? 'Belanja Gaji' : 'Belanja Non Gaji';
                    return jenis.replace();
                },
                searchable: false
            },*/
            {
                title: 'TOTAL',
                data: 'total',
                defaultContent: "-",
                render: function (data) {
                    var number_change = formatNumber(data);
                    var currency = `<div><div class="pull-left">Rp.</div> <div class="pull-right">${number_change}</div></div>`;
                    return currency.replace();
                },
                searchable: false
            },
            {
                title: 'SISA PEMBAYARAN',
                data: null,
                defaultContent: "-",
                render: function (data) {
                    var angka = data['total'] - data['total_pembayaran'];
                    var number_change = formatNumber(angka);
                    var currency = `<div><div class="pull-left">Rp.</div> <div class="pull-right">${number_change}</div></div>`;
                    return currency.replace();
                },
                searchable: false
            },
            {
                title: '<div class="text-center">ACTION</div>',
                data: null,
                render: function (data) {
                    var par_del = '';
                    if(data['total_pembayaran'] != null) {
                        par_del ='disabled';
                    }
                    var par = '';
                    var tag = 'a';
                    if(data['total'] <= data['total_pembayaran'])
                    {
                        par = 'disabled';
                        tag = 'button';
                    }
                    var actions = '';
                    actions = `<button class="btn btn-warning btn-sm ubah-detail" data-id="${data['dipa_id_detail_akun']}" data-toggle="modal" href='#modal-ubah' ${par_del}> UBAH</button>
                        <button class="btn btn-danger btn-sm hapus-detail" data-id="${data['dipa_id_detail_akun']}" data-akun="${data['dipa_id_akun']}" ${par_del}> HAPUS</button>
                        <${tag} href="/dipa/dipa-pembayaran/${data['dipa_id_detail_akun']}/${data['dipa_id_akun']}" class="btn btn-success" role="button" ${par}> Bayar</${tag}>`;
                    return actions.replace();
                },
                width: "16.1%",
                orderable: false,
                searchable: false
            }
        ],
        "order": [[ 1, "desc" ]]
    });

    $('#nilai').text(function(index, value) {
        return value
        .replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        ;
    });

    //btn detail box
    $('.btn-detail').click(function(){
        $('.detail-box').slideToggle(200);
        $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
        $(this).siblings('span').toggleClass('btn-detail-open-text btn-detail-close-text')
        $(this).toggleClass('btn-active');
    });

    //tambah rincian
     $("#btn-tambah").click(function(){
        swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Detail Ini Akan Disimpan",
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
                    url : "/dipa/dipa-rincian/store",
                    type : "POST",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "nama_detail" : $("#tambah_nama_detail").val(),
                        "volume" : $("#tambah_vol").val(),
                        "satuan" :$("#tambah_satuan").val(),
                        "harga_satuan" : $("#tambah_harga_satuan").val(),
                        "jenis_akun" : $("#tambah_jenis_akun").val(),
                        "id_akun" : $("#id_akun").val()
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
                                        $('#nilai').text(formatNumber(data.total));
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
            swal('Dibatalkan', 'Data Detail Akun Batal Simpan :)', 'error');
                $('#modal-tambah').modal('hide');
            }
        });
    });

    //edit rincian
    $("#myTable").on('click','.ubah-detail', function(){
        $.get("/dipa/dipa-rincian/get/"+$(this).data('id'), function(data, status){
            if(status == 'success'){
                //console.log(data);
                var total = data['dipa_volume'] * data['dipa_harga_satuan'];
                $("#ubah_harga_satuan").val(formatNumber(data['dipa_harga_satuan']));
                $("#ubah_nama_detail").val(data['dipa_nama_detail']);
                $("#ubah_satuan").val(data['dipa_satuan']);
                $("#ubah_vol").val(data['dipa_volume']);
                $("#param-id").val(data['dipa_id_detail_akun']);
                $('select[name="ubah_jenis_akun"]').find('option').prop('selected', false);
                if(data['dipa_jenis_akun'] == 1) {
                    $('option[value="1"]').prop('selected', true);
                } else {
                    $('option[value="2"]').prop('selected', true);
                }
                $("#ubah_total").val(formatNumber(total));
            }
        });
    });

    //update rincian
    $("#btn-ubah").click(function(){
        var id = $('#param-id').val();
        swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Akun Ini Akan Diubah",
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
                    url : "/dipa/dipa-rincian/update/"+id,
                    type : "PUT",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "nama_detail" : $("#ubah_nama_detail").val(),
                        "volume" : $("#ubah_vol").val(),
                        "satuan" :$("#ubah_satuan").val(),
                        "harga_satuan" : $("#ubah_harga_satuan").val(),
                        "jenis_akun" : $("#ubah_jenis_akun").val(),
                        "id_akun" : $("#id_akun").val()
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
                                        $('#nilai').text(formatNumber(data.total));
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
            swal('Dibatalkan', 'Data Akun Batal di Ubah :)', 'error');
                $('#modal-ubah').modal('hide');
            }
        });
    });

    //hapus rincian
    $("#myTable").on('click','.hapus-detail', function(){
        var id = $(this).data('id');
        var idAkun = $(this).data('akun');
        swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Akun Ini Akan Dihapus PERMANEN !",
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
                    url : `/dipa/dipa-rincian/delete/${id}/${idAkun}`,
                    type : "DELETE",
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
                                        $('#nilai').text(formatNumber(data.total));
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
                swal('Dibatalkan', 'Data Akun Batal Hapus :)', 'error');
            }
        });
    });

    $('#modal-tambah').on('hidden.bs.modal', function (e) {
        $(this)
            .find("input[type='text']")
            .val('')
            .end()
    });

    //total form tambah
    $('#tambah_vol, #tambah_harga_satuan').keyup(function(){
        var vol = $('#tambah_vol').val();
        var harga = $('#tambah_harga_satuan').val();

        harga = (harga != '') ? parseFloat( harga.replace(/\D/g, "") ) : 0;

        var total = harga * vol;

        $('#tambah_total').val(formatNumber(total));
    });

    //total form edit
    $('#ubah_vol, #ubah_harga_satuan').keyup(function(){
        var vol = $('#ubah_vol').val();
        var harga = $('#ubah_harga_satuan').val();

        harga = (harga != '') ? parseFloat( harga.replace(/\D/g, "") ) : 0;

        var total = harga * vol;

        $('#ubah_total').val(formatNumber(total));
    });

    //number format for all existing text-money element
    $('.format-number').toArray().forEach((field) => {
        //cleave.js number format
        return new Cleave(field, {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand',
            numeralDecimalMark: ',',
            delimiter: '.'
        });
    });

    //native number format converter
    function formatNumber(value){
        var currency = new Intl.NumberFormat('de-DE');
        return currency.format(value);
    }
});
</script>
@endpush

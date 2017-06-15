@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'SPP')

@section('sidebar')
    @include('sidebar.ppk')
@endsection

@section('content')
  {{-- AWAL MAIN CONTENT --}}
<div class="main-content">
    {{-- Breadcrumb --}}
    <div class="breadcrumb-wrapper">
        <ul class="breadcrumb">
          <li><a href="{{ url('/dashboard-ppk') }}"><i class="fa fa-home fa-fw"></i></a></li>
          <li class="active-bread"><a href="{{ url('/spp') }}">SPP</a></li>
        </ul>
    </div>
    {{-- End Breadcrumb --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- awal tabel DIPA --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">SPP</h3>
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
                                          <td>SATKER01 / Satuan Kerja 01</td>
                                      </tr>
                                      <tr>
                                          <td>PROGRAM</td>
                                          <td>:</td>
                                          <td>{{ $data[0]->dipa_kode_program }} / {{$data[0]->dipa_nama_program}}</td>
                                      </tr>
                                      <tr>
                                          <td>KEGIATAN</td>
                                          <td>:</td>
                                          <td>{{$data[0]->dipa_kode_kegiatan}} / {{$data[0]->dipa_nama_kegiatan}}</td>
                                      </tr>
                                      <tr>
                                          <td>OUTPUT</td>
                                          <td>:</td>
                                          <td>{{$data[0]->dipa_kode_output}} / {{$data[0]->dipa_nama_output}}</td>
                                      </tr>
                                      <tr>
                                          <td>SUB OUTPUT</td>
                                          <td>:</td>
                                          <td>{{$data[0]->dipa_kode_sub_output}} / {{$data[0]->dipa_nama_sub_output}}</td>
                                      </tr>
                                      <tr>
                                          <td>KOMPONEN</td>
                                          <td>:</td>
                                          <td>{{$data[0]->dipa_kode_komponen}} / {{$data[0]->dipa_nama_komponen}}</td>
                                      </tr>
                                      <tr>
                                          <td>SUB KOMPONEN</td>
                                          <td>:</td>
                                          <td>{{$data[0]->dipa_kode_sub_komponen}} / {{$data[0]->dipa_nama_sub_komponen}}</td>
                                      </tr>
                                      <tr>
                                          <td>AKUN</td>
                                          <td>:</td>
                                          <td>{{$data[0]->dipa_kode_akun}} / {{$data[0]->dipa_nama_akun}}</td>
                                      </tr>
                                      <tr>
                                          <td>RINCIAN</td>
                                          <td>:</td>
                                          <td>Pembayaran Dana - {{$data[0]->dipa_jenis_akun}} - {{$data[0]->dipa_volume}} {{$data[0]->dipa_satuan}}</td>
                                      </tr>
                                      <tr>
                                          <td>HARGA SATUAN</td>
                                          <td>:</td>
                                          <td>RP. <span class="nilai">{{$data[0]->dipa_harga_satuan}}</span></td>
                                      </tr>
                                      <tr>
                                          <td>TOTAL HARGA</td>
                                          <td>:</td>
                                          <td>RP. <span class="nilai">{{$data[0]->dipa_harga_satuan * $data[0]->dipa_volume}}</span></td>
                                      </tr>
                                      <tr>
                                          <td>TAHUN ANGGARAN</td>
                                          <td>:</td>
                                          <td>{{$data[0]->dipa_tahun_anggaran}}</td>
                                      </tr>
                                      <tr>
                                          <td>DANA YANG TERPAKAI</td>
                                          <td>:</td>
                                          <td>RP. <span class="nilai">{{$data[0]->dipa_pembayaran_nilai}}</span></td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                        </div>
                        <form action="" method="POST" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group clearfix">
                                      <label class="col-sm-2 control-label">No SPP</label>
                                      <div class="col-sm-5">
                                          <input type="text" class="form-control" id="no_spp" name="no_spp" placeholder="Contoh : 123">
                                          <input type="hidden" class="form-control" id="id" name="id" value="{{$data[0]->dipa_pembayaran_id}}">
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-sm-2 control-label">Nilai SPP</label>
                                      <div class="col-sm-5">
                                          <input type="text" class="form-control" id="nilai_spp" name="nilai_spp" placeholder="Contoh : Rp. 5000">
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-sm-2 col-xs-2 control-label">Tanggal SPP</label>
                                      <div class="col-sm-5">
                                          <input type="text" class="form-control datepicker" id="date" name="addDate">
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-sm-2 control-label">Keterangan</label>
                                      <div class="col-sm-5">
                                          <textarea type="text" class="form-control" id="tambah_keterangan" name="tambah_keterangan" placeholder="Isi keterangan disini"></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                    <label class="col-sm-2 control-label">Sinkronisasi</label>
                                    <div class="col-sm-5">
                                      <label class="checkbox-inline"><input type="checkbox" name="sinkronisasi" id="check_simak">Operator SIMAK</label>
                                      <label class="checkbox-inline"><input type="checkbox" name="sinkronisasi" id="check_saiba">Operator SAIBA</label>
                                      <label class="checkbox-inline"><input type="checkbox" name="sinkronisasi" id="check_perlengkapan">Operator Perlengkapan</label>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-sm-7">
                          <div class="text-right clearfix">
                              <button type="button" class="btn btn-primary" id="btn-simpan"><i class="fa fa-save"></i> Simpan</button>
                          </div>
                        </div>
                        {{-- <br>
                        <div class="text-left">
                            <a href="{{ url('/dashboard') }}" class="btn btn-warning" role="button"><i class="fa fa-reply"></i> Kembali</a>
                        </div> --}}
                    </div> {{-- akhir panel body --}}
                </div> {{-- akhir tabel DIPA --}}
            </div>
        </div>
    </div>
</div>
  {{-- AKHIR MAIN CONTENT --}}

@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('vendor/cleave.js/cleave.min.js') }}"></script>

<script>
$(function () {
    //cleave.js number format
    var pmbNilai = new Cleave('#nilai_spp', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand',
        numeralDecimalMark: ',',
        delimiter: '.'
    });

    $('.nilai').text(function(index, value) {
        return value
        .replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        ;
    });

    $('.datepicker').datepicker({
      autoclose: 'true',
      todayBtn: 'linked',
      todayHighlight: 'true',
      format: 'dd-mm-yyyy'
    });

    $("#btn-simpan").click(function(){
        swal({
            title: "Apakah Anda Yakin ?",
            text: "Data Output Ini Akan Disimpan",
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
                    url : "/spp",
                    type : "POST",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "no_spp" : $("#no_spp").val(),
                        "nilai_spp" : $("#nilai_spp").val(),
                        "addDate" : $("#date").val(),
                        "tambah_keterangan" : $("#tambah_keterangan").val(),
                        "check_simak" : $("#check_simak").is(":checked"),
                        "check_saiba" : $("#check_saiba").is(":checked"),
                        "check_perlengkapan" : $("#check_perlengkapan").is(":checked"),
                        "id" : $("#id").val()
                    },
                    success : function(data, status){
                        if(status=="success"){
                            setTimeout(function(){
                                swal({
                                    title: "Sukses",
                                    text: "Data Tersimpan!",
                                    type: "success"
                                    });
                                }, 1000);
                            
                        }
                        $('#modal-tambah').modal('hide');
                        window.location.replace("/dashboard-ppk");
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        setTimeout(function(){
                            swal("Error Saving!", "Please try again", "error");
                        }, 1000);
                        $('#modal-tambah').modal('hide');
                    }
                });
            } else {
                swal('Dibatalkan', 'Data Output Batal Simpan :)', 'error');
                $('#modal-tambah').modal('hide');
            }
        });
    });

    function formatNumber(x) {
    return x.replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
});
</script>
@endpush

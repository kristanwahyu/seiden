@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'SPM')

@section('sidebar')
    @include('sidebar.ppspm')
@endsection

@section('content')
  {{-- AWAL MAIN CONTENT --}}
<div class="main-content">
    {{-- Breadcrumb --}}
    <div class="breadcrumb-wrapper">
        <ul class="breadcrumb">
          <li><a href="{{ url('/dashboard-ppspm') }}"><i class="fa fa-home fa-fw"></i></a></li>
          <li class="active-bread"><a href="{{ url('/spm') }}">SPP</a></li>
        </ul>
    </div>
    {{-- End Breadcrumb --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- awal tabel DIPA --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">SPM</h3>
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
                                          <td>{{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['satuan_kerja']['dipa_kode_satuan_kerja']}}.{{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['dipa_kode_program']}}.{{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['dipa_kode_kegiatan']}}.{{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['sub_output']['output']['dipa_kode_output']}}.{{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['sub_output']['dipa_kode_sub_output']}}.{{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['dipa_kode_komponen']}}.{{$pembayaranspp['akun_detail']['akun']['sub_komponen']['dipa_kode_sub_komponen']}}.{{$pembayaranspp['akun_detail']['akun']['dipa_kode_akun']}} / {{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['satuan_kerja']['dipa_kode_satuan_kerja']}}</td>
                                      </tr>
                                      <tr>
                                          <td>PROGRAM</td>
                                          <td>:</td>
                                          <td>{{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['dipa_kode_program']}} / {{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['dipa_nama_program']}}</td>
                                      </tr>
                                      <tr>
                                          <td>KEGIATAN</td>
                                          <td>:</td>
                                          <td>{{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['dipa_kode_kegiatan']}} / {{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['dipa_nama_kegiatan']}}</td>
                                      </tr>
                                      <tr>
                                          <td>OUTPUT</td>
                                          <td>:</td>
                                          <td>{{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['sub_output']['output']['dipa_kode_output']}} / {{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['sub_output']['output']['dipa_nama_output']}}</td>
                                      </tr>
                                      <tr>
                                          <td>SUB OUTPUT</td>
                                          <td>:</td>
                                          <td>{{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['sub_output']['dipa_kode_sub_output']}} / {{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['sub_output']['dipa_nama_sub_output']}}</td>
                                      </tr>
                                      <tr>
                                          <td>KOMPONEN</td>
                                          <td>:</td>
                                          <td>{{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['dipa_kode_komponen']}} / {{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['dipa_nama_komponen']}}</td>
                                      </tr>
                                      <tr>
                                          <td>SUB KOMPONEN</td>
                                          <td>:</td>
                                          <td>{{$pembayaranspp['akun_detail']['akun']['sub_komponen']['dipa_kode_sub_komponen']}} / {{$pembayaranspp['akun_detail']['akun']['sub_komponen']['dipa_nama_sub_komponen']}}</td>
                                      </tr>
                                      <tr>
                                          <td>AKUN</td>
                                          <td>:</td>
                                          <td>{{$pembayaranspp['akun_detail']['akun']['dipa_kode_akun']}} / {{$pembayaranspp['akun_detail']['akun']['dipa_nama_akun']}}</td>
                                      </tr>
                                      <tr>
                                          <td>RINCIAN</td>
                                          <td>:</td>
                                          <td>{{$pembayaranspp['akun_detail']['akun']['dipa_nama_akun']}} - {{$pembayaranspp['akun_detail']['dipa_jenis_akun']==1?"Belanja Gaji":"Belanja Non Gaji"}} - {{$pembayaranspp['akun_detail']['dipa_volume']}} {{$pembayaranspp['akun_detail']['dipa_satuan']}}</td>
                                      </tr>
                                      <tr>
                                          <td>HARGA SATUAN</td>
                                          <td>:</td>
                                          <td>RP. <span class="nilai">{{$pembayaranspp['akun_detail']['dipa_harga_satuan']}}</td>
                                      </tr>
                                      <tr>
                                          <td>TOTAL HARGA</td>
                                          <td>:</td>
                                          <td>RP. <span class="nilai">{{$pembayaranspp['akun_detail']['dipa_harga_satuan']*$pembayaranspp['akun_detail']['dipa_volume']}}</span></td>
                                      </tr>
                                      <tr>
                                          <td>TAHUN ANGGARAN</td>
                                          <td>:</td>
                                          <td>{{$pembayaranspp['akun_detail']['akun']['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['tahun']['dipa_tahun_anggaran']}}</td>
                                      </tr>
                                      <tr>
                                          <td>DANA YANG TERPAKAI</td>
                                          <td>:</td>
                                          <td>RP. <span class="nilai">{{$pembayaranspp['dipa_pembayaran_nilai']}}</span></td>
                                      </tr>
                                      <tr>
                                          <td>NO SPP</td>
                                          <td>:</td>
                                          <td>{{$dipa_spp_no}}</td>
                                      </tr>
                                      <tr>
                                          <td>NILAI SPP</td>
                                          <td>:</td>
                                          <td>Rp. <span class="nilai">{{$dipa_spp_nilai}}</span></td>
                                      </tr>
                                      <tr>
                                          <td>TANGGAL SPP</td>
                                          <td>:</td>
                                          <td>{{date('n F Y' ,strtotime($dipa_spp_nilai))}}</td>
                                      </tr>
                                      <tr>
                                          <td>KETERANGAN</td>
                                          <td>:</td>
                                          <td>{{$dipa_spp_keterangan}}</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                        </div>
                        <form id="form" action="" method="POST" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group clearfix">
                                      <label class="col-sm-2 control-label">No SPM</label>
                                      <div class="col-sm-5">
                                          <input type="text" class="form-control" id="no_spm" name="no_spm" placeholder="Contoh : 123">
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-sm-2 control-label">Nilai SPM</label>
                                      <div class="col-sm-5">
                                          <input type="text" class="form-control" id="nilai_spm" name="nilai_spm" placeholder="Contoh : Rp. 5000">
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-sm-2 col-xs-2 control-label">Tanggal SPM</label>
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
                                </div>
                            </div>
                        </form>
                        <div class="col-sm-7">
                          <div class="text-right clearfix">
                              <button class="btn btn-primary" onclick="simpan()"><i class="fa fa-save"></i> Simpan</button>
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
<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.js') }}" charset="UTF-8"></script>

<script>
$('.nilai').text(function(index, value) {
        return value
        .replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        ;
    });
$(function () {
    $('.datepicker').datepicker({
      autoclose: 'true',
      todayBtn: 'linked',
      todayHighlight: 'true',
      format: 'dd-mm-yyyy'
    });
});

function simpan(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data SPM Ini Akan Disimpan ",
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
      $.ajax({
                  url : "{{asset('/spm/'.$pembayaranspp['dipa_pembayaran_id'])}}",
                  type : "POST",
                  data : {
                      "_token": "{{ csrf_token() }}",
                      "_method": "PUT",
                      "no_spm" : $("#no_spm").val(),
                      "nilai_spm" : $("#nilai_spm").val(),
                      "addDate" : $("#date").val(),
                      "tambah_keterangan" : $("#tambah_keterangan").val()
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
                      window.location.replace("/dashboard-ppspm");
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                      setTimeout(function(){
                          swal("Error Saving!", "Please try again", "error");
                      }, 1000);
                      $('#modal-tambah').modal('hide');
                  }
              });
    } else {
      swal('Dibatalkan', 'Data SPM Batal Simpan :)', 'error');
    }
  });
}
</script>
@endpush

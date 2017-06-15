@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
@endpush

@section('title', 'Sinkronisasi')

@section('sidebar')
    @include('sidebar.operator_saiba')
@endsection

@section('content')
  {{-- AWAL MAIN CONTENT --}}
<div class="main-content">
    {{-- Breadcrumb --}}
    <div class="breadcrumb-wrapper">
        <ul class="breadcrumb">
          <li><a href="{{ url('/dashboard-saiba') }}"><i class="fa fa-home fa-fw"></i></a></li>
          <li class="active-bread"><a href="{{ url('/sinkronisasi-saiba') }}">Sinkronisasi SAIBA</a></li>
        </ul>
    </div>
    {{-- End Breadcrumb --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- awal tabel DIPA --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Detail Data Yang Harus Disinkronisasi</h3>
                    </div>
                    {{-- awal panel body --}}
                    <div class="panel-body">
                        <div class="row">
                          <div class="col-md-6">
                              <table class="table table-borderless detail-table no-margin">
                                  <tbody>
                                    <tr>
                                        <td>KODE / SATUAN KERJA</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_kode_satuan_kerja}} / {{$data[0]->dipa_satuan_kerja}}</td>
                                    </tr>
                                    <tr>
                                        <td>PROGRAM</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_kode_program}} / {{$data[0]->dipa_nama_program}}</td>
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
                                        <td>{{$data[0]->dipa_kode_program}} / {{$data[0]->dipa_kode_program}}</td>
                                    </tr>
                                    <tr>
                                        <td>SUB KOMPONEN</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_kode_komponen}} / {{$data[0]->dipa_nama_komponen}}</td>
                                    </tr>
                                    <tr>
                                        <td>AKUN</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_kode_sub_komponen}} / {{$data[0]->dipa_nama_sub_komponen}}</td>
                                    </tr>
                                    <tr>
                                        <td>RINCIAN</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_nama_akun}} - {{$data[0]->dipa_volume}} - {{$data[0]->dipa_satuan}}</td>
                                    </tr>
                                    <tr>
                                        <td>HARGA SATUAN</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_harga_satuan}}</td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL HARGA</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_harga_satuan * $data[0]->dipa_volume}}</td>
                                    </tr>
                                    <tr>
                                        <td>TAHUN ANGGARAN</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_tahun_anggaran}}</td>
                                    </tr>
                                    <tr>
                                        <td>DANA YANG TERPAKAI</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_pembayaran_nilai}}</td>
                                    </tr>
                                    <tr>
                                        <td>NO SPP</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_spp_no}}</td>
                                    </tr>
                                    <tr>
                                        <td>NILAI SPP</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_spp_nilai}}</td>
                                    </tr>
                                    <tr>
                                        <td>TANGGAL SPP</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_spp_tanggal}}</td>
                                    </tr>
                                    <tr>
                                        <td>KETERANGAN</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_spp_keterangan}}</td>
                                    </tr>
                                    <tr>
                                        <td>NO SPM</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_spm_no}}</td>
                                    </tr>
                                    <tr>
                                        <td>NILAI SPM</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_spm_nilai}}</td>
                                    </tr>
                                    <tr>
                                        <td>TANGGAL SPM</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_spm_tanggal}}</td>
                                    </tr>
                                    <tr>
                                        <td>KETERANGAN</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_spm_keterangan}}</td>
                                    </tr>
                                    <tr>
                                        <td>NO SP2D</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_sp2d_no}}</td>
                                    </tr>
                                    <tr>
                                        <td>NILAI SP2D</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_sp2d_nilai}}</td>
                                    </tr>
                                    <tr>
                                        <td>TANGGAL SP2D</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_sp2d_tanggal}}</td>
                                    </tr>
                                    <tr>
                                        <td>KETERANGAN</td>
                                        <td>:</td>
                                        <td>{{$data[0]->dipa_sp2d_keterangan}}</td>
                                    </tr>
                                    <tr>
                                      <td>SINKRONISASI SEKARANG ?</td>
                                      <td>:</td>
                                      <td><label class="checkbox-inline"><input type="checkbox" value="1"><b>Ya</b></label></td>
                                    </tr>
                                  </tbody>
                              </table>
                              <br>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="text-left clearfix">
                                      <a href="/dashboard-saiba/" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                                      <button class="btn btn-success" onclick="simpan({{$data[0]->dipa_pembayaran_id}})"><i class="fa fa-save"></i> Simpan</button>
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </div> {{-- akhir panel body --}}
            </div> {{-- akhir tabel DIPA --}}
        </div>
    </div>
</div>
  {{-- AKHIR MAIN CONTENT --}}

@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

<script>

function simpan(id){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data SPP Ini Akan Disimpan ",
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
            url : "/sinkronisasi-saiba/",
            type : "POST",
            data : {
              "_token": "{{ csrf_token() }}",
              "id" : id
            },
            success : function(data, status){
              if(status=="success"){
                  setTimeout(function(){
                  swal({
                      title: "Sukses",
                      text: "Data Telah Tersinkronisasi!",
                      type: "success"
                      });
                  }, 1000);

              }
              $('#modal-tambah').modal('hide');
              window.location.replace("/dashboard-saiba");
            },
            error: function (xhr, ajaxOptions, thrownError) {
              setTimeout(function(){
                  swal("Gagal", "Data Gagal Tersinkronisasi", "error");
              }, 1000);
              $('#modal-tambah').modal('hide');
            }
            });
    } else {
        swal('Dibatalkan', 'Data Batal Disinkronisasi', 'error');
    }
  });
}

$("button").attr("disabled", "disabled");
$("input[type='checkbox']").click(function(){
    if ($("input[type='checkbox']").is(':checked'))
        $("button").removeAttr("disabled");
    else
        $("button").attr("disabled", "disabled");
});
</script>
@endpush

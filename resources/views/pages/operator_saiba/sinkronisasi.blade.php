@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
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
                                        <td>SATKER01 / Satuan Kerja 01</td>
                                    </tr>
                                    <tr>
                                        <td>PROGRAM</td>
                                        <td>:</td>
                                        <td>PRG001 / Program 001</td>
                                    </tr>
                                    <tr>
                                        <td>KEGIATAN</td>
                                        <td>:</td>
                                        <td>KGT001 / Kegiatan 001</td>
                                    </tr>
                                    <tr>
                                        <td>OUTPUT</td>
                                        <td>:</td>
                                        <td>OP001 / Output 001</td>
                                    </tr>
                                    <tr>
                                        <td>SUB OUTPUT</td>
                                        <td>:</td>
                                        <td>SOP001.1 / Sub Output 001.1</td>
                                    </tr>
                                    <tr>
                                        <td>KOMPONEN</td>
                                        <td>:</td>
                                        <td>KP001 / Komponen 001</td>
                                    </tr>
                                    <tr>
                                        <td>SUB KOMPONEN</td>
                                        <td>:</td>
                                        <td>KP001.1 / Sub Komponen 001.1</td>
                                    </tr>
                                    <tr>
                                        <td>AKUN</td>
                                        <td>:</td>
                                        <td>AK001 / Akun 001</td>
                                    </tr>
                                    <tr>
                                        <td>RINCIAN</td>
                                        <td>:</td>
                                        <td>Penbayaran Dana - Belanja Gaji - 2 Orang</td>
                                    </tr>
                                    <tr>
                                        <td>HARGA SATUAN</td>
                                        <td>:</td>
                                        <td>RP. 1.500.000</td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL HARGA</td>
                                        <td>:</td>
                                        <td>RP. 3.000.000</td>
                                    </tr>
                                    <tr>
                                        <td>TAHUN ANGGARAN</td>
                                        <td>:</td>
                                        <td>2017</td>
                                    </tr>
                                    <tr>
                                        <td>DANA YANG TERPAKAI</td>
                                        <td>:</td>
                                        <td>RP. 3.000.000</td>
                                    </tr>
                                    <tr>
                                        <td>NO SPP</td>
                                        <td>:</td>
                                        <td>123</td>
                                    </tr>
                                    <tr>
                                        <td>NILAI SPP</td>
                                        <td>:</td>
                                        <td>Rp. 5000</td>
                                    </tr>
                                    <tr>
                                        <td>TANGGAL SPP</td>
                                        <td>:</td>
                                        <td>08 Juni 2017</td>
                                    </tr>
                                    <tr>
                                        <td>KETERANGAN</td>
                                        <td>:</td>
                                        <td>Pembayaran Dana - Belanja Gaji - 2 Orang</td>
                                    </tr>
                                    <tr>
                                        <td>NO SPM</td>
                                        <td>:</td>
                                        <td>123</td>
                                    </tr>
                                    <tr>
                                        <td>NILAI SPM</td>
                                        <td>:</td>
                                        <td>Rp. 5000</td>
                                    </tr>
                                    <tr>
                                        <td>TANGGAL SPM</td>
                                        <td>:</td>
                                        <td>08 Juni 2017</td>
                                    </tr>
                                    <tr>
                                        <td>KETERANGAN</td>
                                        <td>:</td>
                                        <td>Pembayaran Dana - Belanja Gaji - 2 Orang</td>
                                    </tr>
                                    <tr>
                                        <td>NO SP2D</td>
                                        <td>:</td>
                                        <td>123</td>
                                    </tr>
                                    <tr>
                                        <td>NILAI SP2D</td>
                                        <td>:</td>
                                        <td>Rp. 5000</td>
                                    </tr>
                                    <tr>
                                        <td>TANGGAL SP2D</td>
                                        <td>:</td>
                                        <td>08 Juni 2017</td>
                                    </tr>
                                    <tr>
                                        <td>KETERANGAN</td>
                                        <td>:</td>
                                        <td>Penbayaran Dana - Belanja Gaji - 2 Orang</td>
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
                                          <button class="btn btn-primary" onclick="simpan()"><i class="fa fa-save"></i> Simpan</button>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                        {{-- <form action="" method="POST" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group clearfix">
                                    <label class="col-sm-2 control-label">Sinkronisasi Sekarang ?</label>
                                    <div class="col-sm-5">
                                      <label class="checkbox-inline"><input type="checkbox" value="1">Ya</label>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </form> --}}
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
      swal("Berhasil!", "Data SPP Berhasil Simpan", "success");
    } else {
      swal('Dibatalkan', 'Data SPP Batal Simpan :)', 'error');
    }
  });
}
</script>
@endpush

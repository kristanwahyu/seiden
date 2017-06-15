@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endpush

@section('title', 'DIPA Pembayaran')

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
            <li><a href="{{ url('/dipa/dipa-kegiatan/'.$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['dipa_id_program']) }}">{{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['dipa_kode_program']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-output/'.$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['dipa_id_kegiatan']) }}">{{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['dipa_kode_kegiatan']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-suboutput/'.$akun['sub_komponen']['komponen']['sub_output']['output']['dipa_id_output']) }}">{{$akun['sub_komponen']['komponen']['sub_output']['output']['dipa_kode_output']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-komponen/'.$akun['sub_komponen']['komponen']['sub_output']['dipa_id_sub_output']) }}">{{$akun['sub_komponen']['komponen']['sub_output']['dipa_kode_sub_output']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-subkomponen/'.$akun['sub_komponen']['komponen']['dipa_id_komponen']) }}">{{$akun['sub_komponen']['komponen']['dipa_kode_komponen']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-akun/'.$akun['sub_komponen']['dipa_id_sub_komponen']) }}">{{$akun['sub_komponen']['dipa_kode_sub_komponen']}}</a></li>
            <li><a href="{{ url('/dipa/dipa-rincian/'.$akun['dipa_id_akun']) }}">{{$akun['dipa_kode_akun']}}</a></li>
            <li class="active-bread">{{$dipa_nama_detail}}</li>
        </ul>
    </div>
    {{-- End Breadcrumb --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                {{-- awal tabel DIPA --}}
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">DIPA Pembayaran</h3>
                    </div>
                    {{-- awal panel body --}}
                    <div class="panel-body">
                        <div class="row detail-box">
                          <div class="col-md-12">
                              <table class="table table-borderless table-condensed table-detail no-margin">
                                  <tbody>
                                      <tr>
                                          <td>KODE / SATUAN KERJA</td>
                                          <td>:</td>
                                          <td>{{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['satuan_kerja']['dipa_kode_satuan_kerja']}} / {{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['satuan_kerja']['dipa_satuan_kerja']}}</td>
                                      </tr>
                                      <tr>
                                          <td>PROGRAM</td>
                                          <td>:</td>
                                          <td>{{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['dipa_kode_program']}} / {{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['dipa_nama_program']}}</td>
                                      </tr>
                                      <tr>
                                          <td>KEGIATAN</td>
                                          <td>:</td>
                                          <td>{{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['dipa_kode_kegiatan']}} / {{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['dipa_nama_kegiatan']}}</td>
                                      </tr>
                                      <tr>
                                          <td>OUTPUT</td>
                                          <td>:</td>
                                          <td>{{$akun['sub_komponen']['komponen']['sub_output']['output']['dipa_kode_output']}} / {{$akun['sub_komponen']['komponen']['sub_output']['output']['dipa_nama_output']}}</td>
                                      </tr>
                                      <tr>
                                          <td>SUB OUTPUT</td>
                                          <td>:</td>
                                          <td>{{$akun['sub_komponen']['komponen']['sub_output']['dipa_kode_sub_output']}} / {{$akun['sub_komponen']['komponen']['sub_output']['dipa_nama_sub_output']}}</td>
                                      </tr>
                                      <tr>
                                          <td>KOMPONEN</td>
                                          <td>:</td>
                                          <td>{{$akun['sub_komponen']['komponen']['dipa_kode_komponen']}} / {{$akun['sub_komponen']['komponen']['dipa_nama_komponen']}}</td>
                                      </tr>
                                      <tr>
                                          <td>SUB KOMPONEN</td>
                                          <td>:</td>
                                          <td>{{$akun['sub_komponen']['dipa_kode_sub_komponen']}} / {{$akun['sub_komponen']['dipa_nama_sub_komponen']}}</td>
                                      </tr>
                                      <tr>
                                          <td>AKUN</td>
                                          <td>:</td>
                                          <td>{{$akun['dipa_kode_akun']}} / {{$akun['dipa_nama_akun']}}</td>
                                      </tr>
                                      <tr>
                                          <td>TAHUN ANGGARAN</td>
                                          <td>:</td>
                                          <td>{{$akun['sub_komponen']['komponen']['sub_output']['output']['kegiatan']['program']['tahun']['dipa_tahun_anggaran']}}</td>
                                      </tr>
                                      <tr>
                                          <td>NILAI</td>
                                          <td>:</td>
                                          <td>RP. <span class="nilai">@if($total->total != null) {{$total->total}} @else 0 @endif </span></td>
                                      </tr>
                                      <tr>
                                          <td>RINCIAN</td>
                                          <td>:</td>
                                          <td>{{$dipa_nama_detail}} | @if($dipa_jenis_akun == 1) Belanja Gaji @else Belanja Non Gaji @endif | Volume : {{$dipa_volume}} {{$dipa_satuan}}</td>
                                      </tr>
                                      <tr>
                                          <td>HARGA SATUAN</td>
                                          <td>:</td>
                                          <td>RP. <span class="nilai">{{$dipa_harga_satuan}}</span></td>
                                      </tr>
                                      <tr>
                                          <td>TOTAL HARGA</td>
                                          <td>:</td>
                                          <td>RP. <span class="nilai">{{$dipa_harga_satuan * $dipa_volume}}</span></td>
                                      </tr>
                                      <tr>
                                          <td>DANA TERPAKAI</td>
                                          <td>:</td>
                                          <td>RP. <span class="nilai">@if($total_bayar->total_bayar != null) {{$total_bayar->total_bayar}} @else 0 @endif </span></td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                        </div>
{{-- LOAD PAKE AJAX --}}
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <span class="btn-detail-open-text"></span> &nbsp;
                                <div class="btn-detail btn-active"><i class="fa fa-chevron-up"></i></div>
                            </div>
                        </div>

                        <?php
                            $jenis = $dipa_jenis_akun;
                            //1 = Belanja Gaji, 2 = Belanja Non Gaji
                            $syarat = [
                                '1'  => [
                                    'Dafar Rekapitulasi/ Dafar Nominatif Pembayaran',
                                    'Surat pernyataan tanggung jawab belanja (SPTJB)',
                                    'Kuintansi / Tanda Bukti Pembayaran',
                                    'Surat Setoran Pajak (SSP) (Bila Ada)',
                                    'Kontrak, Ringkasan Kontrak, BAPHP, BAST, Surat Tagihan, BA Pembayaran, Copy NPWP, Copy
                                     Rekening, Jaminan Bank, Bukti Tagihan Daya, Bukti Tagihan Lainnya yang sudah disahkan PPK',
                                    'Undangan/Memo, Surat Tugas, Surat Perjalanan Dinas, Daftar Pengeluaran Riil, Bukti Angkutan,
                                     Bukti Penginapan, LPJ Perjadin',
                                    'SK Tim Verifikasi, SK Perjanjian Kerjasama, SK Penetapan Bantuan, SPTJM Penerima, SPTJB Penerima,
                                     BA Verifikasi, Proposal'
                                ],
                                '2' => [
                                    'Dafar Rekapitulasi/ Dafar Nominatif (Gaji)',
                                    'Surat pernyataan tanggung jawab belanja (SPTJB)',
                                    'Kuintansi / Tanda Bukti Pembayaran',
                                    'Surat Setoran Pajak (SSP)',
                                    'Surat Keputusan Pegawai',
                                    'Surat Tugas/ Ijin, Daftar Rekap Laporan Kinerja Bulanan, Daftar Absen / Kehadiran',
                                    'Surat Pernyataan Pegawai, SKMT, SKBK, Daftar Hadir, Daftar Gaji Terakhir, SK Pembagian Tugas,
                                     Jadwal Mengajar, Daftar Rombel, Copy Sertifikat Pendidik, Copy NRG, Copy NUPTK, Copy NPWP,
                                     Copy Buku Rekening, Laporan Kinerja Bulanan'
                                ]
                            ];
                        ?>

                        {{-- awal pembungkus form persyaratan --}}
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="POST" class="form-horizontal" role="form">
                                    <div class="form-group clearfix">
                                        <label class="col-sm-3 control-label">PEMBAYARAN</label>
                                        <div class="col-sm-9">

                                            <label class="radio-inline"><input type="radio" id="tambah_up" name="jenis_pembayaran" value="1" @if($pembayaran_param != null) @if($pembayaran_param['dipa_jenis_pembayaran'] == 1) checked @endif @else checked @endif>UP</label>
                                            <label class="radio-inline"><input type="radio" id="tambah_ls" name="jenis_pembayaran" value="2" @if($pembayaran_param != null) @if($pembayaran_param['dipa_jenis_pembayaran'] == 2) checked @endif @endif>LS</label>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="col-sm-3 control-label">SYARAT</label>
                                            <div class="checkbox col-sm-9">
                                            <table class="table table-bordered table-condensed table-hover table-syarat no-margin">
                                                <tbody>
                                                    @for($i = 0; $i < 7; $i++)
                                                        @if($pembayaran_param != null)
                                                        @php
                                                            $text = "dipa_syarat_".($i+1);
                                                            $text2 = "dipa_dokumen_syarat_".($i+1);
                                                        @endphp
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="check{!! $i+1 !!}" class="check_syarat" @if($pembayaran_param->syaratPembayaran[0][$text] == '1') checked  value="1" @else value="" @endif>
                                                            </td>
                                                            <td><strong>Syarat {!! $i+1 !!}</strong></td>
                                                            <td class="td-file">
                                                                <button href="#" class="btn btn-success btn-xxs"><i class="fa fa-upload"></i></button>
                                                                <input type="hidden" name="hidden_syarat{!! $i+1 !!}" value="@if($pembayaran_param->syaratPembayaran[0][$text2] != null){{$pembayaran_param->syaratPembayaran[0][$text2]}} @else 0 @endif">
                                                                <span><input type="file" name="syarat{!! $i+1 !!}" class="file_syarat"></span>
                                                            </td>
                                                            <td>
                                                                @if($pembayaran_param->syaratPembayaran[0][$text2] != null)
                                                                <a href="{{url('/dipa/download/'.$pembayaran_param['dipa_pembayaran_id'].'/'.$pembayaran_param->syaratPembayaran[0][$text2])}}" class="btn btn-success btn-xxs"><i class="fa fa-download"></i></a>
                                                                @else
                                                                <button class="btn btn-success btn-xxs" disabled><i class="fa fa-download"></i></button>
                                                                @endif
                                                            </td>
                                                            <td><button type="button" class="btn btn-default btn-xxs btn-syarat"><i class="fa fa-chevron-down"></i></button></td>
                                                        </tr>
                                                        @else
                                                         <tr>
                                                            <td><input type="checkbox" name="check{!! $i+1 !!}" value="" class="check_syarat"></td>
                                                            <td><strong>Syarat {!! $i+1 !!}</strong></td>
                                                            <td class="td-file">
                                                                <button href="#" class="btn btn-success btn-xxs"><i class="fa fa-upload"></i></button>
                                                                <span><input type="file" name="syarat{!! $i+1 !!}" class="file_syarat"></span>
                                                            </td>
                                                            <td><button class="btn btn-success btn-xxs disabled"><i class="fa fa-download"></i></button></td>
                                                            <td><button type="button" class="btn btn-default btn-xxs btn-syarat"><i class="fa fa-chevron-down"></i></button></td>
                                                        </tr>
                                                        @endif
                                                        @php
                                                            $expSy = explode(', ', $syarat[$jenis][$i]);
                                                        @endphp

                                                        <tr class="row-hidden">
                                                            <td></td>
                                                            <td colspan="4">
                                                                <ul>
                                                                @foreach($expSy as $value)
                                                                    <li>{{$value}}</li>
                                                                @endforeach
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endfor

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="col-sm-3 control-label">NILAI</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pembayaran_nilai" name="pembayaran_nilai" placeholder="Contoh : Rp. 15.000.000" required @if($pembayaran_param != null) value="{{$pembayaran_param['dipa_pembayaran_nilai']}}" @endif>
                                            <input type="hidden" value="{{$dipa_id_detail_akun}}" id="id_detail_akun">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="col-sm-3 control-label">KETERANGAN</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" id="pembayaran_keterangan" name="pembayaran_keterangan" placeholder="Contoh : Isi keterangan disini" required>@if($pembayaran_param != null) {{$pembayaran_param['dipa_pembayaran_keterangan']}} @endif</textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- akhir pembungkus form persyaratan --}}
                        </div>
                    </div>
                    {{-- akhir panel body --}}

                    <div class="panel-footer clearfix">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ url('/dipa/dipa-rincian/'.$akun['dipa_id_akun']) }}" class="btn btn-warning" role="button"><i class="fa fa-reply"></i> Kembali</a>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary btn-tambah" status="0" data-id="0"><i class="fa fa-tasks"></i> Draft</button>
                                <button class="btn btn-success btn-tambah" status="1" data-id="1"><i class="fa fa-save"></i> Ajukan</button>
                            </div>
                        </div>
                    </div>
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
$(function(){
    'use strict';

    //cleave.js number format
    var pmbNilai = new Cleave('#pembayaran_nilai', {
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

    //btn detail box
    $('.btn-detail').click(function(){
        $('.detail-box').slideToggle(200);
        $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
        $(this).siblings('span').toggleClass('btn-detail-open-text btn-detail-close-text');
        $(this).toggleClass('btn-active');
    });

    //btn detail syarat
    $('.btn-syarat').click(function(){
        $(this).parents('tr').next().toggle();
        $(this).toggleClass('btn-danger btn-default');
        $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
    });

    $('.check_syarat').change(function(){
        $(this).val('');
        if(this.checked) {
            $(this).val('1');
        }
    });

     $(".btn-tambah").click(function(){
         var newValue = $('#pembayaran_nilai').val().replace(/\./g, '');
         var parameter = "{{$pembayaran_param}}";
         var param_pmb = null;
         if(parameter == null) {
            if(parseFloat(newValue) > parseFloat("{{$dipa_harga_satuan * $dipa_volume - $total_bayar->total_bayar}}")){
                return swal("Maaf Dana Tidak Cukup");
            }
         } else {
             var pmb = parseFloat("{{$pembayaran_param['dipa_pembayaran_nilai']}}");
             var cek = parseFloat("{{$dipa_harga_satuan * $dipa_volume - $total_bayar->total_bayar}}")+pmb;
             if(parseFloat(newValue) > cek){
                return swal("Maaf Dana Tidak Cukup");
            }
            param_pmb = "{{$pembayaran_param['dipa_pembayaran_id']}}";

         }


        var id_pembayaran = $(this).data('id');
        if (id_pembayaran != "0") {
            console.log($('input[name="check2"]').val());
            if($('input[name="check1"]').val() == "" || $('input[name="check2"]').val() == ""  || $('input[name="check3"]').val() == ""  || $('input[name="check4"]').val() == ""  || $('input[name="check5"]').val() == ""  || $('input[name="check6"]').val() == ""  || $('input[name="check7"]').val() == "") {
                return swal("Maaf Dokumen Belum Lengkap, Anda Tidak Bisa Menyimpan Data Ini, Silahkan Di Draft Terlebih Dahulu");
            }
            var text_sweet = 'Data Pembayaran ini akan di simpan. dan tidak dapat di ubah lagi';
            var tanggal = '{{date("Y-m-d")}}';
            var status = '1';
        } else {
            var text_sweet = 'Data Pembayaran ini akan di simpan di draft, dan dapat di ubah lagi';
            var tanggal = null;
            var status = '0';
        }
        var formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('pembayaran_tanggal', tanggal);
        formData.append('id_pembayaran', param_pmb);
        formData.append('jenis_pembayaran', $('input[type="radio"][name="jenis_pembayaran"]').val());
        formData.append('id_detail_akun', $('#id_detail_akun').val());
        formData.append('pembayaran_nilai', $('#pembayaran_nilai').val());
        formData.append('pembayaran_keterangan', $('#pembayaran_keterangan').val());
        formData.append('pembayaran_status', status);
        formData.append('syarat1', $('input[name="syarat1"]')[0].files[0]);
        formData.append('syarat2', $('input[name="syarat2"]')[0].files[0]);
        formData.append('syarat3', $('input[name="syarat3"]')[0].files[0]);
        formData.append('syarat4', $('input[name="syarat4"]')[0].files[0]);
        formData.append('syarat5', $('input[name="syarat5"]')[0].files[0]);
        formData.append('syarat6', $('input[name="syarat6"]')[0].files[0]);
        formData.append('syarat7', $('input[name="syarat7"]')[0].files[0]);
        formData.append('hidden_syarat1', $('input[type="hidden"][name="hidden_syarat1"]').val());
        formData.append('hidden_syarat2', $('input[type="hidden"][name="hidden_syarat2"]').val());
        formData.append('hidden_syarat3', $('input[type="hidden"][name="hidden_syarat3"]').val());
        formData.append('hidden_syarat4', $('input[type="hidden"][name="hidden_syarat4"]').val());
        formData.append('hidden_syarat5', $('input[type="hidden"][name="hidden_syarat5"]').val());
        formData.append('hidden_syarat6', $('input[type="hidden"][name="hidden_syarat6"]').val());
        formData.append('hidden_syarat7', $('input[type="hidden"][name="hidden_syarat7"]').val());
        formData.append('check1', $('input[name="check1"]').val());
        formData.append('check2', $('input[name="check2"]').val());
        formData.append('check3', $('input[name="check3"]').val());
        formData.append('check4', $('input[name="check4"]').val());
        formData.append('check5', $('input[name="check5"]').val());
        formData.append('check6', $('input[name="check6"]').val());
        formData.append('check7', $('input[name="check7"]').val());

        swal({
            title: "Apakah Anda Yakin ?",
            text: text_sweet,
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
                    url : "/dipa/dipa-pembayaran/store",
                    type : "POST",
                    data : formData,
                    contentType: false, // ini di perlukan
                    processData: false, // ini juga
                    success : function(data, status){
                        if(status=="success"){
                            setTimeout(function(){
                                swal({
                                    title: "Sukses",
                                    text: "Data Tersimpan!",
                                    type: "success"
                                    },
                                    function(){
                                        window.location = "/dipa/dipa-rincian/"+"{{$akun['dipa_id_akun']}}";
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
            swal('Dibatalkan', 'Data Batal Disimpan :)', 'error');
                $('#modal-tambah').modal('hide');
            }
        });
    });

    $(".file_syarat").on('change', function(){
        if($(this).val() == "") {
            $(this).closest('tr').find('input[type="checkbox"]').prop('checked', false).val('');;
        } else {
            $(this).closest('tr').find('input[type="checkbox"]').prop('checked', true).val('1');
        }
    });

    $("#myTable").on('click','.ubah-detail', function(){
        $.get("/dipa/dipa-rincian/get/"+$(this).data('id'), function(data, status){
            if(status == 'success'){
                $("#ubah_harga_satuan").val(data['dipa_harga_satuan']);
                $("#ubah_nama_detail").val(data['dipa_nama_detail']);
                $("#ubah_satuan").val(data['dipa_satuan']);
                $("#ubah_vol").val(data['dipa_volume']);
            }
        });
    });

    $("#btn-ubah").click(function(){
        var id = $('#param_id').val();
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
                    url : "/dipa/dipa-akun/update/"+id,
                    type : "PUT",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "kode_akun" : $("#ubah_kode_akun").val(),
                        "nama_akun" : $("#ubah_nama_akun").val()
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
            swal('Dibatalkan', 'Data Batal Diubah :)', 'error');
                $('#modal-ubah').modal('hide');
            }
        });
    });
    $("#myTable").on('click','.hapus-akun', function(){
        var id = $(this).data('id');
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
                    url : "/dipa/dipa-akun/delete/"+id,
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
                            swal("Gagal", "Data Gagal Dihapus", "error");
                        }, 1000);
                    }
                });
            } else {
                swal('Dibatalkan', 'Data Batal Dihapus :)', 'error');
            }
        });
    });
    $('#modal-tambah').on('hidden.bs.modal', function (e) {
        $(this)
            .find("input")
            .val('')
            .end()
    });
});

function tambah(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data Akun Ini Akan Disimpan ",
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
      swal("Berhasil!", "Data Berhasil Simpan", "success");
      $('#modal-tambah').modal('hide');
    } else {
      swal('Dibatalkan', 'Data Batal Simpan :)', 'error');
      $('#modal-tambah').modal('hide');
    }
  });
}

function ubah(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data Akun Ini Akan Diubah ",
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
      swal("Berhasil!", "Data Berhasil Diubah", "success");
      $('#modal-ubah').modal('hide');
    } else {
      swal('Dibatalkan', 'Data Batal Diubah :)', 'error');
      $('#modal-ubah').modal('hide');
    }
  });
}

function hapus(){
    swal({
    title: "Apakah Anda Yakin ?",
    text: "Data Akun Ini Akan Dihapus",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, Yakin !",
    cancelButtonText: "Tidak, Batalkan !",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm) {
      swal("Berhasil!", "Data Berhasil Dihapus", "success");
    } else {
      swal('Dibatalkan', 'Data Batal Dihapus :)', 'error');
    }
  });
}
</script>
@endpush

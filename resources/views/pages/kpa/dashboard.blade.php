@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
@endpush

@section('title', 'Dashboard KPA')

@section('sidebar')
    @include('sidebar.kpa')
@endsection

@section('content')
  <div class="main-content">
      <div class="breadcrumb-wrapper">
          <ul class="breadcrumb">
              <li class="active-bread"><a href=""><i class="fa fa-home fa-fw"></i></a></li>
          </ul>
      </div>
      {{-- End Breadcrumb --}}
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title">Monitoring</h3>
                  </div>
                  {{-- awal panel body --}}
                  <div class="panel-body">
                    {{-- awal pembungkus form --}}
                    <form action="" method="POST" class="form-horizontal" role="form">
                        {{-- awal pembungkus row --}}
                        <div class="row">
                            {{-- awal pembungkus col-sm-12 --}}
                            <div class="col-sm-12">
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Tahun Anggaran</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="tahun_anggaran" title="Pilih Tahun Anggaran" id="tahun_anggaran" data-id="">
                                      <option value="" selected>-- Pilih Tahun Anggaran --</option>
                                      <option value="2015">2015</option>
                                      <option value="2016">2016</option>
                                      <option value="2017">2017</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Satuan Kerja</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="satuan_kerja" data-id="">
                                      <option value="" selected>-- Pilih Satuan Kerja --</option>
                                      <option value="1">SATKER01 | Satuan Kerja 01</option>
                                      <option value="2">SATKER02 | Satuan Kerja 02</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Program</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="program" data-id="">
                                      <option value="" selected>-- Pilih Program --</option>
                                      <option value="1">PRG01 | Program 01</option>
                                      <option value="2">PRG02 | Program 02</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Kegiatan</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="kegiatan">
                                      <option value="" selected>-- Pilih Kegiatan --</option>
                                      <option value="1">KGT01 | Kegiatan 01</option>
                                      <option value="2">KGT02 | Kegiatan 02</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Output</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="output">
                                      <option value="" selected>-- Pilih Output --</option>
                                      <option value="1">OP01 | Output 01</option>
                                      <option value="2">OP02 | Output 02</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Sub Output</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="sub_output">
                                      <option value="" selected>-- Pilih Sub Output --</option>
                                      <option value="1">SOP01 | Sub Output 01</option>
                                      <option value="2">SOP02 | Sub Output 02</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Komponen</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="komponen">
                                      <option value="" selected>-- Pilih Komponen --</option>
                                      <option value="1">KP01 | Komponen 01</option>
                                      <option value="2">KP02 | Komponen 02</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Sub Komponen</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="sub_komponen">
                                      <option value="" selected>-- Pilih Sub Komponen --</option>
                                      <option value="1">SKP01 | Sub Komponen 01</option>
                                      <option value="2">SKP02 | Sub Komponen 02</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Akun</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="akun">
                                      <option value="" selected>-- Pilih Akun --</option>
                                      <option value="1">AK01 | Akun 01</option>
                                      <option value="2">AK02 | Akun 02</option>
                                    </select>
                                  </div>
                              </div>
                            </div> {{-- akhir pembungkus col-sm-12 --}}
                        </div>
                        {{-- akhir pembungkus row --}}
                    </form>
                    <div class="col-sm-6">
                      <div class="text-right clearfix">
                          <a href="{{ url('/detail') }}" class="btn btn-primary" role="button"><i class="fa fa-search"></i> Lihat</a>
                      </div>
                    </div>
                    {{-- akhir pembungkus form --}}
                  </div> {{-- akhir panel body --}}
                </div> {{-- EDN PANEL --}}
              </div> {{-- END COL-MD-12 --}}
          </div> {{-- END ROW --}}
      </div> {{-- END CONTAINER FLUID --}}
  </div>
@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function(){
      var tahun = '';
      var satker = '';
      var program = '';
       $.get("/tahun/get", function(data, status){
          if(status == "success"){
              for (var i = 0; i < data.length; i++) {
                  tahun += "<option value='"+data[i].dipa_id_tahun_anggaran+"'>" + data[i].tahun_anggaran + "</option>";
              }

              $("#document").append(option_doc);
          } else {
              alert("Maaf Sedang Gangguan, unit tidak bisa di tampilkan");
          }
      });
      //AJAX TAHUN

  });
</script>
@endpush

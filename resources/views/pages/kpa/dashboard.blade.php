@extends('layouts.layout')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
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
                        <div class="row"> {{-- awal pembungkus row --}}
                            <div class="col-sm-12"> {{-- awal pembungkus col-sm-12 --}}
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Tahun Anggaran</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="tahun_anggaran" title="Pilih Tahun Anggaran">
                                      <option value="pilih" selected>-- Pilih Tahun Anggaran --</option>
                                      <option value="2015">2015</option>
                                      <option value="2016">2016</option>
                                      <option value="2017">2017</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Satuan Kerja</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="satuan_kerja">
                                      <option value="pilih" selected>-- Pilih Satuan Kerja --</option>
                                      <option value="1">SATKER01</option>
                                      <option value="2">SATKER02</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Program</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="program">
                                      <option value="pilih" selected>-- Pilih Program --</option>
                                      <option value="1">PRG01</option>
                                      <option value="2">PRG02</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Kegiatan</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="program">
                                      <option value="pilih" selected>-- Pilih Kegiatan --</option>
                                      <option value="1">KGT01</option>
                                      <option value="2">KGT02</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Output</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="program">
                                      <option value="pilih" selected>-- Pilih Output --</option>
                                      <option value="1">OP01</option>
                                      <option value="2">OP02</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Sub Output</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="program">
                                      <option value="pilih" selected>-- Pilih Sub Output --</option>
                                      <option value="1">SOP01</option>
                                      <option value="2">SOP02</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Komponen</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="program">
                                      <option value="pilih" selected>-- Pilih Komponen --</option>
                                      <option value="1">KP01</option>
                                      <option value="2">KP02</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Sub Komponen</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="program">
                                      <option value="pilih" selected>-- Pilih Sub Komponen --</option>
                                      <option value="1">SKP01</option>
                                      <option value="2">SKP02</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Akun</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="program">
                                      <option value="pilih" selected>-- Pilih Akun --</option>
                                      <option value="1">AK01</option>
                                      <option value="2">AK02</option>
                                    </select>
                                  </div>
                              </div>
                            </div> {{-- akhir pembungkus col-sm-12 --}}
                        </div> {{-- akhir pembungkus row --}}
                    </form>
                    <div class="col-sm-6">
                      <div class="text-right clearfix">
                          <button class="btn btn-primary" onclick="lihat()"><i class="fa fa-search"></i> Lihat</button>
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
@endpush

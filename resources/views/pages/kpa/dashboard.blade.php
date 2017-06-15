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
                                    <select class="form-control getprogram" id="tahun_anggaran" title="Pilih Tahun Anggaran" id="tahun_anggaran" data-id="">
                                      <option value="" selected>-- Pilih Tahun Anggaran --</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Satuan Kerja</label>
                                  <div class="col-sm-4">
                                    <select class="form-control getprogram" id="satuan_kerja" data-id="">
                                      <option value="" selected>-- Pilih Satuan Kerja --</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Program</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="program" data-id="">
                                      <option value="" selected>-- Pilih Program --</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Kegiatan</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="kegiatan">
                                      <option value="" selected>-- Pilih Kegiatan --</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Output</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="output">
                                      <option value="" selected>-- Pilih Output --</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Sub Output</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="sub_output">
                                      <option value="" selected>-- Pilih Sub Output --</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Komponen</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="komponen">
                                      <option value="" selected>-- Pilih Komponen --</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Sub Komponen</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="sub_komponen">
                                      <option value="" selected>-- Pilih Sub Komponen --</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group clearfix">
                                  <label class="col-sm-2 control-label">Akun</label>
                                  <div class="col-sm-4">
                                    <select class="form-control" id="akun">
                                      <option value="" selected>-- Pilih Akun --</option>
                                    </select>
                                  </div>
                              </div>
                            </div> {{-- akhir pembungkus col-sm-12 --}}
                        </div>
                        {{-- akhir pembungkus row --}}
                    </form>
                    <div class="col-sm-6">
                      <div class="text-right clearfix">
                          <button class="btn btn-primary" role="button" id="detail"><i class="fa fa-search"></i> Lihat</button>
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
      var kegiatan ='';
      var output = '';
      var suboutput = '';
      var komponen = '';
      var subkomponen = '';
      var akun = '';
      //AJAX TAHUN
       $.get("/tahun/get", function(data, status){
          if(status == "success"){
              for (var i = 0; i < data.length; i++) {
                  tahun += "<option value='"+data[i].dipa_id_tahun_anggaran+"'>" + data[i].dipa_tahun_anggaran + "</option>";
              }

              $("#tahun_anggaran").append(tahun);
          } else {
              alert("Maaf Sedang Gangguan, unit tidak bisa di tampilkan");
          }
      });
      $.get("/satker/get", function(data, status){
          if(status == "success"){
              for (var i = 0; i < data.length; i++) {
                  satker += "<option value='"+data[i].dipa_id_satuan_kerja+"'>" + data[i].dipa_satuan_kerja + "</option>";
              }

              $("#satuan_kerja").append(satker);
          } else {
              alert("Maaf Sedang Gangguan, unit tidak bisa di tampilkan");
          }
      });
      
      $(".getprogram").change(function(){
          if($("#tahun_anggaran").val() != "" && $("#satuan_kerja").val() != "") {
              var tahun = $("#tahun_anggaran").val();
              var satker = $("#satuan_kerja").val();
              $("#program").empty();
              program="<option value='' selected>-- Pilih Program --</option>";
              $.get("/program/get/"+tahun+"/"+satker, function(data, status){
                  if(status == "success"){
                      
                      for (var i = 0; i < data.length; i++) {
                          program += "<option value='"+data[i].dipa_id_program+"'>" + data[i].dipa_nama_program + "</option>";
                      }

                      $("#program").append(program);
                  } else {
                      alert("Maaf Sedang Gangguan, unit tidak bisa di tampilkan");
                  }
              });
          }
      });

      $("#program").change(function(){
          if($("#program").val() != "") {
              var id_program = $("#program").val();
              $("#kegiatan").empty();
              kegiatan="<option value='' selected>-- Pilih Kegiatan --</option>";
              $.get("/kegiatan/get/"+id_program, function(data, status){
                  if(status == "success"){
                      
                      for (var i = 0; i < data.length; i++) {
                          kegiatan += "<option value='"+data[i].dipa_id_kegiatan+"'>" + data[i].dipa_nama_kegiatan + "</option>";
                      }

                      $("#kegiatan").append(kegiatan);
                  } else {
                      alert("Maaf Sedang Gangguan, unit tidak bisa di tampilkan");
                  }
              });
          }
      });

      $("#kegiatan").change(function(){
          if($("#kegiatan").val() != "") {
              var id_kegiatan = $("#kegiatan").val();
              $("#output").empty();
              output="<option value='' selected>-- Pilih Output --</option>";
              $.get("/output/get/"+id_kegiatan, function(data, status){
                  if(status == "success"){
                      
                      for (var i = 0; i < data.length; i++) {
                          output += "<option value='"+data[i].dipa_id_output+"'>" + data[i].dipa_nama_output + "</option>";
                      }

                      $("#output").append(output);
                  } else {
                      alert("Maaf Sedang Gangguan, unit tidak bisa di tampilkan");
                  }
              });
          }
      });

      $("#output").change(function(){
          if($("#output").val() != "") {
              var id_output = $("#output").val();
              $("#sub_output").empty();
              suboutput="<option value='' selected>-- Pilih Sub Output --</option>";
              $.get("/suboutput/get/"+id_output, function(data, status){
                  if(status == "success"){
                      
                      for (var i = 0; i < data.length; i++) {
                          suboutput += "<option value='"+data[i].dipa_id_sub_output+"'>" + data[i].dipa_nama_sub_output + "</option>";
                      }

                      $("#sub_output").append(suboutput);
                  } else {
                      alert("Maaf Sedang Gangguan, unit tidak bisa di tampilkan");
                  }
              });
          }
      });

      $("#sub_output").change(function(){
          if($("#sub_output").val() != "") {
              var id_sub_output = $("#sub_output").val();
              $("#komponen").empty();
              komponen="<option value='' selected>-- Pilih Komponen --</option>";
              $.get("/komponen/get/"+id_sub_output, function(data, status){
                  if(status == "success"){
                      
                      for (var i = 0; i < data.length; i++) {
                          komponen += "<option value='"+data[i].dipa_id_komponen+"'>" + data[i].dipa_nama_komponen + "</option>";
                      }

                      $("#komponen").append(komponen);
                  } else {
                      alert("Maaf Sedang Gangguan, unit tidak bisa di tampilkan");
                  }
              });
          }
      });

      $("#komponen").change(function(){
          if($("#komponen").val() != "") {
              var id_komponen = $("#komponen").val();
              $("#sub_komponen").empty();
              subkomponen="<option value='' selected>-- Pilih Sub Komponen --</option>";
              $.get("/subkomponen/get/"+id_komponen, function(data, status){
                  if(status == "success"){
                      
                      for (var i = 0; i < data.length; i++) {
                          subkomponen += "<option value='"+data[i].dipa_id_sub_komponen+"'>" + data[i].dipa_nama_sub_komponen + "</option>";
                      }

                      $("#sub_komponen").append(subkomponen);
                  } else {
                      alert("Maaf Sedang Gangguan, unit tidak bisa di tampilkan");
                  }
              });
          }
      });

      $("#sub_komponen").change(function(){
          if($("#sub_komponen").val() != "") {
              var id_sub_komponen = $("#sub_komponen").val();
              $("#akun").empty();
              akun="<option value='' selected>-- Pilih Akun --</option>";
              $.get("/akun/get/"+id_sub_komponen, function(data, status){
                  if(status == "success"){
                      
                      for (var i = 0; i < data.length; i++) {
                          akun += "<option value='"+data[i].dipa_id_akun+"'>" + data[i].dipa_nama_akun + "</option>";
                      }

                      $("#akun").append(akun);
                  } else {
                      alert("Maaf Sedang Gangguan, unit tidak bisa di tampilkan");
                  }
              });
          }
      });
      $("#detail").click(function(){
          window.location = '/detail/'+$("#akun").val();
      });
  });
</script>
@endpush

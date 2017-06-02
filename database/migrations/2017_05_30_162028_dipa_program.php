<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaProgram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dipa_program', function (Blueprint $table) {
            $table->increments('dipa_id_program');
            $table->string('dipa_kode_program',10);
            $table->string('dipa_nama_program',100);
            $table->integer('dipa_id_tahun_anggaran')->unsigned();
            $table->foreign('dipa_id_tahun_anggaran')->references('dipa_id_tahun_anggaran')->on('tbl_tahun_anggaran');
            $table->integer('dipa_id_satuan_kerja')->unsigned();
            $table->foreign('dipa_id_satuan_kerja')->references('dipa_id_satuan_kerja')->on('tbl_satuan_kerja');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('tbl_dipa_program');
    }
}

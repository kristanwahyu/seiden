<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaOutput extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dipa_output', function (Blueprint $table) {
            $table->increments('dipa_id_output');
            $table->string('dipa_kode_output',10);
            $table->string('dipa_nama_output',100);
            $table->integer('dipa_id_kegiatan')->unsigned();
            $table->foreign('dipa_id_kegiatan')->references('dipa_id_kegiatan')->on('tbl_dipa_kegiatan');
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
         Schema::dropIfExists('tbl_dipa_output');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaKegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tbl_dipa_kegiatan', function (Blueprint $table) {
            $table->increments('dipa_id_kegiatan');
            $table->string('dipa_kode_kegiatan',10);
            $table->string('dipa_nama_kegiatan',100);
            $table->integer('dipa_id_program')->unsigned();
            $table->foreign('dipa_id_program')->references('dipa_id_program')->on('tbl_dipa_program');
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
         Schema::dropIfExists('tbl_dipa_kegiatan');
    }
}

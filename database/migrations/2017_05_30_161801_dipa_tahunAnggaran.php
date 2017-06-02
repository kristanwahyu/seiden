<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaTahunAnggaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tahun_anggaran', function (Blueprint $table) {
            $table->increments('dipa_id_tahun_anggaran');
            $table->integer('dipa_tahun_anggaran');
            $table->enum('dipa_status',array('0','1'))->default(0);//0 = nonaktif, 1 = aktif
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('tbl_tahun_anggaran');
    }
}

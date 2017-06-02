<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaSatKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_satuan_kerja', function (Blueprint $table) {
            $table->increments('dipa_id_satuan_kerja');
            $table->string('dipa_satuan_kerja',100);
            $table->enum('dipa_satuan_kerja_status',array('0','1'))->default(0);//0 = nonaktif, 1 = aktif
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
         Schema::dropIfExists('tbl_satuan_kerja');
    }
}

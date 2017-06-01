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
        Schema::create('dipa_tahunAnggaran', function (Blueprint $table) {
            $table->increments('dipa_idTAng');
            $table->integer('dipa_tahun');
            $table->enum('dipa_statusTA',array('0','1'))->default(0);//0 = nonaktif, 1 = aktif
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('dipa_tahunAnggaran');
    }
}

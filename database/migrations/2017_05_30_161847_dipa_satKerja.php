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
        Schema::create('dipa_satKer', function (Blueprint $table) {
            $table->increments('dipa_idSK');
            $table->string('dipa_kodeSK',10)->nullable(false)->change();
            $table->string('dipa_namaSK',50)->nullable(false)->change();
            $table->enum('dipa_statusSK',array('0','1'))->default(0);//0 = nonaktif, 1 = aktif
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('dipa_satKer');
    }
}

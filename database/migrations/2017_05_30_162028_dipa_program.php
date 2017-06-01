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
        Schema::create('dipa_Program', function (Blueprint $table) {
            $table->increments('dipa_idProgram');
            $table->string('dipa_kodeProgram',10)->nullable(false)->change();
            $table->string('dipa_namaProgram',100)->nullable(false)->change();
            $table->integer('dipa_idTAng')->unsigned();
            $table->foreign('dipa_idTAng')->references('dipa_idTAng')->on('dipa_tahunAnggaran');
            $table->integer('dipa_idSK')->unsigned();
            $table->foreign('dipa_idSK')->references('dipa_idSK')->on('dipa_satKer');
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
         Schema::dropIfExists('dipa_Program');
    }
}

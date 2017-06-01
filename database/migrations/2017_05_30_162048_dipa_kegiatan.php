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
         Schema::create('dipa_kegiatan', function (Blueprint $table) {
            $table->increments('dipa_idKeg');
            $table->string('dipa_kodeKeg',10)->nullable(false)->change();
            $table->string('dipa_namaKeg',100)->nullable(false)->change();
            $table->integer('dipa_idProgram')->unsigned();
            $table->foreign('dipa_idProgram')->references('dipa_idProgram')->on('dipa_program');
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
         Schema::dropIfExists('dipa_kegiatan');
    }
}

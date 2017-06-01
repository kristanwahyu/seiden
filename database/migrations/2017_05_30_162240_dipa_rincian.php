<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaRincian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dipa_rincian', function (Blueprint $table) {
            $table->increments('dipa_idRincian');
            $table->string('dipa_kodeRincian',10);
            $table->string('dipa_namaRincian',100);
            $table->integer('dipa_volume')->default(0);
            $table->integer('dipa_satuan')->default(0);
            $table->integer('dipa_hargaSat')->default(0);
            $table->integer('dipa_idAkun')->unsigned();
            $table->foreign('dipa_idAkun')->references('dipa_idAkun')->on('dipa_akun');
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
        Schema::dropIfExists('dipa_Rincian');
    }
}

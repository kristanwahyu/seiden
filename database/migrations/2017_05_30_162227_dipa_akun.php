<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaAkun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dipa_akun', function (Blueprint $table) {
            $table->increments('dipa_idAkun');
            $table->string('dipa_kodeAkun',10);
            $table->string('dipa_namaAkun',100);
            $table->integer('dipa_idSubKomp')->unsigned();
            $table->foreign('dipa_idSubKomp')->references('dipa_idKomp')->on('dipa_subKomponen');
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
         Schema::dropIfExists('dipa_Akun');
    }
}

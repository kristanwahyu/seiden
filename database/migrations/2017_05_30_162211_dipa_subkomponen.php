<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaSubkomponen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('dipa_SubKomponen', function (Blueprint $table) {
            $table->increments('dipa_idSubKomp');
            $table->string('dipa_kodeSubKomp',10)->nullable(false)->change();
            $table->string('dipa_namaSubKomp',100)->nullable(false)->change();
            $table->integer('dipa_idKomp')->unsigned();
            $table->foreign('dipa_idKomp')->references('dipa_idKomp')->on('dipa_Komponen');
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
         Schema::dropIfExists('dipa_SubKomponen');
    }
}

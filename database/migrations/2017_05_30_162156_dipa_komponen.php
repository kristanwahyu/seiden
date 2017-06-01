<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaKomponen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('dipa_komponen', function (Blueprint $table) {
            $table->increments('dipa_idKomp');
            $table->string('dipa_kodeKomp',10)->nullable(false)->change();
            $table->string('dipa_namaKomp',100)->nullable(false)->change();
            $table->integer('dipa_idSubOut')->unsigned();
            $table->foreign('dipa_idSubOut')->references('dipa_idSubOut')->on('dipa_subOutput');
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
         Schema::dropIfExists('dipa_komponen');
    }
}

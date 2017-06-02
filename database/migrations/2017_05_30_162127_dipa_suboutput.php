<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaSuboutput extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('dipa_subOutput', function (Blueprint $table) {
            $table->increments('dipa_idSubOut');
            $table->string('dipa_kodeSubOut',10);
            $table->string('dipa_namaSubOut',100);
            $table->integer('dipa_idOut')->unsigned();
            $table->foreign('dipa_idOut')->references('dipa_idOut')->on('dipa_output');
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
         Schema::dropIfExists('dipa_subOutput');
    }
}

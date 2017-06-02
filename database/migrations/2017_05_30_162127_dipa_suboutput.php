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
         Schema::create('tbl_dipa_sub_output', function (Blueprint $table) {
            $table->increments('dipa_id_sub_output');
            $table->string('dipa_kode_sub_output',10);
            $table->string('dipa_nama_sub_output',100);
            $table->integer('dipa_id_output')->unsigned();
            $table->foreign('dipa_id_output')->references('dipa_id_output')->on('tbl_dipa_output');
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
         Schema::dropIfExists('tbl_dipa_sub_output');
    }
}

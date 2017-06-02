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
         Schema::create('tbl_dipa_komponen', function (Blueprint $table) {
            $table->increments('dipa_id_komponen');
            $table->string('dipa_kode_komponen',10);
            $table->string('dipa_nama_komponen',100);
            $table->integer('dipa_id_sub_output')->unsigned();
            $table->foreign('dipa_id_sub_output')->references('dipa_id_sub_output')->on('tbl_dipa_sub_output');
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
         Schema::dropIfExists('tbl_dipa_komponen');
    }
}

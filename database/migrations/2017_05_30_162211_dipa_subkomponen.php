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
         Schema::create('tbl_dipa_sub_komponen', function (Blueprint $table) {
            $table->increments('dipa_id_sub_komponen');
            $table->string('dipa_kode_sub_komponen',10);
            $table->string('dipa_nama_sub_komponen',100);
            $table->integer('dipa_id_komponen')->unsigned();
            $table->foreign('dipa_id_komponen')->references('dipa_id_komponen')->on('tbl_dipa_komponen');
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
         Schema::dropIfExists('tbl_dipa_sub_komponen');
    }
}

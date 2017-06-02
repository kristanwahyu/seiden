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
        Schema::create('tbl_dipa_akun', function (Blueprint $table) {
            $table->increments('dipa_id_akun');
            $table->string('dipa_kode_akun',10);
            $table->string('dipa_nama_akun',100);
            $table->integer('dipa_id_sub_komponen')->unsigned();
            $table->foreign('dipa_id_sub_komponen')->references('dipa_id_sub_komponen')->on('tbl_dipa_sub_komponen');
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
         Schema::dropIfExists('tbl_dipa_akun');
    }
}

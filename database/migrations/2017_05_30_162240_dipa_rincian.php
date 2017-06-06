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
        Schema::create('tbl_dipa_akun_detail', function (Blueprint $table) {
            $table->increments('dipa_id_detail_akun');
            $table->string('dipa_nama_detail',100);
            $table->integer('dipa_volume')->default(0);
            $table->integer('dipa_satuan')->default(0);
            $table->integer('dipa_harga_satuan')->default(0);
            $table->enum('dipa_jenis_akun',array('0','1'));
            //0 = Belanja Gaji 1 = Belanja Non Gaji
            $table->integer('dipa_id_akun')->unsigned();
            $table->foreign('dipa_id_akun')->references('dipa_id_akun')->on('tbl_dipa_akun');
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
        Schema::dropIfExists('tbl_dipa_akun_detail');
    }
}

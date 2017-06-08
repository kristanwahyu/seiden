<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dipa_pembayaran', function (Blueprint $table) {
            $table->increments('dipa_pembayaran_id');
            $table->datetime('dipa_pembayaran_tanggal');
            $table->enum('dipa_jenis_akun',array('0','1'));
            //0 =UP 1= LS
            $table->double('dipa_pembayaran_nilai');
            $table->text('dipa_pembayaran_keterangan');
            $table->enum('dipa_pembayaran_status',array('0','1'))->default(0);
            //0=draft 1=final
            $table->integer('dipa_id_detail_akun')->unsigned();
            $table->foreign('dipa_id_detail_akun')->references('dipa_id_detail_akun')->on('tbl_dipa_akun_detail');
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
                Schema::dropIfExists('tbl_dipa_pembayaran');
    }
}

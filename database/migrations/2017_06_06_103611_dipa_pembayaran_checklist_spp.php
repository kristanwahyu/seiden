<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaPembayaranChecklistSpp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dipa_pmb_check_spp', function (Blueprint $table) {
            $table->increments('dipa_pmb_check_spp_id');
            $table->string('dipa_spp_no',100);
            $table->double('dipa_spp_nilai');
            $table->datetime('dipa_spp_tanggal');
            $table->string('dipa_spp_keterangan',255);
            $table->enum('dipa_sinkronisasi_simak',array('0','1'))->default(0); //0 =Tidak 1=Ya
            $table->enum('dipa_sinkronisasi_saiba',array('0','1'))->default(0); //0 =Tidak 1=Ya
            $table->enum('dipa_sinkronisasi_perlengkapan',array('0','1'))->default(0); //0 =Tidak 1=Ya
            // foreign key
            $table->integer('dipa_pembayaran_id')->unsigned();
            $table->foreign('dipa_pembayaran_id')->references('dipa_pembayaran_id')->on('tbl_dipa_pembayaran');
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
            Schema::dropIfExists('tbl_dipa_pembayaran_checklist_spp');
    }
}

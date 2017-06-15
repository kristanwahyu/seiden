<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaPembayaranChecklistSinkronisasiSimak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tbl_dipa_pmb_check_sink_simak', function (Blueprint $table) {
            $table->increments('dipa_pmb_check_sink_id');
            //$table->enum('dipa_sinkronisasi_user',array('1','2','3'));
            $table->datetime('dipa_tanggal_sink');
            $table->string('dipa_sink_keterangan',255);
            $table->enum('dipa_status_sink',array('0','1'))->default(0); // 0=belum sinkronisasi 1 = sinkronisasi
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
        Schema::dropIfExists('tbl_dipa_pembayaran_checklist_simak');
    }
}

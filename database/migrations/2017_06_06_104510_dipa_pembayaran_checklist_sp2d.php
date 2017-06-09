<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaPembayaranChecklistSp2d extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dipa_pmb_check_sp2d', function (Blueprint $table) {
            $table->increments('dipa_pmb_check_sp2d_id');
            $table->string('dipa_sp2d_no',100);
            $table->double('dipa_sp2d_nilai');
            $table->datetime('dipa_sp2d_tanggal');
            $table->string('dipa_sp2d_keterangan',255);
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
        Schema::dropIfExists('tbl_dipa_pembayaran_checklist_sp2d');
    }
}

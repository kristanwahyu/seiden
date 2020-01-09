<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotifTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('kite_tabel_motif', function (Blueprint $table) {
            $table->increments('kite_id_motif');
            $table->string('kite_artikel_motif');
            $table->string('kite_warna_motif');
            $table->string('kite_nama_motif');
            //foreign key
            $table->integer('kite_id_barang')->unsigned();
            $table->foreign('kite_id_barang')->references('kite_id_barang')->on('kite_tabel_barang');
            $table->softDeletes();
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
        //
    }
}

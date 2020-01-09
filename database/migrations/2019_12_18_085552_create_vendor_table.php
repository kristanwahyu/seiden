<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('kite_tabel_vendor', function (Blueprint $table) {
            $table->increments('kite_id_vendor');
            $table->string('kite_npwp_vendor');
            $table->string('kite_nama_vendor');
            $table->string('kite_alamat_vendor');
            $table->integer('kite_negara_vendor')->unsigned();
            $table->foreign('kite_negara_vendor')->references('kite_id_negara')->on('kite_tabel_negara');
            $table->string('kite_status_vendor');
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

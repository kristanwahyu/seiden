<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('kite_tabel_barang', function (Blueprint $table) {
            $table->increments('kite_id_barang');
            $table->string('kite_nama_barang');
            $table->string('kite_alias_barang');
            $table->string('kite_hscode_barang');
            //foreign key
            $table->integer('kite_vendor_barang')->unsigned();
            $table->foreign('kite_vendor_barang')->references('kite_id_vendor')->on('kite_tabel_vendor');
            $table->integer('kite_satuan_barang')->unsigned();
            $table->foreign('kite_satuan_barang')->references('kite_id_satuan')->on('kite_tabel_satuan');
            $table->integer('kite_subproduksi_barang')->unsigned();
            $table->foreign('kite_subproduksi_barang')->references('kite_id_subproduksi')->on('kite_tabel_subproduksi');
            $table->integer('kite_jenis_barang')->unsigned();
            $table->foreign('kite_jenis_barang')->references('kite_id_jenis')->on('kite_tabel_jenis');
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

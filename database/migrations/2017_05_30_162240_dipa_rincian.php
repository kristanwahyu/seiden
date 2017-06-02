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
            $table->enum('dipa_jenis_akun',array('1','2','3','4','5','6','7','8','9','10'));
            // 1 = Gaji Bulanan, 2 = Kenaikan pangkat, 3 = Uang Makan, 4 = Tukin, 5 = TPG, 6 = Keperluan Kantor, 7 = Perjalanan Dinas, 8 = Bantuan dalam bentuk uang, 9 = Bantuan dalam bentuk barang, 10 = Bantuan Modal
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KiteKpbc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('kite_tabel_kpbc', function (Blueprint $table) {
            $table->increments('kite_id_kpbc');
            $table->string('kite_kode_kpbc');
            $table->string('kite_nama_kpbc');
            $table->string('kite_eselon_kpbc');
            $table->string('kite_kota_kpbc');
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

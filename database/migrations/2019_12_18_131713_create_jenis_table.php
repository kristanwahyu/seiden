<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //jenis bahan baku
        Schema::create('kite_tabel_jenis', function (Blueprint $table) {
            $table->increments('kite_id_jenis');
            $table->string('kite_nama_jenis');
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

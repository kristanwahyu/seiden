<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaOutput extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dipa_output', function (Blueprint $table) {
            $table->increments('dipa_idOut');
            $table->string('dipa_kodeOut',10)->nullable(false)->change();
            $table->string('dipa_namaOut',100)->nullable(false)->change();
            $table->integer('dipa_idKeg')->unsigned();
            $table->foreign('dipa_idKeg')->references('dipa_idKeg')->on('dipa_kegiatan');
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
         Schema::dropIfExists('dipa_output');
    }
}

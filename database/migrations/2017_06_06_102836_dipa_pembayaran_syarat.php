<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaPembayaranSyarat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dipa_pembayaran_syarat', function (Blueprint $table) {
            $table->increments('dipa_pembayaran_syarat_id');
            $table->enum('dipa_syarat_1',array('0','1'))->default(0);   //0 =Belum verifikasi 1= Verifikasi
            $table->string('dipa_dokumen_syarat_1',255); //alowed file .png,.jpg, .pdf
            $table->enum('dipa_syarat_2',array('0','1'))->default(0);   //0 =Belum verifikasi 1= Verifikasi
            $table->string('dipa_dokumen_syarat_2',255); //alowed file .png,.jpg, .pdf
            $table->enum('dipa_syarat_3',array('0','1'))->default(0);   //0 =Belum verifikasi 1= Verifikasi
            $table->string('dipa_dokumen_syarat_3',255); //alowed file .png,.jpg, .pdf
            $table->enum('dipa_syarat_4',array('0','1'))->default(0);   //0 =Belum verifikasi 1= Verifikasi
            $table->string('dipa_dokumen_syarat_4',255); //alowed file .png,.jpg, .pdf
            $table->enum('dipa_syarat_5',array('0','1'))->default(0);   //0 =Belum verifikasi 1= Verifikasi
            $table->string('dipa_dokumen_syarat_5',255); //alowed file .png,.jpg, .pdf
            $table->enum('dipa_syarat_6',array('0','1'))->default(0);   //0 =Belum verifikasi 1= Verifikasi
            $table->string('dipa_dokumen_syarat_6',255); //alowed file .png,.jpg, .pdf
            $table->enum('dipa_syarat_7',array('0','1'))->default(0);   //0 =Belum verifikasi 1= Verifikasi
            $table->string('dipa_dokumen_syarat_7',255); //alowed file .png,.jpg, .pdf
            //foreign key
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
                Schema::dropIfExists('tbl_dipa_pembayaran_syarat');
    }
}

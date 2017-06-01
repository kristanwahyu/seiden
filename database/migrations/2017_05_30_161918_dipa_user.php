<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DipaUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dipa_User', function (Blueprint $table) {
            $table->increments('dipa_idUser');
            $table->string('dipa_namaUser',20)->nullable(false)->change();
            $table->string('dipa_passUser',15)->nullable(false)->change();
            $table->enum('dipa_statusUser',array('0','1'))->default(1);//0 = nonaktif, 1 = aktif
            $table->enum('dipa_jenisUser',array('1','2','3','4','6','7')); //1=admin, 2=KPA, 3=PPK, 4=satker, 5=ppsm, 6=operator SIMA, 7=operator SIBA
            $table->string('dipa_ketUSer'); //isi dari nama jenis user contoh : jika jenis user = 1 maka ketUser adalah admin
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
         Schema::dropIfExists('dipa_User');
    }
}

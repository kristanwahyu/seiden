<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dipa_user', function (Blueprint $table) {
            $table->increments('dipa_idUser');
            $table->string('username',30)->unique();
            $table->string('dipa_namaUser',70);
            $table->string('dipa_passUser',100);
            $table->enum('dipa_statusUser',array('0','1'))->default(1);//0 = nonaktif, 1 = aktif
            $table->enum('dipa_jenisUser',array('1','2','3','4','6','7')); //1=admin, 2=KPA, 3=PPK, 4=satker, 5=ppsm, 6=operator SIMA, 7=operator SIBA
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

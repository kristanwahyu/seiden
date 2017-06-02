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
        Schema::create('tbl_pengguna', function (Blueprint $table) {
            $table->increments('dipa_id_pengguna');
            $table->string('username',30)->unique();
            $table->string('dipa_nama_pengguna',70);
            $table->string('dipa_password_pengguna',100);
            $table->enum('dipa_pengguna_status',array('0','1'))->default(1);//0 = nonaktif, 1 = aktif
            $table->enum('dipa_jenis_pengguna',array('1','2','3','4','6','7')); //1=admin, 2=KPA, 3=PPK, 4=satker, 5=ppsm, 6=operator SIMA, 7=operator SIBA
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
        Schema::dropIfExists('tbl_pengguna');
    }
}

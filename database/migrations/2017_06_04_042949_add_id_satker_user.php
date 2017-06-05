<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdSatkerUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tbl_pengguna', function(Blueprint $table) {
            $table->unsignedInteger('dipa_id_satuan_kerja')->nullable()->after('dipa_jenis_pengguna');
            $table->foreign('dipa_id_satuan_kerja')->references('dipa_id_satuan_kerja')->on('tbl_satuan_kerja')->onDelete('set null');
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

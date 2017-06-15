<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetNullSyarat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement("ALTER TABLE tbl_dipa_pmb_syarat MODIFY dipa_dokumen_syarat_1 varchar(255) null, MODIFY dipa_dokumen_syarat_2 varchar(255) null, MODIFY dipa_dokumen_syarat_3 varchar(255) null, MODIFY dipa_dokumen_syarat_4 varchar(255) null, MODIFY dipa_dokumen_syarat_5 varchar(255) null, MODIFY dipa_dokumen_syarat_6 varchar(255) null, MODIFY dipa_dokumen_syarat_7 varchar(255) null");
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

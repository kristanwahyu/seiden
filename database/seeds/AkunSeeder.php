<?php

use Illuminate\Database\Seeder;
use App\Model\DipaAkun as DA;
use App\Model\DipaSubKomponen as DSK;
use Faker\Factory;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fake = Factory::create();
        $dp = DSK::get()->pluck('dipa_id_sub_komponen')->toArray();
        $limit =10;
		for($i = 1; $i <= $limit; $i++){
			$dk=new DA;
			$dk->dipa_kode_akun=$fake->word;
			$dk->dipa_nama_akun=$fake->word;
			$dk->dipa_id_sub_komponen=$fake->randomElement($dp);
			$dk->save();
		}
    }
}

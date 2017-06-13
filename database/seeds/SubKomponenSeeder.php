<?php

use Illuminate\Database\Seeder;
use App\Model\DipaKomponen as DK;
use App\Model\DipaSubKomponen as DSK;
use Faker\Factory;

class SubKomponenSeeder extends Seeder
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
        $dp = DK::get()->pluck('dipa_id_komponen')->toArray();
        $limit =10;
		for($i = 1; $i <= $limit; $i++){
			$dk=new DSK;
			$dk->dipa_kode_sub_komponen=$fake->randomNumber(3);
			$dk->dipa_nama_sub_komponen=$fake->word;
			$dk->dipa_id_komponen=$fake->randomElement($dp);
			$dk->save();
		}
    }
}

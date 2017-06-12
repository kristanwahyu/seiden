<?php

use Illuminate\Database\Seeder;
use App\Model\DipaKomponen as DK;
use App\Model\DipaSubOutput as DSO;
use Faker\Factory;

class KomponenSeeder extends Seeder
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
        $dp = DSO::get()->pluck('dipa_id_sub_output')->toArray();
        $limit =10;
		for($i = 1; $i <= $limit; $i++){
			$dk=new DK;
			$dk->dipa_kode_komponen=$fake->word;
			$dk->dipa_nama_komponen=$fake->word;
			$dk->dipa_id_sub_output=$fake->randomElement($dp);
			$dk->save();
		}
    }
}

<?php

use Illuminate\Database\Seeder;

use App\Model\DipaKegiatan as DK;
use Faker\Factory;
use App\Model\DipaOutput as DOP;

class OutputSeeder extends Seeder
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
        $dp = DK::get()->pluck('dipa_id_kegiatan')->toArray();
        $limit =10;
		for($i = 1; $i <= $limit; $i++){
			$dk=new DOP;
			$dk->dipa_kode_output=$fake->randomNumber(3);
			$dk->dipa_nama_output=$fake->word;
			$dk->dipa_id_kegiatan=$fake->randomElement($dp);
			$dk->save();
		}
    }
}

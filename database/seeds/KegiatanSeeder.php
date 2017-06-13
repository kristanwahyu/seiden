<?php

use Illuminate\Database\Seeder;
use App\Model\DipaKegiatan as DK;
use App\Model\DipaProgram as DP;
use Faker\Factory;

class KegiatanSeeder extends Seeder
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
        $dp = DP::get()->pluck('dipa_id_program')->toArray();
        $limit =10;
		for($i = 1; $i <= $limit; $i++){
			$dk=new DK;
			$dk->dipa_kode_kegiatan=$fake->word;
			$dk->dipa_nama_kegiatan=$fake->word;
			$dk->dipa_id_program=$fake->randomElement($dp);
			$dk->save();
		}
    }
}

<?php

use Illuminate\Database\Seeder;

use App\Model\DipaOutput as DOP;
use App\Model\DipaSubOutput as DSO;
use Faker\Factory;

class SubOutputSeeder extends Seeder
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
        $dp = DOP::get()->pluck('dipa_id_output')->toArray();
        $limit =10;
		for($i = 1; $i <= $limit; $i++){
			$dk=new DSO;
			$dk->dipa_kode_sub_output=$fake->word;
			$dk->dipa_nama_sub_output=$fake->word;
			$dk->dipa_id_output=$fake->randomElement($dp);
			$dk->save();
		}
    }
}

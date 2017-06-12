<?php

use Illuminate\Database\Seeder;
use App\Model\DipaSatKer;
use Faker\Factory;

class SatuanKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$fake = Factory::create();
        $limit =10;
		for($i = 1; $i <= $limit; $i++){
			$dsk=new DipaSatKer;
			$dsk->dipa_kode_satuan_kerja=$fake->word;
			$dsk->dipa_satuan_kerja=$fake->word;
			$dsk->dipa_satuan_kerja_status=$fake->randomElement($array=array("0",'1'));
			$dsk->save();
		}
    }
}

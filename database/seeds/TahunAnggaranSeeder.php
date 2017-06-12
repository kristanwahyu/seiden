<?php

use Illuminate\Database\Seeder;
use App\Model\DipaTahunAnggaran;
use Faker\Factory;

class TahunAnggaranSeeder extends Seeder
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
        $limit =10;
		for($i = 1; $i <= $limit; $i++){
			$dsk=new DipaTahunAnggaran;
			$dsk->dipa_tahun_anggaran=$fake->year($max = 'now');
			$dsk->dipa_status=$fake->randomElement($array=array('0','1'));
			$dsk->save();
		}
    }
}

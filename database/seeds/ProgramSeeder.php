<?php

use Illuminate\Database\Seeder;
use App\Model\DipaProgram as DP;
use App\Model\DipaSatKer as DSK;
use App\Model\DipaTahunAnggaran as DTA;
use Faker\Factory;

class ProgramSeeder extends Seeder
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
        $dsk = DSK::get()->pluck('dipa_id_satuan_kerja')->toArray();
        $dta = DTA::get()->pluck('dipa_id_tahun_anggaran')->toArray();
        $limit =10;
		for($i = 1; $i <= $limit; $i++){
			$dp=new DP;
			$dp->dipa_kode_program=$fake->randomNumber(3);
			$dp->dipa_nama_program=$fake->randomElement($array=array('0','1'));
			$dp->dipa_id_tahun_anggaran=$fake->randomElement($dta);
			$dp->dipa_id_satuan_kerja=$fake->randomElement($dsk);
			$dp->save();
		}
    }
}

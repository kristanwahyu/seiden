<?php

use Illuminate\Database\Seeder;
use App\Model\DipaPembayaranCheckSPM as SPM;
use App\Model\DipaPembayaran as DP;
use Faker\Factory;

class SPMSeeder extends Seeder
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
        $dp = DP::get()->pluck('dipa_pembayaran_id')->toArray();
        $limit =10;
		for($i = 1; $i <= $limit; $i++){
			$dk=new SPM;
			$dk->dipa_spm_no=$fake->word;
			$dk->dipa_spm_nilai=$fake->randomNumber(2);
			$dk->dipa_spm_tanggal=$fake->date($format = 'Y-m-d', $max = 'now').' '.$fake->time($format = 'H:i:s', $max = 'now');
			$dk->dipa_spm_keterangan=$fake->word;
			$dk->dipa_pembayaran_id=$fake->randomElement($dp);
			$dk->save();
		}
    }
}
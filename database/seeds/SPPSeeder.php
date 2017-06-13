<?php

use Illuminate\Database\Seeder;
use App\Model\DipaPembayaranCheckSPP as SPP;
use App\Model\DipaPembayaran as DP;
use Faker\Factory;

class SPPSeeder extends Seeder
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
			$dk=new SPP;
			$dk->dipa_spp_no=$fake->word;
			$dk->dipa_spp_nilai=$fake->randomNumber(2);
			$dk->dipa_spp_tanggal=$fake->dateTime($max = 'now', $timezone = date_default_timezone_get());
			$dk->dipa_spp_keterangan=$fake->word;
			$dk->dipa_sinkronisasi_simak=$fake->randomElement($array=array('0','1'));
			$dk->dipa_sinkronisasi_saiba=$fake->randomElement($array=array('0','1'));
			$dk->dipa_sinkronisasi_perlengkapan=$fake->randomElement($array=array('0','1'));
			$dk->dipa_pembayaran_id=$fake->randomElement($dp);
			$dk->save();
		}
    }
}

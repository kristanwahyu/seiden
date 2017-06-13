<?php

use Illuminate\Database\Seeder;
use App\Model\DipaPembayaranCheckSP2D as SP2D;
use App\Model\DipaPembayaran as DP;
use Faker\Factory;

class SP2DSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Factory::create();
        $dp = DP::get()->pluck('dipa_pembayaran_id')->toArray();
        $limit =10;
		for($i = 1; $i <= $limit; $i++){
			$dk=new SP2D;
			$dk->dipa_sp2d_no=$fake->word;
			$dk->dipa_sp2d_nilai=$fake->randomNumber(2);
			$dk->dipa_sp2d_tanggal=$fake->dateTime($max = 'now', $timezone = date_default_timezone_get());
			$dk->dipa_sp2d_keterangan=$fake->word;
			$dk->dipa_pembayaran_id=$fake->randomElement($dp);
			$dk->save();
		}
    }
}

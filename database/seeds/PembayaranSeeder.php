<?php

use Illuminate\Database\Seeder;
use App\Model\DipaPembayaran as DP;
use App\Model\DipaAkunDetail as DAD;
use Faker\Factory;

class PembayaranSeeder extends Seeder
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
        $dp = DAD::get()->pluck('dipa_id_detail_akun')->toArray();
        $limit =10;
		for($i = 1; $i <= $limit; $i++){
			$dk=new DP;
			$dk->dipa_pembayaran_tanggal=$fake->date($format = 'Y-m-d', $max = 'now');
			$dk->dipa_jenis_pembayaran=$fake->randomElement($array=array('1','2'));
			$dk->dipa_pembayaran_nilai=$fake->randomNumber(7);;
			$dk->dipa_pembayaran_keterangan=$fake->word;
			$dk->dipa_pembayaran_status=$fake->randomElement($array=array('0', '1'));

			$dk->dipa_id_detail_akun=$fake->randomElement($dp);
			$dk->save();
		}
    }
}

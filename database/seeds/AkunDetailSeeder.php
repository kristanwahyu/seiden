<?php

use Illuminate\Database\Seeder;
use App\Model\DipaAkun as DA;
use App\Model\DipaAkunDetail as DAD;
use Faker\Factory;

class AkunDetailSeeder extends Seeder
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
        $dp = DA::get()->pluck('dipa_id_akun')->toArray();
        $limit =10;
		for($i = 1; $i <= $limit; $i++){
			$dk=new DAD;
			$dk->dipa_nama_detail=$fake->word;
			$dk->dipa_volume=$fake->randomNumber(2);
			$dk->dipa_satuan=$fake->word;
			$dk->dipa_harga_satuan=$fake->randomNumber(7);
			$dk->dipa_jenis_akun=$fake->randomElement($array=array('1','2'));
			$dk->dipa_id_akun=$fake->randomElement($dp);
			$dk->save();
		}
    }
}

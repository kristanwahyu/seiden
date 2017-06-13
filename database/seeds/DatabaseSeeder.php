<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SatuanKerjaSeeder::class);
        $this->call(TahunAnggaranSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(KegiatanSeeder::class);
        $this->call(OutputSeeder::class);
        $this->call(SubOutputSeeder::class);
        $this->call(KomponenSeeder::class);
        $this->call(SubKomponenSeeder::class);
        $this->call(AkunSeeder::class);
        $this->call(AkunDetailSeeder::class);
        $this->call(PembayaranSeeder::class);
        $this->call(SPPSeeder::class);
        $this->call(SPMSeeder::class);
        $this->call(SP2DSeeder::class);
    }
}

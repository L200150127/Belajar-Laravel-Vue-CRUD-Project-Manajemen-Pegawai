<?php

use Illuminate\Database\Seeder;

class Pegawai extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pegawai::class, 30)->create();
    }
}

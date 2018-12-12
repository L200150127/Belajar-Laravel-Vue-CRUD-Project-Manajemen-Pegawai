<?php

use Illuminate\Database\Seeder;

class Jabatan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            [
                'nama_jabatan' => 'direktur', 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'nama_jabatan' => 'manajer',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'nama_jabatan' => 'sekretaris',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'nama_jabatan' => 'hrd',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'nama_jabatan' => 'quality_control',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'nama_jabatan' => 'karyawan',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'nama_jabatan' => 'supir',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'nama_jabatan' => 'pembantu_umum',
                'created_at' => now(), 
                'updated_at' => now()
            ]
        ]);

    }
}

<?php

use Faker\Generator as Faker;

$factory->define(App\Pegawai::class, function (Faker $faker) {
    return [
        'nama_pegawai' => $faker->name,
        'jenis_kelamin' => $faker->randomElement($array = array ('L','P')),
        'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'id_jabatan' => 6,
    ];
});

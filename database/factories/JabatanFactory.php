<?php

use Faker\Generator as Faker;

$factory->define(App\Jabatan::class, function (Faker $faker) {
    return [
        'nama_jabatan' => $faker->jobTitle,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});

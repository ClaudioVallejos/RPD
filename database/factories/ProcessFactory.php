<?php

use Faker\Generator as Faker;

$factory->define(App\Process::class, function (Faker $faker) {
    return [
        'tarja_proceso' => $faker->unique(true)->numberBetween($min = 1, $max = 200),
        'available' => 1,
        'wash' => 1,
        'fruit_id' => 1,
        'variety_id' => 1,
        'quality_id' => 1,
    ];
});

$factory->define(App\Process_Reception::class, function (Faker $faker) {
    return [
        'process_id' => $faker->unique()->numberBetween($min = 1, $max = 209),
        'reception_id' => $faker->unique(true)->numberBetween($min = 1, $max = 200),
    ];
});
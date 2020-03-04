<?php

use Faker\Generator as Faker;

$factory->define(App\Reception::class, function (Faker $faker) {
    return [
        'season_id' => 1,
        'grossweight' => $faker->numberBetween($min = 150, $max = 499),
        'provider_id' => 1,
        'fruit_id' => $faker->numberBetween($min = 1, $max = 4),
        'quality_id' => $faker->numberBetween($min = 1, $max = 4),
        'netweight' => $faker->numberBetween($min = 100, $max = 499),
        'status_id' => $faker->numberBetween($min = 1, $max = 2),
        'rejected'=> 0,
        'number_guide' => $faker->numberBetween($min = 1, $max = 1000),
        'name_driver' => $faker->name,
        'temperature' => $faker->numberBetween($min = -5, $max = 20),
        'comment' => $faker->word,
        'middleweight_trays' => 1,
        'tarja' => $faker->unique()->numberBetween($min = 1, $max = 1000),
        'quantity' => $faker->numberBetween($min = 1, $max = 500),
        'palet_weight' => $faker->numberBetween($min = 150, $max = 1000),
        'supplies_id' => $faker->numberBetween($min = 1, $max = 4),
        'variety_id' => $faker->numberBetween($min = 1, $max = 4),
    ];
});

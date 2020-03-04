<?php

use Faker\Generator as Faker;
use App\Reception;

$factory->define(Reception::class, function (Faker $faker) {

    static $number = 1;

    return [
        'tarja' =>    $number++,
        'provider_id' =>  $faker->numberBetween($min = 1, $max = 1),
        'fruit_id' =>  $faker->numberBetween($min = 1, $max = 4),
        'variety_id' => $faker->numberBetween($min = 1, $max = 4),
        'quality_id' =>   $faker->numberBetween($min = 1, $max = 1),
        'season_id' =>   $faker->numberBetween($min = 1, $max = 1),
        'grossweight' => 100,
        'status_id' =>   $faker->numberBetween($min = 1, $max = 1),
        'supplies_id' =>   $faker->numberBetween($min = 1, $max = 1),
        'palet_weight' =>   $faker->numberBetween($min = 20, $max = 230),
        'netweight' =>   $faker->numberBetween($min = 30, $max = 230),
        'rejected' =>   $faker->numberBetween($min = 0, $max = 1),
        'available' =>   $faker->numberBetween($min = 0, $max = 1),
        'middleweight_trays' =>   $faker->numberBetween($min = 10, $max = 230),
        'name_driver' =>         $faker->firstName,
        'number_guide' =>   $faker->numberBetween($min = 1, $max = 1000),
        'comment' =>       $faker->word,
        'temperature' => $faker->numberBetween($min = 1, $max = 100),

    ];
});

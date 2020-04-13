<?php

use App\Mstiket;
use Faker\Generator as Faker;

$factory->define(Mstiket::class, function (Faker $faker) {
    return [
        'category' => $faker->category(),
        'kode'     => $faker->unique()->code,
    ];
});

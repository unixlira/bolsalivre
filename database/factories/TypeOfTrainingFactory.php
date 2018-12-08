<?php

use Faker\Generator as Faker;

$factory->define(App\TypeOfTraining::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
    ];
});

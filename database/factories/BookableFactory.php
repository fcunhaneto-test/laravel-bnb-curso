<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bookable;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$suffix = array(
    'Chácara',
    'Casa',
    'Chalé',
    'Chalé Super Luxo',
    'Casa de Luxo',
    'Conjugado',
    'Apartamento',
    'Apartamento de Luxo',
    'Quarto',
    'Casa de Vila'
);

$factory->define(Bookable::class, function (Faker $faker) use($suffix) {
    return [
        'title' => Arr::random($suffix) . ' - ' . $faker->city,
        'description' => $faker->text()
    ];
});

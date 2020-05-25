<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Conta;
use Faker\Generator as Faker;

$factory->define(Conta::class, function (Faker $faker) {
    return [
        'numero_conta' => $faker->randomNumber(5),
        'saldo' => 0.00,
    ];
});

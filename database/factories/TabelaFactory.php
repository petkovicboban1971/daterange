<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tabela;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Tabela::class, function (Faker $faker) {
    return [
        'order_id' => $faker->bigInteger,
        'order_customer_name' => $faker->name,
        'order_item' => $faker->paragraph,
        'order_value' => $faker->numberBetween(1,1000),
        'order_date' => $faker->date,
    ];
});

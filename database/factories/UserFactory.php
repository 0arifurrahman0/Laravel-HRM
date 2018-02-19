<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => 'Jhon Doe',
        'email' => 'jondoe@gmail.com',
        'password' => $password ?: $password = bcrypt('120120'),
        'remember_token' => str_random(10),
    ];
});

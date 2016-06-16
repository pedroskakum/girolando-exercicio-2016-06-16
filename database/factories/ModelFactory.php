<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Segundo\Models\Usuario::class, function (Faker\Generator $faker) {
    return [
        'nomeUsuario'       => $faker->name,
        'emailUsuario'      => $faker->safeEmail,
        'telefoneUsuario'   => $faker->numberBetween(70000000, 999999999),
        'password'          => bcrypt(str_random(10)),
        'remember_token'    => str_random(10),
    ];
});

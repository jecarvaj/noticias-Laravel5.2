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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
        'rut'=>$faker->ipv4,
        'email' => $faker->safeEmail,
        'password' => bcrypt(12345),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Categoria::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->word,

    ];
});

$factory->define(App\Noticia::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->sentence,
        'cuerpo' => $faker->paragraph,
        'imagen' =>$faker->colorName,
        'estado'=>'Activo',
        'user_id ' => 1,
        'categoria_id' =>App\Categoria::all()->random()->id,
    ];
});

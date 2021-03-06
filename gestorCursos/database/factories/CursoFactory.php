<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Curso;
use Faker\Generator as Faker;

$factory->define(Curso::class, function (Faker $faker) {
    return [
        'titulo'=>$faker->sentence,
        'descripcion'=>$faker->paragraph,
        'numMaxAlumnos'=>$faker->numberBetween(8,12)
    ];
});

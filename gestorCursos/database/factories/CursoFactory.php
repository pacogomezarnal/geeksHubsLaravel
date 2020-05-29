<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cursos;
use Faker\Generator as Faker;

$factory->define(Cursos::class, function (Faker $faker) {
    return [
        'titulo'=>$faker->sentence,
        'descripcion'=>$faker->paragraph,
        'numMaxAlumnos'=>$faker->numberBetween(8,12)
    ];
});

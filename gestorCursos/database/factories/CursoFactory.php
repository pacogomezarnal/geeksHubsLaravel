<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cursos;
use Faker\Generator as Faker;

$factory->define(Cursos::class, function (Faker $faker) {
    return [
        'titulo'=>$faker->sentence,
        'categoria_id'=>$faker->numberBetween(1,5),
        //'categoria_id'=>factory(\App\Categoria::class)
        'descripcion'=>$faker->paragraph,
        'numMaxAlumnos'=>$faker->numberBetween(8,12)
    ];
});

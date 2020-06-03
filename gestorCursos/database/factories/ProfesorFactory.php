<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profesor;
use App\User;
use Faker\Generator as Faker;

$factory->define(Profesor::class, function (Faker $faker) {
    $user = factory(App\User::class)->create();
    return [
        'userable_id'=>$user->id,
        'userable_type'=>Profesor::class,
    ];
});

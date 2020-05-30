<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Cursos;
use App\Profesor;
use App\Categoria;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        //Cursos::truncate();
        //Profesor::truncate();


        $numUsuarios=10;
        $numProfesores=3;
        $numCursos=25;
        $numCategorias=5;

        factory(Categoria::class,$numCategorias)->create();
        factory(User::class,$numUsuarios)->create();
        factory(Cursos::class,$numCursos)->create();
        //factory(Profesor::class,$numProfesores)->create();
        // $this->call(UserSeeder::class);
    }
}

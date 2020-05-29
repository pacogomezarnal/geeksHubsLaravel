<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Cursos;

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
        Cursos::truncate();

        $numUsuarios=10;
        $numCursos=25;

        factory(User::class,$numUsuarios)->create();
        factory(Cursos::class,$numCursos)->create();
        // $this->call(UserSeeder::class);
    }
}

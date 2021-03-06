<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Curso;
use App\User;
use App\Profesor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Curso::truncate();
        DB::table('curso_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $numCursos=50;
        $numUsers=50;

        factory(Curso::class,$numCursos)->create();
        factory(User::class,$numUsers)->create();

        for($i=0;$i<$numUsers;$i++){
            DB::table('curso_user')->insert([
                'curso_id' => random_int(1,10),
                'user_id' => random_int(1,50),
            ]);
        }

        // $this->call(UserSeeder::class);
    }
}

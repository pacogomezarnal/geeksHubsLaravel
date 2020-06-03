<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\User;

class UserTest extends TestCase
{

    public function testBasicShowUsers(){
        $response = $this->get(route('users.index'));

        $response->assertStatus(200);
    }

    public function testShowUsers(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $numUsers=2;
        $users=factory(User::class,$numUsers)->create();

        $response = $this->get(route('users.index'));
        $response->assertJsonCount($numUsers,'data');
    }
}

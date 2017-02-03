<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array('firstname'=>'user','role' => 'user','email' => 'user@mail.ru','password'=>bcrypt('a'),'active_user'=> 1)
        ));
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSalonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salon_admins = [];

        $salon_admins[] = [
            "firstname"=>"Salon 1 Admin",
            "salon_id"=>"1",
            "role"=>"salon_admin",
            "email"=>"salon1@mail.ru",
            "password"=>bcrypt('a'),
        ];

        $salon_admins[] = [
            "firstname"=>"Salon 2 Admin",
            "salon_id"=>"2",
            "role"=>"salon_admin",
            "email"=>"salon2@mail.ru",
            "password"=>bcrypt('a'),
        ];

        $salon_admins[] = [
            "firstname"=>"Salon 3 Admin",
            "salon_id"=>"3",
            "role"=>"salon_admin",
            "email"=>"salon3@mail.ru",
            "password"=>bcrypt('a'),
        ];

        $salon_admins[] = [
            "firstname"=>"Salon 4 Admin",
            "salon_id"=>"4",
            "role"=>"salon_admin",
            "email"=>"salon4@mail.ru",
            "password"=>bcrypt('a'),
        ];

        $salon_admins[] = [
            "firstname"=>"Salon 5 Admin",
            "salon_id"=>"5",
            "role"=>"salon_admin",
            "email"=>"salon5@mail.ru",
            "password"=>bcrypt('a'),
        ];

        $salon_admins[] = [
            "firstname"=>"Salon 6 Admin",
            "salon_id"=>"6",
            "role"=>"salon_admin",
            "email"=>"salon6@mail.ru",
            "password"=>bcrypt('a'),
        ];

        $salon_admins[] = [
            "firstname"=>"Salon 7 Admin",
            "salon_id"=>"7",
            "role"=>"salon_admin",
            "email"=>"salon7@mail.ru",
            "password"=>bcrypt('a'),
        ];

        $salon_admins[] = [
            "firstname"=>"Salon 8 Admin",
            "salon_id"=>"8",
            "role"=>"salon_admin",
            "email"=>"salon8@mail.ru",
            "password"=>bcrypt('a'),
        ];

        $salon_admins[] = [
            "firstname"=>"Salon 9 Admin",
            "salon_id"=>"9",
            "role"=>"salon_admin",
            "email"=>"salon9@mail.ru",
            "password"=>bcrypt('a'),
        ];

        $salon_admins[] = [
            "firstname"=>"Salon 10 Admin",
            "salon_id"=>"10",
            "role"=>"salon_admin",
            "email"=>"salon10@mail.ru",
            "password"=>bcrypt('a'),
        ];
		foreach ($salon_admins as $key=>$salon_admin) {
			User::insert([
				$salon_admin
			]);
		}

    }


}

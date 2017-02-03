<?php

use Illuminate\Database\Seeder;
use App\Subscribe;

class SubscribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribe')->insert(array(
            array('salon_id' => '1','email' => 'b1@mail.ru'),
            array('salon_id' => '2','email' => 'b2@mail.ru'),
            array('salon_id' => '3','email' => 'b3@mail.ru'),
            array('salon_id' => '4','email' => 'b4@mail.ru'),
            array('salon_id' => '5','email' => 'b5@mail.ru'),
            array('salon_id' => '6','email' => 'b6@mail.ru'),
            array('salon_id' => '7','email' => 'b7@mail.ru'),
            array('salon_id' => '8','email' => 'b8@mail.ru'),
            array('salon_id' => '9','email' => 'b9@mail.ru'),
            array('salon_id' => '10','email' => 'b10@mail.ru')
        ));
    }
}

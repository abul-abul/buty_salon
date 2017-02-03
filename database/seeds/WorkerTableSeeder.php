<?php

use Illuminate\Database\Seeder;

class WorkerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array('firstname'=>'salon1 worker1','salon_admin_id'=>'2','category_id'=>'1','activ_inactive'=>'inactive','role' => 'salon_worker','email' => 'salon1worker@mail.ru','password'=>bcrypt('a')),
            array('firstname'=>'salon2 worker1','salon_admin_id'=>'3','category_id'=>'2','activ_inactive'=>'inactive','role' => 'salon_worker','email' => 'salon2worker@mail.ru','password'=>bcrypt('a')),
            array('firstname'=>'salon3 worker1','salon_admin_id'=>'4','category_id'=>'3','activ_inactive'=>'inactive','role' => 'salon_worker','email' => 'salon3worker@mail.ru','password'=>bcrypt('a')),
            array('firstname'=>'salon4 worker1','salon_admin_id'=>'5','category_id'=>'4','activ_inactive'=>'inactive','role' => 'salon_worker','email' => 'salon4worker@mail.ru','password'=>bcrypt('a')),
            array('firstname'=>'salon5 worker1','salon_admin_id'=>'6','category_id'=>'5','activ_inactive'=>'inactive','role' => 'salon_worker','email' => 'salon5worker@mail.ru','password'=>bcrypt('a')),
            array('firstname'=>'salon6 worker1','salon_admin_id'=>'7','category_id'=>'6','activ_inactive'=>'inactive','role' => 'salon_worker','email' => 'salon6worker@mail.ru','password'=>bcrypt('a')),
            array('firstname'=>'salon7 worker1','salon_admin_id'=>'8','category_id'=>'7','activ_inactive'=>'inactive','role' => 'salon_worker','email' => 'salon7worker@mail.ru','password'=>bcrypt('a')),
            array('firstname'=>'salon8 worker1','salon_admin_id'=>'9','category_id'=>'8','activ_inactive'=>'inactive','role' => 'salon_worker','email' => 'salon8worker@mail.ru','password'=>bcrypt('a')),
            array('firstname'=>'salon9 worker1','salon_admin_id'=>'10','category_id'=>'9','activ_inactive'=>'inactive','role' => 'salon_worker','email' => 'salon9worker@mail.ru','password'=>bcrypt('a')),
            array('firstname'=>'salon10 worker1','salon_admin_id'=>'11','category_id'=>'10','activ_inactive'=>'inactive','role' => 'salon_worker','email' => 'salon10worker@mail.ru','password'=>bcrypt('a'))
        ));

    }
}

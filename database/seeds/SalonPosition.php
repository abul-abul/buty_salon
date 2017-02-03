<?php

use Illuminate\Database\Seeder;

class SalonPosition extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salon_position')->insert(array(
            array('position'=>'ajapnyak'),
            array('position'=>'arabkir'),
            array('position'=>'avan'),
            array('position'=>'davitashen'),
            array('position'=>'erebuni'),
            array('position'=>'qanaqer zeytun'),
            array('position'=>'kentron'),
            array('position'=>'malatia sebastia'),
            array('position'=>'nor norq'),
            array('position'=>'norq marash'),
            array('position'=>'nubarashen'),
            array('position'=>'shengavit')
        ));  
    }
}

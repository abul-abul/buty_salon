<?php

use Illuminate\Database\Seeder;
use App\SalonCategory;

class SalonCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('saloncategory')->insert(array(
            array('category'=>'Salon 1 category 1','salon-admin-id' => '2'),
            array('category'=>'Salon 2 category 1','salon-admin-id' => '3'),
            array('category'=>'Salon 3 category 1','salon-admin-id' => '4'),
            array('category'=>'Salon 4 category 1','salon-admin-id' => '5'),
            array('category'=>'Salon 5 category 1','salon-admin-id' => '6'),
            array('category'=>'Salon 6 category 1','salon-admin-id' => '7'),
            array('category'=>'Salon 7 category 1','salon-admin-id' => '8'),
            array('category'=>'Salon 8 category 1','salon-admin-id' => '9'),
            array('category'=>'Salon 9 category 1','salon-admin-id' => '10'),
            array('category'=>'Salon 10 category 1','salon-admin-id' => '11')
        ));   
    }
}

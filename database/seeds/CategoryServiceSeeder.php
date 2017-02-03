<?php

use Illuminate\Database\Seeder;
use App\CategoryService;

class CategoryServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoryservice')->insert(array(
            array('salon-id'=>'1','salon-category-id' => '1','salon-service-id' => '1'),
            array('salon-id'=>'2','salon-category-id' => '2','salon-service-id' => '2'),
            array('salon-id'=>'3','salon-category-id' => '3','salon-service-id' => '3'),
            array('salon-id'=>'4','salon-category-id' => '4','salon-service-id' => '4'),
            array('salon-id'=>'5','salon-category-id' => '5','salon-service-id' => '5'),
            array('salon-id'=>'6','salon-category-id' => '6','salon-service-id' => '6'),
            array('salon-id'=>'7','salon-category-id' => '7','salon-service-id' => '7'),
            array('salon-id'=>'8','salon-category-id' => '8','salon-service-id' => '8'),
            array('salon-id'=>'9','salon-category-id' => '9','salon-service-id' => '9'),
            array('salon-id'=>'10','salon-category-id' => '10','salon-service-id' => '10')
        ));
    }
}

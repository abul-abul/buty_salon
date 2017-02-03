<?php

use Illuminate\Database\Seeder;

class SalonIdCategoryIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salonidcategoryid')->insert(array(
            array('salon_id'=>'1','category_id' => '1'),
            array('salon_id'=>'2','category_id' => '2'),
            array('salon_id'=>'3','category_id' => '3'),
            array('salon_id'=>'4','category_id' => '4'),
            array('salon_id'=>'5','category_id' => '5'),
            array('salon_id'=>'6','category_id' => '6'),
            array('salon_id'=>'7','category_id' => '7'),
            array('salon_id'=>'8','category_id' => '8'),
            array('salon_id'=>'9','category_id' => '9'),
            array('salon_id'=>'10','category_id' => '10')
        ));
    }
}

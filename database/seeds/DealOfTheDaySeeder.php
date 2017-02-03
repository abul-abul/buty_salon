<?php

use Illuminate\Database\Seeder;
use App\DealOfTheDay;

class DealOfTheDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deal_of_the_day')->insert(array(
            array('salon_id'=>'1','description' => 'Salon 1 deal of the day  description'),
            array('salon_id'=>'3','description' => 'Salon 3 deal of the day  description'),
            array('salon_id'=>'5','description' => 'Salon 5 deal of the day  description'),
            array('salon_id'=>'7','description' => 'Salon 7 deal of the day  description'),
            array('salon_id'=>'9','description' => 'Salon 9 deal of the day  description'),
            array('salon_id'=>'10','description' => 'Salon 10 deal of the day  description')
        )); 
    }
}

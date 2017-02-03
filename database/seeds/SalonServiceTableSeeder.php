<?php

use Illuminate\Database\Seeder;
use App\SalonServices;

class SalonServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salonservices')->insert(array(
            array('services'=>'Salon 1 category 1 services1','service_prices_min' => '1000','service_prices_max' => '5000','salon_admin_id' => '2'),
            array('services'=>'Salon 2 category 1 services1','service_prices_min' => '1000','service_prices_max' => '5000','salon_admin_id' => '3'),
            array('services'=>'Salon 3 category 1 services1','service_prices_min' => '1000','service_prices_max' => '5000','salon_admin_id' => '4'),
            array('services'=>'Salon 4 category 1 services1','service_prices_min' => '1000','service_prices_max' => '5000','salon_admin_id' => '5'),
            array('services'=>'Salon 5 category 1 services1','service_prices_min' => '1000','service_prices_max' => '5000','salon_admin_id' => '6'),
            array('services'=>'Salon 6 category 1 services1','service_prices_min' => '1000','service_prices_max' => '5000','salon_admin_id' => '7'),
            array('services'=>'Salon 7 category 1 services1','service_prices_min' => '1000','service_prices_max' => '5000','salon_admin_id' => '8'),
            array('services'=>'Salon 8 category 1 services1','service_prices_min' => '1000','service_prices_max' => '5000','salon_admin_id' => '9'),
            array('services'=>'Salon 9 category 1 services1','service_prices_min' => '1000','service_prices_max' => '5000','salon_admin_id' => '10'),
            array('services'=>'Salon 10 category 1 services1','service_prices_min' => '1000','service_prices_max' => '5000','salon_admin_id' => '11'),
        ));
    }
    
}

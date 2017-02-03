<?php

use Illuminate\Database\Seeder;
use App\SalonAddress;

class SalonAdressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salon_addresses')->insert(array(
            array('address'=>'Salon 1 address 1 ','salon_id' => '1',"lat"=>"40.18173718066056","lng"=>"44.506547316918954"),
            array('address'=>'Salon 1 address 2 ','salon_id' => '1',"lat"=>"40.18173718066056","lng"=>"44.506547316918954"),
            array('address'=>'Salon 2 address 1 ','salon_id' => '2',"lat"=>"40.18173718066056","lng"=>"44.506547316918954"),
            array('address'=>'Salon 3 address 1 ','salon_id' => '3',"lat"=>"40.18173718066056","lng"=>"44.506547316918954"),
            array('address'=>'Salon 4 address 1 ','salon_id' => '4',"lat"=>"40.18173718066056","lng"=>"44.506547316918954"),
            array('address'=>'Salon 5 address 1 ','salon_id' => '5',"lat"=>"40.18173718066056","lng"=>"44.506547316918954"),
            array('address'=>'Salon 6 address 1 ','salon_id' => '6',"lat"=>"40.18173718066056","lng"=>"44.506547316918954"),
            array('address'=>'Salon 7 address 1 ','salon_id' => '7',"lat"=>"40.18173718066056","lng"=>"44.506547316918954"),
            array('address'=>'Salon 8 address 1 ','salon_id' => '8',"lat"=>"40.18173718066056","lng"=>"44.506547316918954"),
            array('address'=>'Salon 9 address 1 ','salon_id' => '9',"lat"=>"40.18173718066056","lng"=>"44.506547316918954"),
            array('address'=>'Salon 10 address 1 ','salon_id' => '10',"lat"=>"40.18173718066056","lng"=>"44.506547316918954")
        ));
    }
}

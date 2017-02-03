<?php

use Illuminate\Database\Seeder;
use App\Salon;

class SalonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$salons = array();

		$salons[] = array("name"=>"Salon 1","sub_domain"=>"demo1","salon_email"=>"salon1@mail.ru","description_am"=>"Բարեւ","description_en"=>"Hello","description_ru"=>"Привет","position"=>"ajapnyak","image"=>"salon1.jpg","phonenumber" => "010-10-10-10","workings_time_days" => "9:00-20:00");
	
		$salons[] = array("name"=>"Salon 2","sub_domain"=>"demo2","salon_email"=>"salon2@mail.ru","position"=>"arabkir","image"=>"salon2.jpg","phonenumber" => "010-20-20-20","workings_time_days" => "10:00-21:00");
	
		$salons[] = array("name"=>"Salon 3","sub_domain"=>"demo3","salon_email"=>"salon3@mail.ru","position"=>"avan","image"=>"salon3.jpg","phonenumber" => "010-30-30-30","workings_time_days" => "11:00-20:00");
	
		$salons[] = array("name"=>"Salon 4","sub_domain"=>"demo4","salon_email"=>"salon4@mail.ru","position"=>"davitashen","image"=>"salon4.jpg","phonenumber" => "010-40-40-40","workings_time_days" => "9:00-21:00");
	
		$salons[] = array("name"=>"Salon 5","sub_domain"=>"demo5","salon_email"=>"salon5@mail.ru","position"=>"erebuni","image"=>"salon5.jpg","phonenumber" => "010-50-50-50","workings_time_days" => "8:00-19:00");
	
		$salons[] = array("name"=>"Salon 6","sub_domain"=>"demo6","salon_email"=>"salon6@mail.ru","position"=>"qanaqer zeytun","image"=>"salon6.jpg","phonenumber" => "010-60-60-60","workings_time_days" => "7:00-20:00");
	
		$salons[] = array("name"=>"Salon 7","sub_domain"=>"demo7","salon_email"=>"salon7@mail.ru","position"=>"kentron","image"=>"salon7.jpg","phonenumber" => "010-70-70-70","workings_time_days" => "9:00-22:00");
	
		$salons[] = array("name"=>"Salon 8","sub_domain"=>"demo8","salon_email"=>"salon8@mail.ru","position"=>"malatia sebastia","image"=>"salon8.jpg","phonenumber" => "010-80-80-80","workings_time_days" => "10:00-22:00");
	
		$salons[] = array("name"=>"Salon 9","sub_domain"=>"demo9","salon_email"=>"salon9@mail.ru","position"=>"nor norq","image"=>"salon9.jpg","phonenumber" => "010-90-90-90","workings_time_days" => "11:00-20:00");
	
		$salons[] = array("name"=>"Salon 10","sub_domain"=>"demo10","salon_email"=>"salon10@mail.ru","position"=>"norq marash","image"=>"salon10.jpg","phonenumber" => "010-100-100","workings_time_days" => "10:00-19:00");

		foreach ($salons as $salon) {
			Salon::insert([
				$salon
			]);
		}
   	}
}

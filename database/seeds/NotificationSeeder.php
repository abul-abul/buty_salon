<?php

use Illuminate\Database\Seeder;
use App\Notification;


class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notification')->insert(array(
            array('user_id'=>'12',"worker_id"=>"13",'salon_id' => '1',"service_id"=>"1","date"=>"2016-06-20 16:49:43","message"=>"message","email"=>"a1@mail.ru"),
            array('user_id'=>'12',"worker_id"=>"14",'salon_id' => '2',"service_id"=>"2","date"=>"2016-06-20 16:49:43","message"=>"message","email"=>"a2@mail.ru"),
            array('user_id'=>'12',"worker_id"=>"15",'salon_id' => '3',"service_id"=>"3","date"=>"2016-06-20 16:49:43","message"=>"message","email"=>"a3@mail.ru"),
            array('user_id'=>'12',"worker_id"=>"16",'salon_id' => '4',"service_id"=>"4","date"=>"2016-06-20 16:49:43","message"=>"message","email"=>"a4@mail.ru"),
            array('user_id'=>'12',"worker_id"=>"17",'salon_id' => '5',"service_id"=>"5","date"=>"2016-06-20 16:49:43","message"=>"message","email"=>"a5@mail.ru"),
            array('user_id'=>'12',"worker_id"=>"18",'salon_id' => '6',"service_id"=>"6","date"=>"2016-06-20 16:49:43","message"=>"message","email"=>"a6@mail.ru"),
            array('user_id'=>'12',"worker_id"=>"19",'salon_id' => '7',"service_id"=>"7","date"=>"2016-06-20 16:49:43","message"=>"message","email"=>"a7@mail.ru"),
            array('user_id'=>'12',"worker_id"=>"20",'salon_id' => '8',"service_id"=>"8","date"=>"2016-06-20 16:49:43","message"=>"message","email"=>"a8@mail.ru"),
            array('user_id'=>'12',"worker_id"=>"21",'salon_id' => '9',"service_id"=>"9","date"=>"2016-06-20 16:49:43","message"=>"message","email"=>"a9@mail.ru"),
            array('user_id'=>'12',"worker_id"=>"22",'salon_id' => '10',"service_id"=>"10","date"=>"2016-06-20 16:49:43","message"=>"message","email"=>"a10@mail.ru")
        ));
    }
}

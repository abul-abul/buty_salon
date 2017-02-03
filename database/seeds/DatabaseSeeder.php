<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(MainAdminTableSeeder::class);
        $this->call(AdminSalonTableSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(WorkerTableSeeder::class);
        $this->call(SalonsTableSeeder::class);
        $this->call(SalonCategoryTableSeeder::class);
        $this->call(SalonServiceTableSeeder::class);
        $this->call(CategoryServiceSeeder::class);
        $this->call(DealOfTheDaySeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(SalonIdCategoryIdSeeder::class);
        $this->call(SubscribeSeeder::class);
        $this->call(SalonPosition::class);
        $this->call(SalonAdressSeeder::class);

        Model::reguard();
    }
}

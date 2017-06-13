<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArticlesTableSeeder::class);
        $this->call(HomeContentTableSeeder::class);
        $this->call(AboutContentTableSeeder::class);
        $this->call(TradingContentTableSeeder::class);
        $this->call(SubCompanyContentTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}

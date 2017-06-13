<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
        	array(

       			'name'         => 'admin',
       			'email'        => 'sokhon.pg@gmail.com',
       			'password'     => '$2y$10$8b3OLfEfhvVli3JaaAqsBe2.EXGcJ1vzSB73AXM74slNhVC7mKuoW',
        		)
        	);

        foreach ($users as $key => $row) {
        	DB::table('users')->insert([

        		'name'         => $row['name'],
        		'email'        => $row['email'],
        		'password'     => $row['password'],
        		'created_at'   => 	Carbon::now(), 
	            'updated_at'   => 	Carbon::now(),
        		]);
        }
    }
}

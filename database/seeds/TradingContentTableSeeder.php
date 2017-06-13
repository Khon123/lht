<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TradingContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tradings = array(
        	array(
        		'title'        =>  'Trading',
        		'description'  =>  'ensure that your users fully adopt your software by helping them receive top quality training. During an implementation of software, it is essential that users understand the system before beginning to use it. During our projects, we will begin by training your key users on the system. This will allow them to guide us through the process of configuring your system and importing master data. Once your system has been fully configured and customized, we will train all of your end users. Our training will be performed at your business location with classroom sizes that are appropriate for your business. During our projects, we will begin by training your key users on the system. This will allow them to guide us through the process of configuring your system and importing master data. Once your system has been fully configured and customized, we will train all of your end users. Our training will be performed at your business location with classroom sizes that are appropriate for your business. During our projects, we will begin by training your key users on the system. This will allow them to guide us through the process of configuring your system and importing master data. Once your system has been fully configured and customized, we will train all of your end users. Our training will be performed at your business location with classroom sizes that are appropriate for your business.',
        		'id_table' => '1',
                'lang' => 'en',

        		),

        	array(
        		'title'        =>  'Trading',
        		'description'  =>  'ensure that your users fully adopt your software by helping them receive top quality training. During an implementation of software, it is essential that users understand the system before beginning to use it. During our projects, we will begin by training your key users on the system. This will allow them to guide us through the process of configuring your system and importing master data. Once your system has been fully configured and customized, we will train all of your end users. Our training will be performed at your business location with classroom sizes that are appropriate for your business. During our projects, we will begin by training your key users on the system. This will allow them to guide us through the process of configuring your system and importing master data. Once your system has been fully configured and customized, we will train all of your end users. Our training will be performed at your business location with classroom sizes that are appropriate for your business. During our projects, we will begin by training your key users on the system. This will allow them to guide us through the process of configuring your system and importing master data. Once your system has been fully configured and customized, we will train all of your end users. Our training will be performed at your business location with classroom sizes that are appropriate for your business.',
        		'id_table' => '1',
                'lang' => 'kh',

        		),

        	);

        foreach ($tradings as $key => $row) {
        	DB::table('tradings')->insert([

        		'id_table'     => $row['id_table'], 
        		'title'        => $row['title'],
        		'description'  => $row['description'],
        		'lang'         => $row['lang'],
        		'created_at'   => 	Carbon::now(), 
	            'updated_at'   => 	Carbon::now(),

        		]);
        }
    }
}

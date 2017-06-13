<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $articles = array(
    		array(
	            'name' => 'Home',
                'alias' => 'home', 
                'id_table' => '1',
                'lang' => 'en',
        	),
            array(
                'name' => 'ទំព័រដើម',  
                'alias' => 'home',
                'id_table' => '1',
                'lang' => 'kh',
            ),
        	array(
	          	'name' => 'About Us',
                'alias' => 'about',
                'id_table' => '2',
                'lang' => 'en',
        	),
            array(
                'name' => 'អំពីយើងខ្ញុំ', 
                'alias' => 'about', 
                'id_table' => '2',
                'lang' => 'kh',
            ),
        	array(
	          	'name' => 'Group Company',
                'alias' => 'group-company',
                'id_table' => '3',
                'lang' => 'en',
        	),
            array(
                'name' => 'ក្រុមហ៊ុនជាដៃគូ', 
                'alias' => 'group-company',
                'id_table' => '3',
                'lang' => 'kh',
            ),
        	array(
	            'name' => 'Our Team',
                'alias' => 'team',
                'id_table' => '4',
                'lang' => 'en',
        	),
            array(
                'name' => 'ក្រុមការងាររបស់យើង', 
                'alias' => 'team',
                'id_table' => '4',
                'lang' => 'kh',
            ),
            array(
                'name' => 'Event',
                'alias' => 'event',
                'id_table' => '5',
                'lang' => 'en',
            ),
            array(
                'name' => 'ព្រឹតិការណ៏', 
                'alias' => 'event',
                'id_table' => '5',
                'lang' => 'kh',
            ),
            array(
                'name' => 'Trading',
                'alias' => 'trading',
                'id_table' => '6',
                'lang' => 'en',
            ),
            array(
                'name' => 'ពាណិជ្ជកម្ម',
                'alias' => 'trading',
                'id_table' => '6',
                'lang' => 'kh',
            ),
            array(
                'name' => 'Career',
                'alias' => 'career',
                'id_table' => '7',
                'lang' => 'en',
            ),
            array(
                'name' => 'កាងារ', 
                'alias' => 'career', 
                'id_table' => '7',
                'lang' => 'kh',
            ),
            array(
                'name' => 'Contact Us',
                'alias' => 'contact',
                'id_table' => '8',
                'lang' => 'en',
            ),
            array(
                'name' => 'ទំនាក់ទំនង', 
                'alias' => 'contact',
                'id_table' => '8',
                'lang' => 'kh',
            ),
    	);
         foreach ($articles as $key => $article) {
    		DB::table('articles')->insert([
                'id_table'          =>  $article['id_table'],
    			'name' 				=> 	$article['name'],
                'alias'             =>  $article['alias'],
                'lang'              =>  $article['lang'],
	            'created_at'		=> 	Carbon::now(), 
	            'updated_at'		=> 	Carbon::now(),
    		]);
    	}
	}
}

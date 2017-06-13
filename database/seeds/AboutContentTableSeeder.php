<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aboutContents  =  array(

        	array(
        	
        		'title'     =>  'LHT Capital',
        		'detial'    =>  'LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, seles; distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, marketing, seles;distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated',
        		'id_table'  =>  '1',
        		'lang'      =>  'en',
        		),
        	array(
        	
        		'title'     =>  'LHT Capital',
        		'detial'    =>  'LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, seles; distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, marketing, seles;distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated',
        		'id_table'  =>  '1',
        		'lang'      =>  'kh',
        		),

        	);

        foreach ($aboutContents as $key => $row) {
        	DB::table('abouts')->insert([
        		'id_table'    =>  $row['id_table'],
        		'title'       =>  $row['title'],
        		'detial'      =>  $row['detial'],
        		'lang'        =>  $row['lang'],
        		'created_at'  =>  Carbon::now(),
        		'updated_at'  =>  Carbon::now(),
        		]);
        }
    }
}

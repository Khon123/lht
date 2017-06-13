<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homeContents = array(
        	array (
        		'title'  =>  'LHT Capital',
        		'titleDetial'  =>  'LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, seles; distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, marketing, seles;distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated',
        		'image'  =>  'ddd.jpg',
        		'titleImage' => 'LHT Capital',
        		'imageDetial'  =>  'Welcome to lht beauty.Our Clients and Customers bdndfit from intergrated',
        		'id_table' => '1',
                'lang' => 'en',
        		),
        	array (
        		'title'  =>  'LHT Capital',
        		'titleDetial'  =>  'LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, seles; distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, marketing, seles;distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated',
        		'image'  =>  'ddd.jpg',
        		'titleImage' => 'LHT Capital',
        		'imageDetial'  =>  'Welcome to lht beauty.Our Clients and Customers bdndfit from intergrated',
        		'id_table' => '1',
                'lang' => 'kh',
        		)
        	);

        foreach ($homeContents as $key => $row) {
        	DB::table('homes')->insert([

        		'id_table'     => $row['id_table'],
        		'title'        => $row['title'],
        		'titleDetial'  => $row['titleDetial'],
        		'image'        => $row['image'],
        		'titleImage'   => $row['titleImage'],
        		'imageDetial'  => $row['imageDetial'],
        		'lang'         => $row['lang'],
        		'created_at'   => 	Carbon::now(), 
	            'updated_at'   => 	Carbon::now(),

        		]);
        }
    }
}

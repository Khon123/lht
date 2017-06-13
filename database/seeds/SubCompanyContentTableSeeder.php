<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCompanyContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subCompanies = array(
        	array(
        		'id_table'      =>    '1',
        		'name'          =>    'Carolee',
                'alias'         =>    'carolee',
        		'image'         =>    'spasalon.jpg',
        		'url'           =>    'www.Carolee.com',
        		'detial'        =>    'LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, seles; distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, marketing, seles;distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated',
        		'lang'         =>     'en',
        		),
        	array(
        		'id_table'      =>    '1',
        		'name'          =>    'Carolee',
                'alias'         =>    'carolee',
        		'image'         =>    'spasalon.jpg',
        		'url'           =>    'www.Carolee.com',
        		'detial'        =>    'LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, seles; distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, marketing, seles;distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated',
        		'lang'         =>     'kh',
        		),
        	array(
        		'id_table'      =>    '2',
        		'name'          =>    'Tsubaki',
                'alias'         =>    'tsubaki',
        		'image'         =>    'spasalon.jpg',
        		'url'           =>    'www.Tsubaki.com',
        		'detial'        =>    'LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, seles; distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, marketing, seles;distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated',
        		'lang'         =>     'en',
        		),
        	array(
        		'id_table'      =>    '2',
        		'name'          =>    'Tsubaki',
                'alias'         =>    'tsubaki',
        		'image'         =>    'spasalon.jpg',
        		'url'           =>    'www.Tsubaki.com',
        		'detial'        =>    'LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, seles; distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, marketing, seles;distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated',
        		'lang'         =>     'kh',
        		),
        	array(
        		'id_table'      =>    '3',
        		'name'          =>    'Aqualabal',
                'alias'         =>    'aqualabal',
        		'image'         =>    'spasalon.jpg',
        		'url'           =>    'www.Aqualabal.com',
        		'detial'        =>    'LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, seles; distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, marketing, seles;distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated',
        		'lang'         =>     'en',
        		),
        	array(
        		'id_table'      =>    '3',
        		'name'          =>    'Aqualabal',
                'alias'         =>    'aqualabal',
        		'image'         =>    'spasalon.jpg',
        		'url'           =>    'www.Aqualabal.com',
        		'detial'        =>    'LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, seles; distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated and tailor-made services along the entire value chain, offter any combination of sourcing, marketing, seles;distribution and after-sal support services. LHT is the leading Market Expansion Services in cambodia. Our Ckients and Customers bdndfit from intergrated',
        		'lang'         =>     'kh',
        		),
        	);

		foreach ($subCompanies as $key => $row) {
			DB::table('sub_companies')->insert([
				'id_table'   =>   $row['id_table'],
				'name'       =>   $row['name'],
                'alias'      =>   $row['alias'],
				'image'      =>   $row['image'],
				'url'        =>   $row['url'],
				'detial'     =>   $row['detial'],
				'lang'       =>   $row['lang'],
        		'created_at' =>   Carbon::now(),
        		'updated_at' =>   Carbon::now(),
  				]);
		}
    }
}

<?php

class CompaniesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('companies')->truncate();
		Eloquent::unguard();

		DB::table('companies')->delete();

		Companies::create(array(
			'id'				=> 1, 
			'name'				=> 'АТБ', 
			'description'		=> 'Продуктовый супермаркет',
			'phone'				=> 123456789,
			'email'				=> 'atb@ua.ua',
			'web_site'			=> 'web.site.ua',
			'city_id'			=> 3,
			'user_id'			=> 1,
			'cover_image'		=> '',
			'logo'				=> '',
			));

		Companies::create(array(
			'id'				=> 2, 
			'name'				=> 'Фокстрот', 
			'description'		=> 'Супермаркет електронной техники',
			'phone'				=> 0516155555,
			'email'				=> 'fokstroy@ua',
			'web_site'			=> 'fokstrot.ua',
			'city_id'			=> 2,
			'user_id'			=> 1,
			'cover_image'		=> '',
			'logo'				=> '',
			));

		Companies::create(array(
			'id'				=> 3, 
			'name'				=> 'Web-studio', 
			'description'		=> 'Web-studio, создание и продвижение сайтов',
			'phone'				=> 0656565655,
			'email'				=> 'web@web.ua',
			'web_site'			=> 'web.ua',
			'city_id'			=> 1,
			'user_id'			=> 1,
			'cover_image'		=> '',
			'logo'				=> '',
			));

		$this->command->info('Companies table seeded!');
	}
}

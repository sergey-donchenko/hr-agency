<?php

class CountriesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('country')->delete();

		Countries::create(array(
			'id'				=> 1, 
			'name'				=> 'Ukraine', 
			'description'		=> 'Ukraina is a country in Eastern Europe',
			'user_id'			=> 1,
			));

		Countries::create(array(
			'id'				=> 2, 
			'name'				=> 'USA', 
			'description'		=> 'The United States of America, is a federal republic composed of 50 states',
			'user_id'			=> 1,
			));

		Countries::create(array(
			'id'				=> 3, 
			'name'				=> 'China', 
			'description'		=> 'China, is a sovereign state in East Asia. It is the worlds most populous country, with a population of over 1.35 billion.',
			'user_id'			=> 1,
			));

		$this->command->info('Countries table seeded!');
	}
}
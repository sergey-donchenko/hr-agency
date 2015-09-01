<?php

class CitiesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('cities')->delete();

		Cities::create(array(
			'id'				=> 1, 
			'name'				=> 'Boryspil', 
			'description'		=> 'Kiev region.',
			'region_id'			=> 1,
			));

		Cities::create(array(
			'id'				=> 2, 
			'name'				=> 'Merefa', 
			'description'		=> 'Kharkov region.',
			'region_id'			=> 2,
			));

		Cities::create(array(
			'id'				=> 3, 
			'name'				=> 'Izmail', 
			'description'		=> 'Odessa region.',
			'region_id'			=> 3,
			));

		$this->command->info('Cities table seeded!');
	}
}
<?php

class RegionsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('regions')->delete();

		Regions::create(array(
			'id'				=> 1, 
			'name'				=> 'Kiev', 
			'description'		=> 'Kiev is the capital and largest city of Ukraine, located in the north central part of the country on the Dnieper River.',
			'country_id'		=> 1,
			));

		Regions::create(array(
			'id'				=> 2, 
			'name'				=> 'Kharkov', 
			'description'		=> 'Kharkov, is the second-largest city of Ukraine. Located in the north-east of the country, it is the largest city of the Slobozhanshchyna historical region.',
			'country_id'		=> 1,
			));

		Regions::create(array(
			'id'				=> 3, 
			'name'				=> 'Odessa', 
			'description'		=> 'Odessa is the fourth largest city in Ukraine. The city is a major seaport and transportation hub located on the northwestern shore of the Black Sea.',
			'country_id'		=> 1,
			));

		$this->command->info('Regions table seeded!');
	}
}
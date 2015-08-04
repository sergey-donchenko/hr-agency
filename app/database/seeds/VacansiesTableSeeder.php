<?php

class VacansiesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('vacancies')->delete();

        Vacancy::create(array(
        		  'title' => 'Game Developer (C++)', 
        	'description' => 'Being a part of game developer’s team, you will participate in full cycle of game development process for iOS.',
        		   'city' => 'Pervomaisk',
        	'category_id' => 3,
        	     'dt_add' => '2015-08-03'
        ));
               

		$this->command->info('Vacancy table seeded!');
	}
}
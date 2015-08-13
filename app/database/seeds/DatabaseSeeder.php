<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('CategoryTableSeeder');
		$this->call('VacanciesTableSeeder');
		$this->call('StaticTableSeeder');
	}

}

<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('users')->delete();

        User::create(array(
        	    'name' => 'Max', 
        	   'email' => 'makss_18@mail.ru',
        	'password' => Hash::make('max12345678'),
        	'is_admin' => '1',
        	   'phone' => '0932634329',
        	    'city' => 'Pervomaisk',

        ));

        User::create(array(
        	    'name' => 'Vasiliy', 
        	   'email' => 'vasuy@mail.ru',
        	'password' => Hash::make('12345678'),
        	   'phone' => '0995648955',
        	    'city' => 'Vradievka',

        ));
               

		$this->command->info('User table seeded!');
	}
}
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
                        'id'       => 1,
                        'name'     => 'Admin',
                        'email'    => 'admin@work.local',
                        'password' => Hash::make('admin123'),
                        'is_admin' => '1',
                        'phone'    => 'admin123',
                        'city'     => 'admin123',

                ));

                User::create(array(
                        'id'       => 2,
                	'name'     => 'Vasiliy', 
                	'email'    => 'vasuy@mail.ru',
                	'password' => Hash::make('12345678'),
                	'phone'    => '12345678',
                	'city'     => 'Vradievka',

                ));
               

		$this->command->info('User table seeded!');
	}
}
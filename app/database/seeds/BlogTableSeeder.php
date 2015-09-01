<?php

class BlogTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('blogs')->delete();

		Blog::create(array(
			'id'				=> 1, 
			'title'				=> 'How to earn the first million', 
			'description'		=> 'Get up in the morning and go to work!',
			'user_id'			=> 1,
			'tags'				=> '#first million'
			));

		Blog::create(array(
			'id'				=> 2, 
			'title'				=> 'Work on the Internet', 
			'description'		=> 'Choice is good, but you need to know a lot!',
			'user_id'			=> 2,
			'tags'				=> '#Work, Internet'
			));

		Blog::create(array(
			'id'				=> 3, 
			'title'				=> 'What do you do with a daily income of 500$', 
			'description'		=> 'It remains to multiply profits and develop the company',
			'user_id'			=> 2,
			'tags'				=> '#company'
			));

		$this->command->info('Blog table seeded!');
	}
}
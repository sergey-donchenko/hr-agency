<?php

class StaticTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('static_page')->delete();

		StaticPage::create(array(
			'id'				=> 1, 
			'title'				=> 'О Нас', 
			'url'				=> 'about-us',
			'meta_keywords'		=> 'Used in the head of an individual article page template, the meta keywords tag is a single tag.',
			'meta_description'  => 'outputs nothing (yet) on posts, outputs the blog description on all other pages.',
			'description'		=> 'I was really excited about my upcoming job interview because I read in the job description.',
			'user_id'			=> 1
			));

		StaticPage::create(array(
			'id'				=> 2, 
			'title'				=> 'Наши услуги', 
			'url'				=> 'our-services',
			'meta_keywords'		=> 'Used in the head of an individual',
			'meta_description'  => 'outputs nothing (yet)',
			'description'		=> 'my upcoming job',
			'user_id'			=> 2
			));

		StaticPage::create(array(
			'id'				=> 3, 
			'title'				=> 'Как нас найти', 
			'url'				=> 'how-can-you-find-us',
			'meta_keywords'		=> 'Varizon',
			'meta_description'  => 'Verizon Communications Inc',
			'description'		=> 'Verizon Communications Inc., branded as Verizon, is an American broadband and telecommunications company, the largest U.S. ',
			'user_id'			=> 2
			));

		StaticPage::create(array(
			'id'				=> 4, 
			'title'				=> 'Залог успеха', 
			'url'				=> 'resept-of-successful-life',
			'meta_keywords'		=> 'DROID Turbo',
			'meta_description'  => 'Smartphones',
			'description'		=> 'The award-winning DROID Turbo is now available in textured and durable Gray Ballistic Nylon — Only on Verizon.',
			'user_id'			=> 1

			));

		$this->command->info('Static page table seeded!');
	}
}
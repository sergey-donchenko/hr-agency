<?php

class CategoryTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('categories')->delete();

                Category::create(array(
                	'id'		=> 1, 
                	'name'		=> 'Бухгалтерия', 
                	'description'   => 'Описание категории Бухгалтерия',
                        'user_id'       => 2
                ));
                
                Category::create(array(
                	'id' 		=> 2,
                	'name' 		=> 'Водители',
                	'description'   => 'Описание категории Водители',
                        'user_id'       => 1
                ));

                Category::create(array(
                	'id'		=> 3, 
                	'name' 		=> 'IT', 
                	'description'   => 'Описание категории IT',
                        'user_id'       => 1
                ));
                Category::create(array(
                	'id'  		=> 4, 
                	'name' 		=> 'Летчики', 
                	'description'   => 'Описание категории Летчики',
                        'user_id'       => 2
                ));        

	$this->command->info('Category table seeded!');
        }
}
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacansiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vacancies', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('title', 255);
			$table->text('description');
			$table->string('city', 255);
			$table->integer('category_id')->unsigned();
			
			$table->date('dt_add');
			
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('category_id', 'vacancy_category_foreign_key')
				  ->references('id')->on('categories')
				  ->onDelete('cascade');
			
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
			Schema::drop('vacancies');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnToVacancies extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vacancies', function(Blueprint $table)
		{
			$table->integer('city_id')->unsigned()->after('description');

			$table->foreign('city_id', 'vacancy_city_foreign_key')
			      ->references('id')->on('cities')
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
		Schema::table('vacancies', function(Blueprint $table)
		{
			//
		});
	}

}

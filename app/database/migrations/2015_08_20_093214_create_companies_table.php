<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('name', 255);
			$table->string('description', 255);
			$table->string('phone');
			$table->string('email');
			$table->string('web_site');
			$table->integer('city_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('cover_image');
			$table->string('logo');
			
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('city_id', 'companies_cities_foreign_key')
			      ->references('id')->on('cities')
			      ->onDelete('cascade');
			$table->foreign('user_id', 'companies_users_foreign_key')
			      ->references('id')->on('users')
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
		Schema::drop('companies');
	}

}

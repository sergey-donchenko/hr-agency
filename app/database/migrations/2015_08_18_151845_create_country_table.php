<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('country', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('name', 255);
			$table->string('description', 255);
			$table->integer('user_id')->unsigned();

			$table->timestamps();
			$table->softDeletes();

			$table->foreign('user_id', 'country_user_foreign_key')
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
		Schema::drop('country');
	}

}

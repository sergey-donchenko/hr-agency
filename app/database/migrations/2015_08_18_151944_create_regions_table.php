<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('regions', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('name', 255);
			$table->string('description', 255);
			$table->integer('country_id')->unsigned();

			$table->timestamps();
			$table->softDeletes();

			$table->foreign('country_id', 'regions_country_foreign_key')
			      ->references('id')->on('country')
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
		Schema::drop('regions');
	}

}

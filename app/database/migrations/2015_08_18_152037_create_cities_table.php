<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cities', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('name', 255);
			$table->string('description', 255);
			$table->string('cover_image', 255);
			$table->integer('region_id')->unsigned();

			$table->timestamps();
			$table->softDeletes();

			$table->foreign('region_id', 'cities_regions_foreign_key')
			      ->references('id')->on('regions')
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
		Schema::drop('cities');
	}

}

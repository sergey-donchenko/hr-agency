<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('static_page', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('title',150);
			$table->string('url',150);
			$table->string('meta_keywords',255);
			$table->string('meta_description',255);
			$table->longText('description',255);
			$table->integer('user_id')->unsigned();
			
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('user_id', 'static_page_user_foreign_key')
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
		Schema::drop('static_page');
	}

}

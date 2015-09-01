<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlobTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blogs', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('title',255);
			$table->longText('description',255);
			$table->string('tags',255);
			$table->integer('user_id')->unsigned();
			
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('user_id', 'blog_user_foreign_key')
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
		Schema::drop('blogs');
	}

}

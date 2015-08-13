<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('name',255);
			$table->string('email',255)->unique();
			$table->string('password',255);
			$table->char('is_admin',1)->default(0);
			$table->string('phone',255)->nullable();
			$table->string('city',255)->nullable();
			$table->string('remember_token',255)->nullable();

			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}

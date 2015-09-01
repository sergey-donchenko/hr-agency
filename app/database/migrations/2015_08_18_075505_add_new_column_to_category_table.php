<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnToCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categories', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->after('parent_id');

			$table->foreign('user_id', 'category_user_foreign_key')
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
		Schema::table('categories', function(Blueprint $table)
		{			
			$table->dropForeign('category_user_foreign_key');

			$table->dropColumn('user_id');
		});
	}

}

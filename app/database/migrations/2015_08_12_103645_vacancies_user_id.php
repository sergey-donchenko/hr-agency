<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VacanciesUserId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vacancies', function(Blueprint $table) {
	        $table->integer('user_id')->unsigned()->after('category_id');
	        
	        $table->foreign('user_id', 'vacancy_user_foreign_key')
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
		Schema::table('vacancies', function(Blueprint $table) {
			$table->dropForeign('vacancy_user_foreign_key');

			$table->dropColumn('user_id');
		});
	}

}

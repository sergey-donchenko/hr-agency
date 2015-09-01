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
			$table->integer('company_id')->unsigned()->after('category_id');

			$table->foreign('company_id', 'vacancy_company_foreign_key')
			      ->references('id')->on('companies')
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
			$table->dropForeign('vacancy_company_foreign_key');

			$table->dropColumn('company_id');
		});
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriorityToBugsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bugs', function(Blueprint $table)
		{
			$table->integer('priority')->after('created_by')->default(3);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bugs', function(Blueprint $table)
		{
			$table->dropColumn('priority');
		});
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bugs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->integer('created_by');
			$table->text('repro_steps');
			$table->text('expected_behaviour');
			$table->text('observed_behaviour');
			$table->integer('assigned_to');
			$table->integer('status')->nullable();
			$table->integer('project');
			$table->string('software_version')->nullable();
			$table->boolean('closed')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bugs');
	}

}

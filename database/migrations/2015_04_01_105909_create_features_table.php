<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('features', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->integer('created_by');
			$table->integer('assigned_to')->nullable();
			$table->integer('project');
			$table->integer('priority')->nullable();
			$table->integer('status')->nullable();
			$table->integer('progress')->default(0);
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
		Schema::drop('features');
	}

}

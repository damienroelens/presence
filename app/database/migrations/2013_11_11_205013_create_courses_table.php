<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table) {
			$table->increments('id');
			
			$table->integer('level_id')->unsigned();
			$table->integer('year_id')->unsigned();

			$table->string('name');
			$table->text('description');
			
			$table->foreign('level_id')->references('id')->on('levels');
			$table->foreign('year_id')->references('id')->on('years');
			
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
		Schema::drop('cours');
	}

}

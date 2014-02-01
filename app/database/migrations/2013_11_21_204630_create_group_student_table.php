<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupStudentTable extends Migration {

	/**
	 * Creates the pivot table between groups and students
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_student', function(Blueprint $table) {
			$table->integer('group_id')->unsigned();
			$table->integer('student_id')->unsigned();
			$table->foreign('group_id')->references('id')->on('groups');
			$table->foreign('student_id')->references('id')->on('students');
			
			$table->timestamps();
		});
	}


	/**
	 * Drops the level_teacher pivot table
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('group_student');
	}

}

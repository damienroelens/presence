<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseTeacherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_teacher', function(Blueprint $table) {
			$table->integer('course_id')->unsigned();
			$table->integer('teacher_id')->unsigned();
			$table->foreign('course_id')->references('id')->on('courses');
			$table->foreign('teacher_id')->references('id')->on('teachers');
			
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
		Schema::drop('course_teacher');
	}

}

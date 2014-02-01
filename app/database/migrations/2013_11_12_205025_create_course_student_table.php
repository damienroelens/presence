<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseStudentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_student', function(Blueprint $table) {
			$table->integer('course_id')->unsigned();
			$table->integer('student_id')->unsigned();
			$table->foreign('course_id')->references('id')->on('courses');
			$table->foreign('student_id')->references('id')->on('students');
			
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
		Schema::drop('course_student');
	}

}

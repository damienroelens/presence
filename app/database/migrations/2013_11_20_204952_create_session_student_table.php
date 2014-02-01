<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSessionStudentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('session_student', function(Blueprint $table) {
			$table->integer('attendance_id')->unsigned()->nullable();
			$table->integer('session_id')->unsigned();
			$table->integer('student_id')->unsigned();
			
			$table->foreign('session_id')->references('id')->on('sessions');
			$table->foreign('student_id')->references('id')->on('students');
			$table->foreign('attendance_id')->references('id')->on('attendances');
			
			$table->string('comment')->nullable();

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
		Schema::drop('session_student');
	}

}

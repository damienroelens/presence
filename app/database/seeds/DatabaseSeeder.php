<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('LevelsTableSeeder');
		$this->call('StudentsTableSeeder');
		$this->call('AttendancesTableSeeder');
		$this->call('YearsTableSeeder');
		$this->call('TeachersTableSeeder');
		$this->call('CoursesTableSeeder');
		
		$this->call('CourseTeacherTableSeeder');
		$this->call('CourseStudentTableSeeder');
		$this->call('SessionStudentTableSeeder');
		//Ajout des slugs, oubliés dans la première version
		$this->call('SlugSeeder');
	}

}
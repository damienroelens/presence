<?php

use Illuminate\Database\Migrations\Migration;

class AddSlugs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Ajout de champs slug pour les tables dans lesquelles les identifiants 
		//textuels pourraient être unsafe dans une url
		Schema::table('students', function($table)
		{
		    $table->string('slug');
		});
		Schema::table('teachers', function($table)
		{
		    $table->string('slug');
		});
		Schema::table('courses', function($table)
		{
		    $table->string('slug');
		});
		Schema::table('attendances', function($table)
		{
		    $table->string('slug');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		//
		Schema::table('students', function($table)
		{
		    $table->dropColumn('slug');
		});
		Schema::table('teachers', function($table)
		{
		    $table->dropColumn('slug');
		});
		Schema::table('courses', function($table)
		{
		    $table->dropColumn('slug');
		});
		Schema::table('attendances', function($table)
		{
		    $table->dropColumn('slug');
		});
	}

}
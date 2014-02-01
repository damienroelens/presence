<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*Event::listen('illuminate.query',function($sql)
{
	var_dump($sql);
	echo ('<br><br><br>');
});*/

//return Teacher::students(1); //retourner les étudiants d'un prof

//return Teacher::find(1)->courses; //retourner les cours d'un profs

//return Year::find(5)->courses; //retourner les cours d'une année

//return Course::all(); //retourner tous les cours

//return Teacher::groups(1); //retourner les groupes du prof

//return Course::students(1); //retourner les élèves inscrits à un cours

//return Course::noLogStudent(1); //retourner les élèves non-inscrits à un cours

Route::get('/',function()
{
	return View::make('teacher.login');
});

Route::post('/',array('as'=>'identification','uses'=>'IdentificationController@login'));



Route::group(array('before'=>'auth'),function()
{
	Route::get('deco',array('as'=>'deconnecter','uses'=>'DeconnecterController@deco'));
	Route::get('mesCours',array('as'=>'listerCours','uses'=>'CoursController@lister'));
	Route::get('mesCours/{cours}',array('as'=>'infoCours','uses'=>'CoursController@info'));
	Route::get('mesEleves',array('as'=>'listerEleves','uses'=>'ElevesController@lister'));
	Route::get('mesEleves/{eleve}',array('as'=>'infoEleve','uses'=>'ElevesController@info'));
	Route::get('mesCours/{cours}/{iden}',array('as'=>'infoSession','uses'=>'CoursController@sceance'));
	Route::get('mesGroupes',array('as'=>'listerGroupes','uses'=>'GroupController@lister'));

});






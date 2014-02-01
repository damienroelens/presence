<?php

class ElevesController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function lister()
	{
		$prof = unserialize(Session::get('currentProf'));
		$idprof = $prof->id;	
		$elevesProf = Teacher::find($idprof)->students;
		return View::make('mesEleves')->with(compact('elevesProf'));
	}

	public function info($eleve)
	{
		return View::make('eleveSeul')->with('eleve',$eleve);
	}

}
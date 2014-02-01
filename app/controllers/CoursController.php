<?php

class CoursController extends BaseController {

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
		$coursProf = Teacher::find($idprof)->courses;
		return View::make('mesCours')->with(compact('coursProf'));
	}

	public function info($cours)
	{
		
		return View::make('coursSeul')->with('cours',$cours);
	}

	public function sceance($cours,$iden)
	{
		return View::make('sceanceSeul')->with(compact('cours','iden'));
	}
}
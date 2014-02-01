<?php

class IdentificationController extends BaseController {

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

	public function login()
	{
		if(Auth::attempt(array('email'=>Input::get('email'),'password'=>Input::get('password'))))
		{
			$prof = Teacher::whereEmail(Input::get('email'))->first();
			Session::put('currentProf',serialize($prof));
			return Redirect::to('/')->with(compact('prof'));
		} else {
			return Redirect::to('/'); //TODO accrocher variable erreur pour si on se deco

		}
	}

}
@extends('layout')

@section('container')
@if (Auth::check())
		<div>Vous etes connectés</div>
		{{link_to_route('deconnecter','Se déconnecter')}}

		{{link_to_route('listerCours','Voir mes cours')}}

		{{link_to_route('listerEleves','Voir mes élèves')}}

		{{link_to_route('listerGroupes','Voir mes groupes')}}
	
@else
	{{ Form::open(array('url'=>'/')) }}
		{{ Form::label('email','Votre email') }}
		{{ Form::text('email','d@d.com') }}
		{{ Form::label('password','Votre mot de passe') }}
		{{ Form::password('password') }}
		{{ Form::submit('Me connecter') }}
	{{ Form::close() }}
@endif
@stop
@extends('layout')

@section('container')
	<h1>{{$user->first_name}}</h1>
	<div>{{ link_to_route('userList','Retourner à la liste des zigomards') }}</div>
@stop
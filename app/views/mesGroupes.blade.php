@extends('layout')

@section('container')	
	@foreach($groupProf as $groupe)
		<p>{{$groupe->group_name.' - '.$groupe->name}}</p>
	@endforeach
@stop
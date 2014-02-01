@extends('layout')

@section('container')

<?php 
	$currentSession = CourseSession::whereId($iden)->first();
	$studentSession = CourseSession::find($currentSession->id)->students;
	$pres = Attendance::all();
	setlocale(LC_TIME, "frb"); 
?>

	<h1>{{  strftime("Le %d %B %Y à %Hh%M", strtotime($currentSession->date_start)) }}</h1>
	
	<h2>{{$studentSession->first()->group_name}}</h2>
	@foreach($studentSession as $tru)
		@foreach($pres as $re)
			@if($re->id == $tru->pivot->attendance_id)
			<p>{{$tru->name.' '.$tru->first_name.' '.$re->status}}</p>
			@endif
		@endforeach
	@endforeach
@stop
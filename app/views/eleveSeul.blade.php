@extends('layout')

@section('container')

	<?php $currentEleve = Student::whereSlug($eleve)->first(); ?>
	<?php $coursEleve = Student::find($currentEleve->id)->courses; ?>
	<?php $sessionsEleve = Student::find($currentEleve->id)->sessions; ?>

	<?php $pres = Attendance::all() ?>

	<h1>{{$currentEleve->name.' '.$currentEleve->first_name}}</h1>
	
	@foreach($coursEleve as $course)
		<h2>{{$course->name}}</h2>
		@foreach($sessionsEleve as $session)
		
		<p>
		{{$session->date_start.'->'.$session->date_end}}
		{{$pres->find($session->pivot->attendance_id)->status}}
		</p>
		@endforeach
	@endforeach
@stop
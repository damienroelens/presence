@extends('layout')

@section('container')

	<?php $currentCourse = Course::whereSlug($cours)->first(); ?>
	<?php $sessionsCourse = Course::find($currentCourse->id)->sessions ;
	setlocale(LC_TIME, "frb"); 
	?>

	<h1>{{$currentCourse->name}}</h1>
	
	@foreach($sessionsCourse as $stu)
	{{$stu}}
		<p>
			{{link_to_route('infoSession',strftime("%d %B %Y à %Hh%M", strtotime($stu->date_start)),array($cours,$stu->id))}}
		</p>
	@endforeach
	

@stop 
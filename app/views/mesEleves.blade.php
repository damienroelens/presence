@extends('layout')

@section('container')
	<?php $currentGroup = '' ?>

	@foreach($elevesProf as $eleve)
		@if($currentGroup != $eleve->group_name)
		<?php $currentGroup = $eleve->group_name ?>
		<h2>{{$currentGroup}}</h2>
		@endif
		<h3>
			{{link_to_route('infoEleve',$eleve->student_name.' '.$eleve->student_first_name,$eleve->student_slug)}}
		</h3>
	@endforeach

@stop
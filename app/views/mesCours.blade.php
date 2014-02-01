@extends('layout')

@section('container')

	<?php $sessions = CourseSession::all() ?>
	<?php $date = date_create();
		  date_timestamp_set($date, date(time()));
		  ?>

	@foreach($coursProf as $cours)
	{{$cours->id}}
		@foreach($sessions as $sess)
			@if($sess->course_id == $cours->id)
				<?php 
					$dateNext = date_create();
					date_timestamp_set($dateNext,strtotime(($sess->date_start)));
					$dateDiff = date_diff($date,$dateNext);
				?>

				  @if($dateDiff->format('%R%a')>0)
				  	<?php $arri[] = $dateDiff->format('%R%a');
				  		  $sceance = ' Prochaine scéance : ';
				  		  $truc = min($arri);
				  	 ?>
				  @else
					<?php $arri[] = $dateDiff->format('%R%a');
				  		  $sceance = ' Cours terminé. Dernière scéance : ';
				  		  $truc = max($arri);
				  	 ?>
				  @endif 
				  @if($truc == $dateDiff->format('%R%a'))
				  	<?php $idse = $sess->date_start ?>
				  @endif
			@endif
		<?php empty($arri) ?>
		@endforeach

		{{link_to_route('infoCours',$cours->name,$cours->slug ).$sceance.$idse}}
		
	@endforeach

@stop
@extends('layouts.default')

@section('content')
<hr class="separator invisible">
<hr class="separator invisible">
<h3 class="separator">Horarios de Aula</h3>
<div class="innerLR">
	<div class="row">
		<div class="col-lg-12">
	<?php  
	$grades = Grades::all(); ?>
	@foreach($grades as $grade)
	<div class="widget widget-stats-1 widget-stats-white col-md-4">
		<hr class="separator invisible">
<a href="/schedules/showschedule?idgrade={{$grade->id}}">
	<table>
		<tr>
			<td><span class="glyphicons home"><i></i><span class="txt">{{$grade->name_grade}} - {{$grade->name_section}}</span></span></td>
		</tr>
	
	</table>
	<hr class="separator invisible">
</a>
</div>
@endforeach
</div>
</div>
</div>
@stop

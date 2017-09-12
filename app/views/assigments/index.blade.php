@extends('layouts.default')
@section('content')

<hr class="separator invisible">
<hr class="separator invisible">
<div class="innerLR">
		<form enctype="application/x-www-form-urlencoded" method="post">
		<div class="widget widget-heading-simple widget-body-white">
		<h2 class="pull-left"></h2>
		<div class="widget-body">
		<h3 class="pull-left">Docentes</h3>		
		<hr class="separator invisible">
		<hr class="separator invisible">
		<table class="dynamicTable colVis table">
			<thead>
				<tr>
					<th data-class="expand" class="center">Nombre</th>
					<th data-hide="phone,tablet" class="center">Apellido</th>
					<th data-hide="phone,tablet" class="center">Imparte</th>
					<th class="center">Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php $teachers = User::where('status', '=', 'A')->where('user_level', '=', '2')->get(); ?>
			
			@foreach($teachers as $teacher)
				<tr>
					<td align="center">{{ $teacher->name}}</td>
					<td align="center">{{ $teacher->lastname}} </td>
					<?php if ($teacher->id_grade == NULL){
							$subjet = Subjets::find($teacher->sub_id);
					?><td align="center">{{$subjet->name_sub}}</td>
					<?php }else{ 
							$grade = Grades::find($teacher->id_grade);
					?><td align="center">{{$grade->name_grade}} - {{$grade->name_section}}</td><?php } ?>
					
					<td align="center">
						<a class="btn btn-default btn-icon" href="/assigments/classevaluation?id={{$teacher->id}}"><i class="icon-search"></i>Añadir Plan de Evaluación</a>
					</td>
				</tr>
					@endforeach			
			</tbody>
		</table>		
	</div>
</div>

			<a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
</form>
</div>
@stop

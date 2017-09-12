@extends('layouts.default')

@section('content')
<hr class="separator invisible">
<hr class="separator invisible">

<div class="innerLR">
		<form enctype="application/x-www-form-urlencoded" method="post">
		<div class="widget widget-heading-simple widget-body-white">
		<h2 class="pull-left"></h2>
		<div class="widget-body">
		<h3 class="pull-left">Grados</h3><a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>		
		<hr class="separator invisible">
		<hr class="separator invisible">
		<table class="dynamicTable colVis table">
			<thead>
				<tr>
					<th class="center">Nombre</th>
					<th class="center">Secci&oacute;n</th>
					<th class="center">Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php $grades = Grades::all(); ?>
			@foreach($grades as $grade)
				<tr>
					
					<td align="center">{{ $grade->name_grade }}   </td>
					<td align="center">{{ $grade->name_section }} </td>
					<td align="center"><a class="btn btn-default btn-icon" href="/attendances/viewstudent?id={{$grade->id}}"><i class="icon-search"></i> Lista de Alumnos</a></td>
				</tr>
					@endforeach			
			</tbody>
		</table>		
	</div></div>
</form>
</div>
@stop

@extends('layouts.default')

@section('content')
<hr class="separator invisible">
<hr class="separator invisible">
<?php
 if (isset($_GET['id']) && isset($_GET['idgrado'])) {
 	$id = $_GET['id'];
 	$idgrado = $_GET['idgrado'];

 	$student = User::find($id);
 	$grado = Grades::find($idgrado);
 }
?>
<div class="innerLR">
		<form enctype="application/x-www-form-urlencoded" method="post">
		<div class="widget widget-heading-simple widget-body-white">
		<h2 class="pull-left"></h2>
		<div class="widget-body">
		<h3 class="pull-left">Materias de {{$student->name}} {{$student->lastaname}} {{$grado->name_grade}}-{{$grado->name_section}} </h3><a class ="pull-right" href="/califications/viewstudentbygrade?id={{$grado->id}}"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>		
		<hr class="separator invisible">
		<hr class="separator invisible">
		<table class="dynamicTable colVis table">
			<thead>
				<tr>
					<th class="center">Nombre</th>
					<th class="center">Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php $subjet = Subjets::all(); ?>
			@foreach($subjet as $s)
				<tr>
					
					<td align="center">{{ $s->name_sub }}</td>
					<td align="center"><a class="btn btn-default btn-icon" href="/califications/updatecalification?idsub={{$s->id}}&idgrado={{$grado->id}}&id={{$student->id}}"><i class="glyphicon glyphicon-pencil"></i>    Editar Notas</a>
					 <a class="btn btn-default btn-icon" href="/califications/viewnotes?idsub={{$s->id}}&idgrado={{$grado->id}}&id={{$student->id}}"><i class="icon-search"></i>    Ver Notas</a>
				</td>
				</tr>
					@endforeach			
			</tbody>
		</table>		
	</div>
	</div>
</form>
</div>
@stop

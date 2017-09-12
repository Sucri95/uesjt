@extends('layouts.default')

@section('content')
<?php
 if (isset($_GET['id'])) {
 	$id = $_GET['id'];
 	$grade = Grades::find($id);
 }

?>
<hr class="separator invisible">
<hr class="separator invisible">
<div class="innerLR">
		<form enctype="application/x-www-form-urlencoded" method="post">
		<div class="widget widget-heading-simple widget-body-white">
		<h2 class="pull-left"></h2>
		<div class="widget-body">
		<h3 class="pull-left"> Estudiantes del {{$grade->name_grade}}</h3><a class ="pull-right" href="/califications/index"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>		
		<hr class="separator invisible">
		<hr class="separator invisible">
		<table class="dynamicTable colVis table">
			<thead>
				<tr>
					<th class="center">Nº c&eacute;dula</th>
					<th class="center">Nombres</th>
					<th class="center">Apellidos</th>
					<th class="center">Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php $students = User::where('status', '=', 'A')->where('user_level', '=', '4')->where('id_grade', '=', $grade->id)->get(); ?>
			@foreach($students as $student)
				<tr>
					<td align ="center">{{ $student->ci }}  </td>
					<td align ="center">{{ $student->name }}  </td>
					<td align ="center">{{ $student->lastname }}</td>
					<td align ="center">
						<a class="btn btn-default btn-icon" href="/califications/indexsubjet?id={{$student->id}}&idgrado={{$grade->id}}"><i class="icon-search"></i>    Ver Materias</a>
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

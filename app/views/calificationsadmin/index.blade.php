@extends('layouts.default')

@section('content')
<hr class="separator invisible">
<hr class="separator invisible">

<div class="innerLR">
		<form enctype="application/x-www-form-urlencoded" method="post">
		<div class="widget widget-heading-simple widget-body-white">
		<h2 class="pull-left"></h2>
		<div class="widget-body">
		<h3 class="pull-left">Profesores</h3><a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>	
		<hr class="separator invisible">
		<hr class="separator invisible">
		<table class="dynamicTable colVis table">
			<thead>
				<tr>
					<th class="center">N° C&eacute;dula</th>
					<th class="center">Nombre</th>
					<th class="center">Apellido</th>
					<th class="center">Imparte</th>
					<th class="center">Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php $teacher = User::where('status','=','A')->where('user_level','=','2')->get(); ?>
			
			@foreach($teacher as $t)
			<?php if ($t->id_grade != null) {
			$grade = Grades::find($t->id_grade);?>
				<tr>
					<td align="center">{{ $t->ci }}               </td>
					<td align="center">{{ $t->name }}             </td>
					<td align="center">{{ $t->lastname }}         </td>
					<td align="center">{{ $grade->name_grade }} - {{ $grade->name_section }} </td>
					<td align="center"><a class="btn btn-default btn-icon" href="/calificationsadmin/classcalification?id={{$t->id}}&idgra={{$grade->id}}"><i class="icon-search"></i>    Lista de Alumnos</a></td>
				</tr>
			<?php }else{ 
				$subjet = Subjets::find($t->sub_id);?>
				<tr>
					<td align="center">{{ $t->ci }}               </td>
					<td align="center">{{ $t->name }}             </td>
					<td align="center">{{ $t->lastname }}         </td>
					<td align="center">{{ $subjet->name_sub }}   </td>
					<td align="center"><a class="btn btn-default btn-icon" href="/calificationsadmin/classcalification?id={{$t->id}}&idsub={{$subjet->id}}"><i class="icon-search"></i>    Lista de Alumnos</a></td>
				</tr>
			<?php } ?>
			@endforeach			
			</tbody>
		</table>		
	</div>
</div>
</form>
</div>
@stop

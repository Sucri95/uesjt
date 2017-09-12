@extends('layouts.default')
@section('content')
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">CONFIRMACI&Oacute;N</h4>
      </div>
      <div class="modal-body">  
            <h4 class="modal-title" id="exampleModalLabel">¿Desea desactivar a este docente?</h4>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
        <a href="" id="deletemodalbtn" class="btn btn-primary" >DESACTIVAR</a>
      </div>
        
      </div>
      
    </div>
  </div>
</div>
<script type="text/javascript">
function deletemodalconfirm(val){
 document.getElementById('deletemodalbtn').href = "/teacher/delete?id="+val;
}
</script>
<hr class="separator invisible">
<hr class="separator invisible">
<div class="innerLR">
		<form enctype="application/x-www-form-urlencoded" method="post">
		<div class="widget widget-heading-simple widget-body-white">
		<h2 class="pull-left"></h2>
		<div class="widget-body">
		<h3 class="pull-left">Docentes</h3>	<a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>	
		<hr class="separator invisible">
		<hr class="separator invisible">
		<table class="dynamicTable colVis table">
			<thead>
				<tr>
					<th data-class="expand" class="center">Nº de cédula</th>
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
					<td align="center">{{ $teacher->ci}}</td>
					<td align="center">{{ $teacher->name}}</td>
					<td align="center">{{ $teacher->lastname}} </td>
					<?php if ($teacher->id_grade == NULL){
							$subjet = Subjets::find($teacher->sub_id);
					?><td align="center">{{$subjet->name_sub}}</td>
					<?php }else{ 
							$grade = Grades::find($teacher->id_grade);
					?><td align="center">{{$grade->name_grade}} - {{$grade->name_section}}</td><?php } ?>
					
					<td align="center">
					<a class="btn btn-default btn-icon" href="/teacher/update?id={{$teacher->id}}"><i class="icon-search"></i>    Modificar</a>					
					<a class="btn btn-default btn-icon" href="/notifications/edits?id={{$teacher->id}}"><i class="icon-search"></i> Ver Documentos</a>
					<button  data-toggle="modal" data-target="#deletemodal" value ="{{$teacher->id}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger btn-icon glyphicons circle_remove"><i></i>Desactivar</button>
					</td>
				</tr>
					@endforeach			
			</tbody>
		</table>		
	</div></div>
</form>
</div>
@stop

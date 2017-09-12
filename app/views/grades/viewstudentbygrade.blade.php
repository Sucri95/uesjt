@extends('layouts.default')

@section('content')
<?php
 if (isset($_GET['id'])) {
 	$id = $_GET['id'];
 	$grade = Grades::find($id);
 }

?>
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">CONFIRMACI&Oacute;N</h4>
      </div>
      <div class="modal-body">  
            <h4 class="modal-title" id="exampleModalLabel">¿Desea desactivar a este alumno?</h4>
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
 document.getElementById('deletemodalbtn').href = "/student/delete?id="+val;
}
</script>
<hr class="separator invisible">
<hr class="separator invisible">
<div class="innerLR">
		<form enctype="application/x-www-form-urlencoded" method="post">
		<div class="widget widget-heading-simple widget-body-white">
		<h2 class="pull-left"></h2>
		<div class="widget-body">
		<h3 class="pull-left">{{$grade->name_grade}}</h3><a class ="pull-right" href="/grades/index"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>		
		<hr class="separator invisible">
		<hr class="separator invisible">
		<table class="dynamicTable colVis table">
			<thead>
				<tr>
					<th class="center">N° C&eacute;dula</th>
					<th class="center">Nombres</th>
					<th class="center">Apellidos</th>
					<?php if (Auth::User()->user_level == 1) { ?>
						<th class="center">Acciones</th>
					<?php }?>
				</tr>
			</thead>
			<tbody>
			<?php $students = User::where('status', '=', 'A')->where('user_level', '=', '4')->where('id_grade', '=', $grade->id)->get(); ?>
			@foreach($students as $student)
				<tr>
					<td align="center">{{ $student->ci }}  </td>
					<td align="center">{{ $student->name }}  </td>
					<td align="center">{{ $student->lastname }}</td>
					<?php if (Auth::User()->user_level == 1) { ?>
					<td align="center">
						<a class="btn btn-default btn-icon" href="/student/update?id={{$student->id}}"><i class="icon-search"></i>    Modificar</a>
						<a class="btn btn-default btn-icon" href="/student/medical?id={{$student->id}}"><i class="icon-search"></i>    Información Médica</a>
						<button  data-toggle="modal" data-target="#deletemodal" value ="{{$student->id}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger btn-icon glyphicons circle_remove"><i></i>Desactivar</button>					</td>
					<?php }?>
				</tr>
					@endforeach			
			</tbody>
		</table>		
	</div>
</div>
</form>
</div>
@stop

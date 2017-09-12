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
 document.getElementById('deletemodalbtn').href = "/parent/delete?id="+val;
}
</script>
<hr class="separator invisible">
<hr class="separator invisible">

<div class="innerLR">
		<form enctype="application/x-www-form-urlencoded" method="post">
		<div class="widget widget-heading-simple widget-body-white">
		<h2 class="pull-left"></h2>
		<div class="widget-body">
		<h3 class="pull-left">Representantes</h3><a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>		
		<hr class="separator invisible">
		<hr class="separator invisible">
		<table class="dynamicTable colVis table">
			<thead>
				<tr>	
					<th data-class="expand" class="center"> Nº C&eacute;dula</th>
					<th data-class="expand" class="center">Nombre</th>
					<th data-hide="phone,tablet" class="center">Apellido</th>
					<th class="center">Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php $parents = User::where('status', '=', 'A')->where('user_level', '=', '3')->get(); ?>
			@foreach($parents as $parent)
				<tr>
					<td align="center">{{ $parent->ci}} </td>
					<td align="center">{{ $parent->name}} </td>
					<td align="center">{{ $parent->lastname}} </td>
					<td align="center">
					<a class="btn btn-default btn-icon" href="/parent/update?id={{$parent->id}}"><i class="icon-search"></i> Modificar</a>
					<a class="btn btn-default btn-icon" href="/notifications/edits?id={{$parent->id}}"><i class="icon-search"></i> Ver Documentos</a>
					<button  data-toggle="modal" data-target="#deletemodal" value ="{{$parent->id}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger btn-icon glyphicons circle_remove"><i></i>Desactivar</button>
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

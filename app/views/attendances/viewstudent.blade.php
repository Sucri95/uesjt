@extends('layouts.default')
@section('content')
    <div class="modal fade" id="confirmmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">CONFIRMACI&Oacute;N</h4>
      </div>
      <div class="modal-body">  
            <h4 class="modal-title" id="exampleModalLabel">¿Desea Guardar los cambios?</h4>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a onclick="document.getElementById('validateSubmitForm').submit();" class="btn btn-primary" >GUARDAR</a>
      </div>
        
      </div>
      
    </div>
  </div>
</div>
<?php
 if (isset($_GET['id'])) {
 	$id = $_GET['id'];
 	$grade = Grades::find($id);
 	$month[0]['num'] = 1;
 	$month[1]['num'] = 2;
 	$month[2]['num'] = 3;
 	$month[3]['num'] = 4;
 	$month[4]['num'] = 5;
 	$month[5]['num'] = 6;
 	$month[6]['num'] = 7;
 	$month[7]['num'] = 8;
 	$month[8]['num'] = 9;
 	$month[9]['num'] = 10;
 	$month[10]['num'] = 11;
 	$month[11]['num'] = 12;
 	$month[0]['mont'] = 'Enero';
	$month[1]['mont'] = 'Febrero';
	$month[2]['mont'] = 'Marzo';
	$month[3]['mont'] = 'Abril';
	$month[4]['mont'] = 'Mayo';
	$month[5]['mont'] = 'Junio';
	$month[6]['mont'] = 'Julio';
	$month[7]['mont'] = 'Agosto';
	$month[8]['mont'] = 'Septiembre';
	$month[9]['mont'] = 'Octubre';
	$month[10]['mont'] = 'Noviembre';
	$month[11]['mont'] = 'Diciembre';
 }

?>
<hr class="separator invisible">
<hr class="separator invisible">
<div class="innerLR">
	<form class="form-horizontal margin-none" id="validateSubmitForm" action="{{ action('AttendancesController@creator') }}" method="post" role="form">
	<div class="widget widget-heading-simple widget-body-white">
	<h2 class="pull-left"></h2>
	<div class="widget-body">
	<h3 class="pull-left">Lista de Alumnos</h3>		
	<hr class="separator invisible">
	<hr class="separator invisible">
            
            <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Año escolar</label>
                        <div class="col-md-8"><select id="select2_11" style="width:100%" data-style="btn-default btn-small" name="id_year"/>
                        <?php $year = Year::where('status', '=' , 'A')->get();?>
                        @foreach ($year as $y)
                        <option value="{{$y->id}}"selected>{{$y->name}}</option>
                        <?php $anio = $y->id;?>  
                        @endforeach            
                        </select></div>
                    </div>
            </div>
	               <div class="col-md-6">
	                   <div class="form-group">
                        <label class="col-md-4 control-label">Mes</label>
                        <div class="col-md-8"><select id="select2_10" style="width:100%" data-style="btn-default btn-small" name="month" />
                        	<?php foreach ($month as $mo) {
                        		$very = 0;
                        		$very = Attendances::where('id_grade', '=', $id)->where('month', '=', $mo['num'])->where('id_year', '=', $anio)->count();?>

                        		<?php if ($very == 0){ ?><option value="{{$mo['num']}}">{{$mo['mont']}}</option><?php } ?> 
                        <?php } ?>                  
                        </select></div>
                    </div>
                    </div>

                    
                    <hr class="separator invisible">
                    <hr class="separator invisible">
                    <hr class="separator invisible">
                    <hr class="separator invisible">

	           <?php $students = User::where('status', '=', 'A')->where('user_level', '=', '4')->where('id_grade', '=', $grade->id)->get(); ?>
	<table class="table table-bordered">
			<thead>
				<tr>
					<th class="center">Nombres</th>
					<th class="center">Apellidos</th>
					<th class="center">Asistencias</th>
					<th class="center">Inasistencias</th>
				</tr>
			</thead>
			<tbody>
			@foreach($students as $student)
				<tr>
					<td class="center">{{ $student->name }}  </td>
					<td class="center">{{ $student->lastname }}</td>
					<td class="center"><div class="col-md-12"><input class="form-control center" id="asistence_{{$student->id}}" name="asistance_{{$student->id}}" type="text" onkeypress="return solonumeros(event);" value="0"/></div></td>
					<td class="center"><div class="col-md-12"><input class="form-control center" id="inattendances_{{$student->id}}" name="inattendances_{{$student->id}}" type="text" onkeypress="return solonumeros(event);" value="0"/></div></td>
				</tr>
			@endforeach			
			</tbody>
	</table>

            <hr class="separator invisible" />
            <input class="form-control invisible"  name="idgrade" type="text" value="{{$id}}"/>
            <!-- Form actions -->
            <div class="form-actions">
                <a class="btn invisible"></a>
                <button data-toggle="modal" data-target="#confirmmodal" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Guardar</button>
                <a href="/" class="btn btn-danger btn-icon glyphicons remove pull-right">Cancelar</a>
            </div>
	</div>
	</div>
	</form>
</div>
@stop
@extends('layouts.default')
@section('content')
<div class="innerLR">
    <hr class="separator invisible" />
    <hr class="separator" />
    <hr class="separator invisible" />
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
        <a onclick="document.getElementById('form-schedule').submit();" class="btn btn-primary" >GUARDAR</a>
      </div>
        
      </div>
      
    </div>
  </div>
</div>
<?php if (isset($_GET['idgrade'])) {
    $id = isset($_GET['idgrade']);
    $grade = Grades::find($id);
};?>
    <!-- Form -->
<form id="form-schedule" class="form-horizontal margin-none" id="validateSubmitForm" action="{{ action('ScheduleController@creator') }}" method="post" role="form">
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Registrar Horarios</h2> <a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
        </div>
        </br>
        <!-- // Widget heading END -->
        
        <div class="widget-body">
        
            <!-- Row -->
            <div class="row">
                <div class="form-group">
                        <label class="col-md-4 control-label">Campos Obligatorios (*)</label>
                        <div class="col-md-8"><input class="form-control invisible" type="text" /></div>
                </div> 
            
                <!-- Column -->
                    <input class="form-control center" id="id_grade" name="id_grade" value="{{ $grade->id }}" type="hidden"/>

                <div class="col-md-6">
                    <hr class="separator" />
                    <?php $period = Periods::where('status', '=', 'A')->get();?>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Lapso Acad&eacute;mico *</label>
                        <div class="col-md-8"><select id="select2_11" style="width:100%" data-style="btn-default btn-small" name="id_period" />
                        <option value="" selected></option>
                           @foreach ($period as $p)
                                <option value="{{$p->id}}">{{$p->period_name}}</option>                 
                            @endforeach
                        </select>
                        </div>                                
                    </div>

                 	<div class="form-group" id="prof_select_materia">
                        <label class="col-md-4 control-label">Materia *</label>
                        <div class="col-md-8"><select id="select2_13" style="width:100%" data-style="btn-default btn-small" name="id_subjet" />
                        <?php $materia = Subjets::all();?>
                        <option value="" selected></option>
                        @foreach ($materia as $materia)
                            <option value="{{$materia->id}}">{{$materia->name_sub}}</option>                 
                        @endforeach
                        </select>
                        </div>                                
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Hora *</label>
                        <div class="col-md-8"><select id="select2_14" style="width:100%" data-style="btn-default btn-small" name="module"/>
                        <option value="" selected></option>
                        <option value="1">7:30-8:15</option>
                        <option value="2">8:15-9:00</option>
                        <option value="3">9:00-9:45</option>
                        <option value="4">9:45-10:15</option>
                        <option value="5">10:15-11:00</option>
                        <option value="6">11:00-11:45</option>
                        <option value="7">11:45-12:30</option>                    
                        </select></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">D&iacute;a *</label>
                        <div class="col-md-8"><select id="select2_15" style="width:100%" data-style="btn-default btn-small" name="day"/>
                        <option value="" selected></option>
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miércoles">Miércoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>                   
                        </select></div>
                    </div>
				
                    <!-- // Group END -->
                </div>
                <!-- // Column END -->
            </div>
            <!-- // Row END -->
            
            <hr class="separator" />
            
            <!-- Form actions -->
            <div class="form-actions">
                <a class="btn invisible"></a>
                <button data-toggle="modal" data-target="#confirmmodal" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Guardar</button>
                <a href="" class="btn btn-danger btn-icon glyphicons remove pull-right">Cancelar</a>
            </div>
            <!-- // Form actions END -->
            
        	</div>
    	</div>
    	
    	<!-- // Widget END --> 
</form>
<!-- // Form END -->
</div>

@stop

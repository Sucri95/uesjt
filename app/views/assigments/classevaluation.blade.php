@extends('layouts.default')
@section('content')
<!--   MODAL DE CONFIRMACION  -->
<div class="modal fade" id="confirmmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">CONFIRMACI&Oacute;N</h4>
      </div>
      <div class="modal-body">  
            <h4 class="modal-title" id="exampleModalLabel">¿Desea guardar la siguiente información?</h4>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
        <a onclick="document.getElementById('form-eval').submit();" class="btn btn-primary" >GUARDAR</a>
      </div>
        
      </div>
      
    </div>
  </div>
</div>
<!--   MODAL DE CONFIRMACION END -->

<div class="innerLR">
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <!-- Form -->
<form id="form-eval" class="form-horizontal margin-none" id="validateSubmitForm" action="{{ action('AssigmentController@classevaluation') }}" method="post" role="form">
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white col-md-12">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Registrar Plan de Evaluaci&oacute;n</h2>
            <hr class="separator invisible" />
        </div>
        <!-- // Widget heading END -->
        
        <div class="widget-body">
            <!-- Row -->
            <div class="row">
                <div class="form-group">
                        <label class="col-md-3 control-label">Campos Obligatorios (*)</label>
                        <div class="col-md-6"><input class="form-control invisible" type="text" /></div>
                </div> 
            
                <!-- Column -->
                <div class="col-md-10">
                        <!-- Group -->
                  
                            <div class="form-group" id="prof_select_grado">
                                <label class="col-md-5 control-label">* Grado Asignado:</label>
                                <div class="col-md-7"><select id="select2_11" style="width:100%" data-style="btn-default btn-small" style="text-align: center" name="id_grade" /> 
                                <?php $grado = Grades::all();?>
                                <option value="" selected></option>
                                @foreach ($grado as $g)
                                    <option value="{{$g->id}}">{{$g->name_grade}} - {{$g->name_section}}</option>                 
                                @endforeach 
                                </select> 
                                </div>                                
                            </div>
                           

                            <?php $materia = Subjets::all();?>
                            <div class="form-group" id="prof_select_materia">
                                <label class="col-md-5 control-label">* Materia:</label>
                                <div class="col-md-7"><select id="select2_12" style="width:100%" data-style="btn-default btn-small" name="id_subjet" style="text-align: center" />
                                <option value="" selected></option>
                                @foreach ($materia as $materia)
                                    <option value="{{$materia->id}}">{{$materia->name_sub}}</option>                 
                                @endforeach
                                </select>
                                </div>                                
                            </div>

                            <?php $period = Periods::where('status', '=', 'A')->get();?>
                            <div class="form-group">
                                <label class="col-md-5 control-label">* Lapso Acad&eacute;mico:</label>
                                <div class="col-md-7"><select id="select2_13" style="width:100%" data-style="btn-default btn-small" name="id_period" style="text-align: center" />
                                <option value="" selected></option>
                                @foreach ($period as $p)
                                    <option value="{{$p->id}}">{{$p->period_name}}</option>                 
                                @endforeach
                                </select>
                                </div>                                
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">* Actividad:</label>
                                <div class="col-md-7"><select id="select2_14" style="width:100%" data-style="btn-default btn-small" name="activity" onChange="changes();" style="text-align: center" />
                                <option value="" selected></option>
                                <option value="Exámen">Exámen</option>
                                <option value="Taller">Taller</option>
                                <option value="Discusión Socializada">Discusión Socializada</option>
                                <option value="Debate">Debate</option>
                                <option value="Exposición">Exposición</option>
                                <option value="Trabajo Escrito">Trabajo Escrito</option>                   
                                </select></div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">* Objetivo a evaluar:</label>
                                <div class="col-md-7"><input class="form-control" id="objective" name="objective" type="text" style="text-align: center" /></div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">* Fecha de Evaluaci&oacute;n:</label>
                                <div class="col-md-7"><input class="form-control" id="inputmask-date1" name="date" type="text" style="text-align: center" /></div>
                            </div>
                        </div>
                    <!-- // Group END -->
                </div>
                <!-- // Column END -->  
                <hr class="separator invisible" />
                 <!-- Form actions -->
            <div class="form-actions">
                <a class="btn invisible"></a> 
                 <button data-toggle="modal" data-target="#confirmmodal" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Guardar</button>
                <a href="/" class="btn btn-danger btn-icon glyphicons circle_remove pull-right">Cancelar</a>
            </div>
            <!-- // Form actions END -->
            </div>
            <!-- // Row END -->
          
            
      
            
        </div>
    <!-- // Widget END -->
    
</form>
<!-- // Form END -->
</div>
@stop

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
        <a onclick="document.getElementById('form-calification').submit();" class="btn btn-primary" >GUARDAR</a>
        </div>
        
      </div>
      
    </div>
  </div>
</div>
<!--   MODAL DE CONFIRMACION END -->
<?php $teacher = User::find(Auth::user()->id);?>

<script language="javascript" type="text/javascript">

function estugrado() {
    
 $("#select2_12").parent("div").find("ul > li").remove();
   $("#select2_12 > .filter-option").html(null);
    
   var o = document.getElementById("select2_10").value;

  $.get("/califications/ajaxgrade","rep="+o, function(respuesta){
    
    results = respuesta.split(",");
      
    var opcion2 = ' ';

 for(var i=0; i<results.length; i++)
   {
       opt = results[i].split("-");
     opcion2 = opcion2+'<option value="'+opt[0]+'" selected>'+opt[1]+'</option>'; 

    }

   $("#select2_12").html(opcion2);
 });
}

</script>

<div class="innerLR">
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <!-- Form -->
<form id="form-calification" class="form-horizontal margin-none" id="validateSubmitForm" action="{{ action('CalificationController@continueval') }}" method="post" role="form">
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Registrar Calificaci&oacute;n</h2>
        </div>
        </br>
        <!-- // Widget heading END -->
        
        <div class="widget-body">
         <a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
            <!-- Row -->
            <div class="row">
                <div class="form-group">
                        <label class="col-md-4 control-label">Campos Obligatorios (*)</label>
                        <div class="col-md-8"><input class="form-control invisible" type="text" /></div>
                </div> 
            
                <!-- Column -->
                <div class="col-md-8">
        
                        <!-- Group -->
                    
                    <?php if ($teacher->sub_id == null) { ?>
                    
                      <div class="form-group">
                        <label class="col-md-6 control-label">Grado *</label>
                        <input class="hidden" id="id_grado" name="id_grado" type="text" value="{{$teacher->id_grade}}" />
                        <?php $g = Grades::find($teacher->id_grade)?>
                        <div class="col-md-6"><input class="form-control center" type="text" value="{{$g->name_grade}}" readonly /></div>
                    </div>

                    <?php }else { ?>

                    <div class="form-group" id="prof_select_grado">
                        <label class="col-md-6 control-label">Grado *</label>
                        <div class="col-md-6"><select id="select2_10" style="width:100%" data-style="btn-default btn-small" name="id_grado" onChange="estugrado();" />
                        <?php $grados = Grades::all();?>
                        <option value="" selected></option>
                        @foreach ($grados as $grado)
                            <option value="{{$grado->id}}">{{$grado->name_grade}} - {{$grado->name_section}}</option>                 
                        @endforeach
                        </select>
                        </div>   
                    </div>
                        <?php } ?>                               
                  
                    
                     <div class="form-group" id="prof_select_materia">
                        <label class="col-md-6 control-label">Materia *</label>
                        <?php if ($teacher->id_grade == null) { ?>
                            <input class="hidden" id="id_subjet" name="id_subjet" type="text" value="{{$teacher->sub_id}}" />
                        <?php $s = Subjets::find($teacher->sub_id)?>
                        <div class="col-md-6"><input class="form-control center" type="text" value="{{$s->name_sub}}" readonly /></div>
                    </div>
                    <?php }else{ ?>
                    <div class="col-md-6"><select id="select2_11" style="width:100%" data-style="btn-default btn-small" name="id_subjet" />
                    <?php $materia = Subjets::all();?>
                    <option value="" selected></option>
                        @foreach ($materia as $subs)
                            <option value="{{$subs->id}}">{{$subs->name_sub}}</option>                 
                        @endforeach
                    </select>
                    </div>
                    <?php } ?>                          
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 control-label">Nombre del Estudiante *</label>
                        <div class="col-md-6"><select id="select2_12" style="width:100%" data-style="btn-default btn-small" name="id_student" />
                        
                        <?php if ($teacher->sub_id == null) { $students = User::where('status', '=', 'A')->where('user_level', '=', '4')->where('id_grade', '=', $teacher->id_grade)->get(); ?>
                            <option value="" selected></option>
                        @foreach ($students as $student) 
                            <option value="{{$student->id}}" > {{$student->name}} {{$student->lastname}}</option>            
                        @endforeach
                        <?php } ?>

                        </select>
                        </div>                                
                    </div>

                    
                    <?php $period = Periods::where('status', '=', 'A')->get();?>
                            <div class="form-group">
                            <label class="col-md-6 control-label">Lapso Acad&eacute;mico *</label>
                            <div class="col-md-6"><select id="select2_13" style="width:100%" data-style="btn-default btn-small" name="id_period" />
                            <option value="" selected></option>
                            @foreach ($period as $p)
                                <option value="{{$p->id}}">{{$p->period_name}}</option>                 
                            @endforeach
                            </select>
                            </div>                                
                            </div>

                    <div class="form-group">
                        <label class="col-md-6 control-label">Calificaci&oacute;n Literal *</label>
                        <div class="col-md-6"><select id="select2_14" style="width:100%" data-style="btn-default btn-small" name="continue_eval"/>
                        <option value="" selected></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>                  
                        </select></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-6 control-label">Calificaci&oacute;n Cualitativa *</label>
                        <div class="col-md-6"><select id="select2_15" style="width:100%" data-style="btn-default btn-small" name="cualitative"/>
                        <option value="" selected></option>
                        <option value="Excelente">Excelente</option>
                        <option value="Muy bien">Muy bien</option>
                        <option value="Bien">Bien</option>
                        <option value="Regular">Regular</option>
                        <option value="Debe mejorar">Debe mejorar</option>                  
                        </select></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-6 control-label">Calificaci&oacute;n Numeral *</label>
                        <div class="col-md-6"><select id="select2_16" style="width:100%" data-style="btn-default btn-small" name="cuantitative"/>
                        <option value="" selected></option>
                        <option value="20">20</option>
                        <option value="19">19</option>
                        <option value="18">18</option>
                        <option value="17">17</option>
                        <option value="16">16</option>
                        <option value="15">15</option>
                        <option value="14">14</option>
                        <option value="13">13</option>
                        <option value="12">12</option>
                        <option value="11">11</option>
                        <option value="10">10</option>
                        <option value="09">09</option>
                        <option value="08">08</option>
                        <option value="07">07</option>
                        <option value="06">06</option>
                        <option value="05">05</option>
                        <option value="04">04</option>
                        <option value="03">03</option>
                        <option value="02">02</option>
                        <option value="01">01</option>                  
                        </select></div>
                    </div>

                    <!-- // Group END -->
                </div>
                <div class="col-md-6"></div>
                <!-- // Column END -->
            </div>
            <!-- // Row END -->
            
            <hr class="separator invisible" />
            
            <!-- Form actions -->
            <div class="form-actions">
                <a class="btn invisible"></a>
                <button data-toggle="modal" data-target="#confirmmodal" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Guardar</button>
                <a href="/" class="btn btn-danger btn-icon glyphicons circle_remove pull-right">Cancelar</a>
            </div>
                     <hr class="separator invisible" />

            <!-- // Form actions END -->
            
        </div>
    </div>
    <!-- // Widget END -->
  </div>  
</form>
<!-- // Form END -->
</div>
@stop

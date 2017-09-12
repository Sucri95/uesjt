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
        <a onclick="document.getElementById('validateSubmitForm').submit();" class="btn btn-primary" >GUARDAR</a>
      </div>
        
      </div>
      
    </div>
  </div>
</div>
<!--   MODAL DE CONFIRMACION END -->
<script language="javascript" type="text/javascript">
function changes() {
  var ab = document.getElementById("select2_11").value;
 if (ab == 'C') {
    document.getElementById("prof_select_grado").className = "form-group";
    document.getElementById("prof_select_materia").className = "form-group hidden";    
  }
  if (ab == 'S') {
    document.getElementById("prof_select_materia").className = "form-group";
    document.getElementById("prof_select_grado").className = "form-group hidden";
  }
}
</script>

<div class="innerLR">
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <!-- Form -->
<form class="form-horizontal margin-none" id="validateSubmitForm" action="{{ action('TeacherController@creator') }}" method="post" role="form">
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Registrar Docente</h2> <a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
        </div>
        </br>
        <!-- // Widget heading END -->
        
        <div class="widget-body">
        
            <!-- Row -->
            <div class="row">
                <div class="form-group">
                        <label class="col-md-3 control-label">Campos Obligatorios (*)</label>
                        <div class="col-md-8"><input class="form-control invisible" type="text" /></div>
                </div> 
            
                <!-- Column -->
                <div class="col-md-6">
                <div class="widget-head-white" align="center">
                                <h4 class="heading">Informaci&oacute;n B&aacute;sica</h4>
                            </div>
                            <hr class="separator" />
                                 <!-- Group -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">* Nombres:</label>
                        <div class="col-md-8"><input class="form-control" id="name" name="name" type="text" style="text-align: center" onkeypress="return soloLetras(event);"/></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* Apellidos:</label>
                        <div class="col-md-8"><input class="form-control" id="lastname" name="lastname" type="text" style="text-align: center" onkeypress="return soloLetras(event);"/></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* Nacionalidad:</label>
                        <div class="col-md-8"><select id="select2_14" style="width:100%" data-style="btn-default btn-small" style="text-align: center" name="nacionalidad" />
                        <option value="" selected></option>
                        <option value="Venezolana">Venezolana</option>
                        <option value="Extranjero">Extranjero</option>                   
                        </select></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* C&eacute;dula de Identidad:</label>
                        <div class="col-md-8"><input class="form-control" id="inputmask-ci" name="ci" type="text" onkeypress="return solonumeros(event);" style="text-align: center"  /></div>
                    </div>

            <div class="form-group">
                    <label class="col-md-4 control-label">* G&eacute;nero:</label>
                    <div class="col-md-8"><select id="select2_10" style="width:100%" data-style="btn-default btn-small" name="gender" style="text-align: center" />
                    <option value="" selected></option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>                   
                    </select></div>
                     
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* Fecha de Nacimiento:</label>
                        <div class="col-md-8"><input class="form-control" id="inputmask-date-2" name="birthdate" type="text" style="text-align: center" onchange="calcularEdad();"/></div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">* Edad:</label>
                        <div class="col-md-8"><input class="form-control" id="age" name="age" type="text" style="text-align: center" readonly/></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* N&uacute;mero de Tel&eacute;fono:</label>
                        <div class="col-md-8"><input class="form-control" id="inputmask-phone" name="phone" type="text" style="text-align: center" onkeypress="return solonumeros(event);"/></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* Correo Electr&oacute;nico:</label>
                        <div class="col-md-8"><input class="form-control" id="email" name="email" type="text" title= "Su correo electrónico será su nombre de usuario" style="text-align: center"/></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* Direcci&oacute;n:</label>
                        <div class="col-md-8"><textarea style="overflow:auto;resize:none" id="address" name="address" cols="45" rows="5"></textarea></div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-4 control-label">* Asigne su contraseña de usuario:</label>
                        <div class="col-md-8"><input class="form-control" id="password" name="password" type="password" style="text-align: center" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* Confirmar Contraseña:</label>
                        <div class="col-md-8"><input class="form-control" id="confirm_password" name="confirm_password" type="password" style="text-align: center" /></div>
                    </div>
                    <!-- // Group END -->
                </div>
                <!-- // Column END -->
                
                <!-- Column -->
                <div class="col-md-6">
                <div class="widget-head-white" align="center">
                                <h4 class="heading">Informaci&oacute;n Profesional</h4>
                            </div>
                            <hr class="separator" />
                    <!-- Group -->
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">* Tipo de Docente:</label>
                        <div class="col-md-8"><select id="select2_11" style="width:100%" data-style="btn-default btn-small" style="text-align: center" name="type" onChange="changes();"/>
                        <option value="" selected></option>
                        <option value="C">De Aula</option>
                        <option value="S">Especializado</option>                   
                        </select></div>
                    </div>

                  <div class="form-group hidden" id="prof_select_grado">
                        <label class="col-md-4 control-label">* Grado Asignado:</label>
                        <div class="col-md-8"><select id="select2_12" style="width:100%" data-style="btn-default btn-small"style="text-align: center"  name="id_grade" />
                        <?php $grado = Grades::all();?>
                        <option value="" selected></option>
                        @foreach ($grado as $grado)
                            <option value="{{$grado->id}}">{{$grado->name_grade}} - {{$grado->name_section}}</option>                 
                        @endforeach
                        </select>
                        </div>                                
                    </div>

                    <div class="form-group hidden" id="prof_select_materia">
                        <label class="col-md-4 control-label">* Materia que Imparte:</label>
                        <div class="col-md-8"><select id="select2_13" style="width:100%" style="text-align: center" data-style="btn-default btn-small" name="sub_id" />
                        <?php $materia = Subjets::all();?>
                        <option value="" selected></option>
                        @foreach ($materia as $materia)
                            <option value="{{$materia->id}}">{{$materia->name_sub}}</option>                 
                        @endforeach
                        </select>
                        </div>                                
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* T&iacute;tulo Profesional:</label>
                        <div class="col-md-8"><input class="form-control" id="degree" style="text-align: center" name="degree" type="text" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* Fecha de Ingreso al Plantel:</label>
                        <div class="col-md-8"><input class="form-control" id="inputmask-date-1" style="text-align: center" name="admission_date" type="text" onchange="calcularAnios();" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* A&ntilde;os de Servicio en el Plantel:</label>
                        <div class="col-md-8"><input class="form-control" id="years_service" style="text-align: center" name="years_service" type="text" readonly/></div>
                    </div>

                    

                   

                    <!-- // Group END -->
                    
                </div>
                <!-- // Column END -->
                
            </div>
            <!-- // Row END -->
            
            <hr class="separator invisible" />
            
            <!-- Form actions -->
            <div class="form-actions">
                <a class="btn invisible"></a>
                <button data-toggle="modal" data-target="#confirmmodal" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Guardar</button>
                <a href="" class="btn btn-danger btn-icon glyphicons circle_remove pull-right">Cancelar</a>
            </div>
            <!-- // Form actions END -->
            
        </div>
    </div>
    <!-- // Widget END -->
    
</form>
<!-- // Form END -->
</div>
@stop

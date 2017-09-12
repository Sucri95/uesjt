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
<div class="innerLR">
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <!-- Form -->
<form class="form-horizontal margin-none" id="validateSubmitForm" action="{{ action('ParentController@creator') }}" method="post" role="form">
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Registrar Padre o Representante</h2> <a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
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

                            <h4 class="heading">Informaci&oacute;n Personal</h4>
                            </div>
                            <hr class="separator" />
                                 <!-- Group -->
                               <div class="form-group">
                        <label class="col-md-4 control-label">*Nombre:</label>
                        <div class="col-md-8"><input class="form-control" id="name" name="name" type="text" style="text-align: center" onkeypress="return soloLetras(event);" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">*Apellido:</label>
                        <div class="col-md-8"><input class="form-control" id="lastname" name="lastname" type="text" style="text-align: center" onkeypress="return soloLetras(event);" /></div>
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
                        <label class="col-md-4 control-label">*C&eacute;dula de Identidad:</label>
                        <div class="col-md-8"><input class="form-control" id="inputmask-ci" name="ci" type="text" onkeypress="return solonumeros(event);" style="text-align: center"/></div>
                    </div>

            <div class="form-group">
                    <label class="col-md-4 control-label">*G&eacute;nero:</label>
                    <div class="col-md-8"><select id="select2_10" style="width:100%" data-style="btn-default btn-small" name="gender"style="text-align: center" />
                    <option value="" selected></option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>                   
                    </select></div>
                     
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">*Fecha de Nacimiento:</label>
                        <div class="col-md-8"><input class="form-control" id="inputmask-date-2" name="birthdate" type="text" style="text-align: center" onchange="calcularEdad();"/></div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">*Edad:</label>
                        <div class="col-md-8"><input class="form-control" id="age" name="age" type="text" style="text-align: center" readonly /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">*N&uacute;mero de Tel&eacute;fono:</label>
                        <div class="col-md-8"><input class="form-control" id="inputmask-phone" name="phone" type="text" style="text-align: center" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">*Correo Electr&oacute;nico:</label>
                        <div class="col-md-8"><input class="form-control" id="email" name="email" type="text" style="text-align: center" title= "Su correo electrónico será su nombre de usuario" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">*Direcci&oacute;n:</label>
                        <div class="col-md-8"><textarea style="overflow:auto;resize:none" id="address" name="address" cols="45" rows="5" style="text-align: center" ></textarea></div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-4 control-label">*Asigne su contraseña de usuario:</label>
                        <div class="col-md-8"><input class="form-control" id="password" name="password" type="password" style="text-align: center" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">*Confirmar Contraseña:</label>
                        <div class="col-md-8"><input class="form-control" id="confirm_password" name="confirm_password" type="password" style="text-align: center" /></div>
                    </div>
                    <!-- // Group END -->
                </div>
                <!-- // Column END -->
                
                <!-- Column -->
                <div class="col-md-6">
                <div class="widget-head-white" align="center">
                                <h4 class="heading">Informaci&oacute;n del Representado</h4>
                            </div>
                            <hr class="separator" />
                    <!-- Group -->
               
                     <div class="form-group">
                        <label class="col-md-4 control-label">* Seleccione el alumno:</label>
                        <div class="col-md-8"><select id="select2_12" style="width:100%" data-style="btn-default btn-small" name="idstudent" style="text-align: center" />
                        <?php $students = User::where('user_level', '=', '4')->get();?>
                        <option value="" selected></option>
                        @foreach ($students as $student) 
                            <?php $grade = Grades::find($student->id_grade);?>
                            <option value="{{$student->id}}" >{{$student->ci}} - {{$student->name}} {{$student->lastname}} - {{$grade->name_grade}} - {{$grade->name_section}}</option>            
                        @endforeach
                        </select>
                        </div>                                
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
                <a href="/" class="btn btn-danger btn-icon glyphicons circle_remove pull-right">Cancelar</a>
            </div>
            <!-- // Form actions END -->
            
        </div>
    </div>
    <!-- // Widget END -->
    
</form>
<!-- // Form END -->
</div>
@stop

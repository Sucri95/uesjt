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
            <h4 class="modal-title" id="exampleModalLabel">¿Desea Guardar los cambios?</h4>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
        <a onclick="document.getElementById('form-updateparent').submit();" class="btn btn-primary" >GUARDAR</a>
      </div>
        
      </div>
      
    </div>
  </div>
</div>
<!--   MODAL DE CONFIRMACION END -->
<?php if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = User::find($id);
}?>
<div class="innerLR">
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />

    <!-- Form -->
<form id="form-updateparent" class="form-horizontal margin-none" id="validateSubmitForm" action="{{ action('ParentController@editor') }}" method="post" role="form">
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Actualizar Representante</h2><a class ="pull-right" href="/parent/index"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
        </div>
        </br>
        <!-- // Widget heading END -->
        
        <div class="widget-body">
        
            <!-- Row -->

                <!-- Row -->
            <div class="row">
            
                <!-- Column -->
                <div class="col-md-6">
                <div class="widget-head-white" align="center">
                                <h4 class="heading">Informaci&oacute;n B&aacute;sica</h4>
                </div>
                <hr class="separator" />
                <input type="hidden" name="id" value="{{ $user->id }}" />
                                 <!-- Group -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nombre:</label>
                        <div class="col-md-8"><input class="form-control" id="name" name="name" style="text-align:center" value="{{ $user->name }}" type="text" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Apellido:</label>
                        <div class="col-md-8"><input class="form-control" id="lastname" name="lastname" style="text-align:center" value="{{ $user->lastname }}" type="text" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">C&eacute;dula de Identidad:</label>
                        <div class="col-md-8"><label>{{ $user->ci }}</label></div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-4 control-label">G&eacute;nero:</label>
                        <div class="col-md-8"><input class="form-control" id="gender" name="gender" style="text-align:center" value="{{ $user->gender }}" type="text" /></div>
                    </div>                 

                    <div class="form-group">
                        <label class="col-md-4 control-label">Edad:</label>
                        <div class="col-md-8"><input class="form-control" id="age" name="age" style="text-align:center" value="{{ $user->age }}" type="text" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Fecha de Nacimiento:</label>
                        <div class="col-md-8"><input class="form-control" id="inputmask-date" style="text-align:center" name="birthdate" value="{{ $user->birthdate }}" type="text" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">N&uacute;mero de Tel&eacute;fono:</label>
                        <div class="col-md-8"><input class="form-control" id="inputmask-phone" style="text-align:center" name="phone" value="{{ $user->phone }}" type="text" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Correo Electr&oacute;nico:</label>
                        <div class="col-md-8"><input class="form-control" id="email" name="email" style="text-align:center" title= "Su correo electrónico será su nombre de usuario" value="{{ $user->email }}" type="text" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Direcci&oacute;n:</label>
                        <div class="col-md-8"><textarea style="overflow:auto;resize:none" id="address" name="address" cols="45" rows="5">{{ $user->address }}</textarea></div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label">Asigne su contraseña de usuario:</label>
                        <div class="col-md-8"><input class="form-control" id="password2" name="password2" type="password" style="text-align:center"/></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Confirmar Contraseña:</label>
                        <div class="col-md-8"><input class="form-control" id="confirm_password2" name="confirm_password2" style="text-align:center" type="password" /></div>
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
                        <label class="col-md-4 control-label">Representado:</label>
                        <div class="col-md-8"><select id="select2_12" style="width:100%" style="text-align:center" data-style="btn-default btn-small" name="idstudent" />
                        <?php $students = User::where('user_level', '=', '4')->get();?>
                        <option value="" selected></option>
                        @foreach ($students as $student) 
                            <?php $count = 0;
                            $grade = Grades::find($student->id_grade);?>
                            <?php $count = StudentParents::where('student_id', '=', $student->id)->where('parent_id', '=', $user->id)->count();?>
                            <option value="{{$student->id}}" <?php if ($count > 0) { echo "selected";} ?> > {{$student->ci}} - {{$student->name}} {{$student->lastname}} - {{$grade->name_grade}} - {{$grade->name_section}}</option>            
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
                <button data-toggle="modal" data-target="#confirmmodal" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Actualizar</button>
            </div>
             <hr class="separator invisible" />
              <hr class="separator invisible" />
               
        </div>
            <!-- // Form actions END -->
         </div>
         <!-- // WidgetBody END -->

    </div>
    <!-- // Widget END -->
    
</form>
<!-- // Form END -->
@stop

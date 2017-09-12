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
<?php if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = User::find($id);
}?>

<div class="innerLR">
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />

    <!-- Form -->
<form class="form-horizontal margin-none" enctype="multipart/form-data" id="validateSubmitForm" action="{{ action('StudentController@editor') }}" method="post" role="form" onsubmit="return validarExtencion();">
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Actualizar Alumno</h2><a class ="pull-right" href="/grades/viewstudentbygrade?id={{$user->id_grade}}"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
        </div>
        </br>
        <!-- // Widget heading END -->
        
        <div class="widget-body">
        
            <!-- Row -->
            <div class="row">
            
                <!-- Column -->
                <div class="col-md-6">
                <div class="widget-head-white" align="">
                    <h4 class="heading">Informaci&oacute;n B&aacute;sica</h4>
                </div>
                <hr class="separator" />
                <input type="hidden" name="id" value="{{ $user->id }}" />
                
                    <!-- Group -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nombres:</label>
                        <div class="col-md-8"><input class="form-control" id="name" name="name" value="{{ $user->name }}" type="text" style="text-align: center" onkeypress="return soloLetras(event);" /></div>
                    </div>
                    <!-- // Group END -->
                    
                    <!-- Group -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Apellidos:</label>
                        <div class="col-md-8"><input class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}" type="text" style="text-align: center" onkeypress="return soloLetras(event);" /></div>
                    </div>
                    <!-- // Group END -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">C&eacute;dula de Identidad:</label>
                        <div class="col-md-8"><input class="form-control" id="inputmask-ci" name="ci" value="{{ $user->ci }}" type="text" style="text-align: center" onkeypress="return solonumeros(event);" readonly /></div>
                    </div>

                           <!-- Group -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">G&eacute;nero:</label>
                        <div class="col-md-8" ><input class="form-control" id="gender" name="gender" value="{{ $user->gender }}" type="text" style="text-align: center"/></div>
                    </div>
                    <!-- // Group END -->

                           <!-- Group -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Edad:</label>
                        <div class="col-md-8"><input class="form-control" id="age" name="age" value="{{ $user->age }}" type="text" style="text-align: center" onkeypress="return solonumeros(event);" /></div>
                    </div>
                    <!-- // Group END -->

                           <!-- Group -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Grado:</label>
                        <div class="col-md-8"><select id="select2_11" style="width:100%" data-style="btn-default btn-small" name="id_grade" style="text-align: center"/>
                        <?php $grados = Grades::all();?>
                        @foreach ($grados as $grado)
                            <option value="{{$grado->id}}"  <?php if ($user->id_grade == $grado->id) { echo "selected";} ?>  >{{$grado->name_grade}} - {{$grado->name_section}}</option>                 
                        @endforeach
                        </select>
                        </div>                                
                    </div>
                    <!-- // Group END -->

                     <!-- Group -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Direcci&oacute;n:</label>
                        <div class="col-md-8"><input class="form-control" id="address" name="address" value="{{ $user->address }}" type="text" style="text-align: center"/></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Foto Tipo Carnet:</label>
                        <div class="col-md-8"><input class="form-control" id="document" name="logo_modif" type="file" accept="image/*" onchange="handleFiles(this.files)" /></div>
                    </div>
                    <!-- // Group END -->

                    <div class="form-group">
                        <label class="col-md-4 control-label">Foto</label>
                        <div class="col-md-8" id="image"><img class="obj thumbnail config_img" src="{{ $user->document }}"></div>
                    </div>
                    <!-- // Group END -->
                    
                </div>

                <!-- // Column END -->

           <!-- Column -->
                <div class="col-md-6">
                <div class="widget-head-white" align="center">
                                <h4 class="heading">Informaci&oacute;n M&eacute;dica</h4>
                            </div>
                            <hr class="separator" />
                    <!-- Group -->
                     <div class="form-group">
                        <label class="col-md-5 control-label">N&uacute;mero de Emergencia</label>
                        <div class="col-md-7"><input class="form-control" id="inputmask-phone" name="er_number" type="text" value="{{ $user->er_number }}" style="text-align: center"/></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Al&eacute;rgico a:</label>
                        <div class="col-md-7"><textarea style="overflow:auto;resize:none" id="allergies" name="allergies" cols="38" rows="5">{{ $user->allergies }}</textarea></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Medicamentos Permitidos:</label>
                        <div class="col-md-7"><textarea style="overflow:auto;resize:none" id="medicines" name="medicines" title="Medicamentos permitidos que se le pueden administrar a los alumnos en caso de dolores de cabeza, entre otros."cols="38" rows="5">{{ $user->medicines }}</textarea></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">Antecedentes M&eacute;dicos:</label>
                        <div class="col-md-7"><textarea style="overflow:auto;resize:none" id="back_medical" name="back_medical" title="Si sufre de alguna enfermedad neurol&oacute;gica, ha tenido convulsiones, entre otros." cols="38" rows="5">{{ $user->back_medical }}</textarea></div>
                    </div>
                
                    <!-- // Group END -->
                    
                </div>
                <!-- // Column END -->
                
            </div>
            <!-- // Row END -->
            
            <hr class="separator invisible" />
            
            <!-- Form actions -->
            <div class="form-actions">
                <button data-toggle="modal" data-target="#confirmmodal" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Modificar</button>
                
    <hr class="separator invisible" />
    <hr class="separator invisible" />
            </div>
            <!-- // Form actions END -->
         </div>   
        </div>
    </div>
    <!-- // Widget END -->
    
</form>
<!-- // Form END -->

@stop

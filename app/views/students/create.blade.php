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
    <hr class="separator invisible" />
    <!-- Form -->
<form class="form-horizontal margin-none" enctype="multipart/form-data" id="validateSubmitForm" action="{{ action('StudentController@creator') }}" method="post" role="form" onsubmit="return validarExtencion();">
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Registrar Alumno</h2> <a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
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
                        <div class="col-md-8"><select id="select2_12" style="width:100%" data-style="btn-default btn-small" style="text-align: center" name="nacionalidad" />
                        <option value="" selected></option>
                        <option value="V-">Venezolano</option>
                        <option value="E-">Extranjero</option>                   
                        </select></div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">* C&eacute;dula Escolar:</label>
                        <div class="col-md-8"><input class="form-control" id="ci" name="ci" type="text" style="text-align: center" onkeypress="return solonumeros(event);" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* G&eacute;nero:</label>
                        <div class="col-md-8"><select id="select2_10" style="width:100%" data-style="btn-default btn-small" style="text-align: center" name="gender" />
                        <option value="" selected></option>
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>                   
                        </select></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* Fecha de Nacimiento:</label>
                        <div class="col-md-8"><input class="form-control" id="inputmask-date-2" style="text-align: center" name="birthdate" type="text" onchange="calcularEdad();" /></div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-md-4 control-label">* Edad:</label>
                        <div class="col-md-8"><input class="form-control" id="age" name="age" type="text" style="text-align: center" readonly/></div>
                    </div>

                
                    <div class="form-group">
                        <label class="col-md-4 control-label">* Grado:</label>
                        <div class="col-md-8"><select id="select2_11" style="width:100%" style="text-align: center" data-style="btn-default btn-small" name="id_grade" />
                        <?php $grado = Grades::all();?>
                        <option value="" selected></option>
                        @foreach ($grado as $grado)
                            <option value="{{$grado->id}}">{{$grado->name_grade}} - {{$grado->name_section}}</option>                 
                        @endforeach
                        </select>
                        </div>                                
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* Direcci&oacute;n:</label>
                        <div class="col-md-8"><textarea style="overflow:auto;resize:none" id="address" name="address" style="text-align: center" cols="45" rows="5"></textarea></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* Foto tipo carnet:</label>
                        <div class="col-md-8"><input class="form-control" id="document" name="document" type="file" accept="image/*" onchange="handleFiles(this.files)"/></div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-md-4 control-label">Foto</label>
                        <div class="col-md-8" id="image" ><div class=" holderjs-fluid" id="" style="color: rgb(170, 170, 170); width:190px; height: 190px; line-height: 190px; background-color: rgb(238, 238, 238);">Sin imagen</div></div>
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
                        <label class="col-md-5 control-label">* N&uacute;mero de Emergencia:</label>
                        <div class="col-md-7"><input class="form-control" id="inputmask-phone" name="er_number" style="text-align: center" type="text" /></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">* Al&eacute;rgico a:</label>
                        <div class="col-md-7"><textarea style="overflow:auto;resize:none" id="allergies" name="allergies" cols="38" rows="5">Nada</textarea></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">* Medicamentos Permitidos:</label>
                        <div class="col-md-7"><textarea style="overflow:auto;resize:none" id="medicines" name="medicines" title="Medicamentos permitidos que se le pueden administrar a los alumnos en caso de dolores de cabeza, entre otros."cols="38" rows="5">Atamel, ibuprofeno, buscapina, alivet</textarea></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 control-label">* Antecedentes M&eacute;dicos:</label>
                        <div class="col-md-7"><textarea style="overflow:auto;resize:none" id="back_medical" name="back_medical" title="Si sufre de alguna enfermedad neurol&oacute;gica, ha tenido convulsiones, entre otros." cols="38" rows="5">Ninguno</textarea></div>
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
                <a href="/" class="btn btn-danger btn-icon glyphicons pull-right">Cancelar</a>
            </div>
            <!-- // Form actions END -->
            
        </div>
    </div>
    <!-- // Widget END -->
    
</form>
<!-- // Form END -->
</div>
@stop

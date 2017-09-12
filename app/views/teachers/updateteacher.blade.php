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
    <hr class="separator invisible" />

    <!-- Form -->
<form class="form-horizontal margin-none" id="validateSubmitForm" action="{{ action('TeacherController@editor') }}" method="post" role="form">
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Actualizar Docente</h2><a class ="pull-right" href="/teacher/index"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
        </div>
        <!-- // Widget heading END -->
        
        <div class="widget-body">
            <hr class="separator invisible" />
    <hr class="separator invisible" />
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
                        <label class="col-md-4 control-label">Nombres:</label>
                        <div class="col-md-8"><input class="form-control" id="name" name="name" value="{{ $user->name }}" type="text" style="text-align: center"/></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Apellidos:</label>
                        <div class="col-md-8"><input class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}" type="text" style="text-align: center"/></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">C&eacute;dula de Identidad:</label>
                        <div class="col-md-8"><label>{{ $user->ci }}</label></div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-4 control-label">G&eacute;nero:</label>
                        <div class="col-md-8"><input class="form-control" id="gender" name="gender" value="{{ $user->gender }}" type="text"style="text-align: center"  readonly /></div>
                    </div>                 

                    <div class="form-group">
                        <label class="col-md-4 control-label">Edad:</label>
                        <div class="col-md-8"><input class="form-control" id="age" name="age" value="{{ $user->age }}" type="text" style="text-align: center"/></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Fecha de Nacimiento:</label>
                        <div class="col-md-8"><input class="form-control" id="inputmask-date" name="birthdate" value="{{ $user->birthdate }}" style="text-align: center" type="text" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">N&uacute;mero de Tel&eacute;fono:</label>
                        <div class="col-md-8"><input class="form-control" id="inputmask-phone" name="phone" value="{{ $user->phone }}" type="text" style="text-align: center" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Correo Electr&oacute;nico:</label>
                        <div class="col-md-8"><input class="form-control" id="email" name="email" value="{{ $user->email }}" type="text" style="text-align: center" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Direcci&oacute;n:</label>
                        <div class="col-md-8"><textarea style="overflow:auto;resize:none" id="address" name="address" cols="45" rows="5">{{ $user->address }}</textarea></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Asigne su contraseña de usuario:</label>
                        <div class="col-md-8"><input class="form-control" id="password2" name="password2" type="password" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Confirmar Contraseña:</label>
                        <div class="col-md-8"><input class="form-control" id="confirm_password2" name="confirm_password2" type="password" /></div>
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
                        <label class="col-md-4 control-label">Tipo de Docente</label>
                        <div class="col-md-8"><select id="select2_11" style="width:100%" data-style="btn-default btn-small" style="text-align: center" name="type" onChange="changes();"/>
                        <option value=""></option>
                        <?php if ($user->type == 'S') { echo "selected"; } ?>
                        <option value="C" <?php if ($user->type == 'C') { echo "selected"; } ?> >De Aula</option>
                        <option value="S" <?php if ($user->type == 'S') { echo "selected"; } ?> >Especializado</option>                   
                        </select></div>
                    </div>

                    <?php if ($user->type == 'C') { ?> <div class="form-group" id="prof_select_grado"> <?php }else{ ?> <div class="form-group hidden" id="prof_select_grado"> <?php } ?> 
                        <label class="col-md-4 control-label">Grado Asignado</label>
                        <div class="col-md-8"><select id="select2_12" style="width:100%" data-style="btn-default btn-small" style="text-align: center" name="id_grade" />
                        <?php $grado = Grades::all();?>
                        <option value="" selected></option>
                        @foreach ($grado as $grado)
                            <option value="{{$grado->id}}" <?php if ($user->id_grade == $grado->id) { echo "selected";} ?> >{{$grado->name_grade}} - {{$grado->name_section}}</option>                 
                        @endforeach
                        </select>
                        </div>                                
                    </div>

                    <?php if ($user->type == 'S') { ?>  <div class="form-group" id="prof_select_materia"> <?php }else{ ?>  <div class="form-group hidden" id="prof_select_materia"> <?php } ?>
                        <label class="col-md-4 control-label">Materia que Imparte</label>
                        <div class="col-md-8"><select id="select2_13" style="width:100%" data-style="btn-default btn-small" style="text-align: center" name="sub_id" />
                        <?php $materia = Subjets::all();?>
                        <option value="" selected></option>
                        @foreach ($materia as $materia)
                            <option value="{{$materia->id}}" <?php if ($user->sub_id == $materia->id) { echo "selected";} ?> >{{$materia->name_sub}}</option>                 
                        @endforeach
                        </select>
                        </div>                                
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">T&iacute;tulo Profesional</label>
                        <div class="col-md-8"><input class="form-control" id="degree" name="degree" style="text-align: center" value="{{ $user->degree }}" type="text" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">A&ntilde;os de Servicio en el Plantel</label>
                        <div class="col-md-8"><input class="form-control" id="years_service" name="years_service" style="text-align: center" value="{{ $user->years_service }}" type="text" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Fecha de Ingreso al Plantel</label>
                        <div class="col-md-8"><input class="form-control" id="inputmask-date1" name="admission_date" style="text-align: center" value="{{ $user->admission_date }}" type="text" /></div>
                    </div>

                    <!-- // Group END -->
                    
                </div>
                <!-- // Column END -->
                
            </div>
            <!-- // Row END -->

            <hr class="separator invisible" />
            
            <!-- Form actions -->
            <div class="form-actions">
                <button data-toggle="modal" data-target="#confirmmodal" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Actualizar</button>
            </div>
            <!-- // Form actions END -->
         </div>   
        </div>
    </div>
    <!-- // Widget END -->
    
</form>
<!-- // Form END -->

@stop

@extends('layouts.default')

@section('content')

<?php if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = User::find($id);
}?>

<div class="innerLR">
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />

    <!-- Form -->
<form class="form-horizontal margin-none" enctype="multipart/form-data" id="validateSubmitForm" method="post" role="form" onsubmit="return validarExtencion();">
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white col-md-12">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Informaci&oacute;n M&eacute;dica de {{$user->name}} {{$user->lastname}}</h2><a class ="pull-right" href="/grades/viewstudentbygrade?id={{$user->id_grade}}"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
        </div>
        </br>
        <!-- // Widget heading END -->
        
        <div class="widget-body">
        
            <!-- Row -->
            <div class="row">
            

           <!-- Column -->
                    <hr class="separator invisible" />
                    <!-- Group -->
                     <div class="form-group">
                        <label class="col-md-4 control-label">N&uacute;mero de Emergencia:</label>
                        <div class="col-md-4"><input class="form-control" id="inputmask-phone" style="width: 300px" style="text-align: center" name="er_number" type="text" value="{{ $user->er_number }}" readonly/></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Al&eacute;rgico a:</label>
                        <div class="col-md-4"><textarea style="overflow:auto;resize:none" id="allergies" name="allergies" cols="40" readonly rows="5">{{ $user->allergies }}</textarea></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Medicamentos Permitidos:</label>
                        <div class="col-md-4"><textarea style="overflow:auto;resize:none" id="medicines" name="medicines" readonly title="Medicamentos permitidos que se le pueden administrar a los alumnos en caso de dolores de cabeza, entre otros."cols="40" rows="5">{{ $user->medicines }}</textarea></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Antecedentes M&eacute;dicos:</label>
                        <div class="col-md-4"><textarea style="overflow:auto;resize:none" id="back_medical" name="back_medical" readonly title="Si sufre de alguna enfermedad neurol&oacute;gica, ha tenido convulsiones, entre otros." cols="40" rows="5">{{ $user->back_medical }}</textarea></div>
                    </div>
                
                    <!-- // Group END -->
                    
                </div>
                <!-- // Column END -->
                
            </div>
            <!-- // Row END -->
            
            <hr class="separator invisible" />
            
         </div>   
        </div>
    </div>
    <!-- // Widget END -->
    
</form>
<!-- // Form END -->

@stop

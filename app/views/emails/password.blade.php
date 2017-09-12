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
            <h4 class="modal-title" id="exampleModalLabel">¿Desea restaurar su contraseña?</h4>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
        <a onclick="document.getElementById('form-pass').submit();" class="btn btn-primary" >RESTAURAR</a>
      </div>
        
      </div>
      
    </div>
  </div>
</div>
<!--   MODAL DE CONFIRMACION END -->    <!-- Form -->
    <div class="innerLR">
    <form id="form-pass" class="form-horizontal margin-none" id="validateSubmitForm" action="{{ action('TopicController@backpassword') }}" method="post" role="form">
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white">
    <h2></h2>
        <!-- Widget heading -->
        <div class="widget-body">
        <div class="widget-head-white">
            <h3 class="pull-left">Recuperaci&oacute;n de Contraseña</h3>
            <a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
        </div>
        </br>
        <hr class="separator invisible">
        <hr class="separator ">
        <hr class="separator invisible">       
        <!-- // Widget heading END -->
        
            <!-- Row -->
            <div class="row">
            
              <div class="form-group">
                        <label class="col-md-2 control-label">Campos Obligatorios (*)</label>
                        <div class="col-md-8"><input class="form-control invisible" type="text" /></div>
                </div> 
                <!-- Column -->
                
                <div class="col-md-6">

                     <div class="form-group">
                        <label class="col-md-4 control-label">* Ingrese su correo electr&oacute;nico:</label>
                        <div class="col-md-8"><input maxlength="255" class="form-control" id="email" name="email" type="text" style="text-align: center" /></div>                                      
                </div>
                              
                </div>
            </div>
        
            <!-- // Row END -->
            
            <hr class="separator" />

            
            <!-- Form actions -->
            <div class="form-actions">
                <a class="btn invisible"></a>
                <button data-toggle="modal" data-target="#confirmmodal" id="btn-loading" data-loading-text="Enviando..."  class="btn btn-icon btn-primary pull-right"><i></i>Recuperar</button>
                <a href="/"><span class="btn btn-danger btn-icon pull-right"><i></i>Cancelar</span></a>
            </div>
            <!-- // Form actions END -->
            </div>
        </div>
    </div>
    <!-- // Widget END -->
    
</form>
<!-- // Form END -->
</div>

@stop

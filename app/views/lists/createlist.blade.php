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
        <a onclick="document.getElementById('form-list').submit();" class="btn btn-primary" >GUARDAR</a>
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
<form id="form-list" class="form-horizontal margin-none" id="validateSubmitForm" action="{{ action('ListController@creator') }}" method="post" role="form">
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white col-md-10">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Registrar Lista de &Uacute;tiles</h2> <a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
        </div>
        </br>
        <!-- // Widget heading END -->
        
        <div class="widget-body">
        
            <!-- Row -->
            <div class="row">
            
                <!-- Column -->
                <div class="col-md-10">

               <div class="form-group">
                        <label class="col-md-4 control-label">Campos Obligatorios (*)</label>
                        <div class="col-md-12"><input class="form-control invisible" type="text" /></div>
                </div> 
                    <hr class="separator invisible" />
                                 <!-- Group -->

                    <div class="form-group">
                        <label class="col-md-4 control-label">* Nombre:</label>
                        <div class="col-md-8"><input class="form-control" id="list_name" name="list_name" type="text" onkeypress="return soloLetras(event);" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">* Cantidad:</label>
                        <div class="col-md-8"><input class="form-control" id="quantity" name="quantity" type="text" onkeypress="return solonumeros(event);" /></div>
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

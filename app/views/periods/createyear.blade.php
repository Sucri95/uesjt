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
        <a onclick="document.getElementById('form-period').submit();" class="btn btn-primary" >GUARDAR</a>
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
<form id="form-period"class="form-horizontal margin-none" id="validateSubmitForm" action="{{ action('PeriodController@creatoryear') }}" method="post" role="form">
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Registrar A&ntilde;o Escolar</h2> <a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
        </div>
        </br>
        <!-- // Widget heading END -->
        
        <div class="widget-body">
        
            <!-- Row -->
            <div class="row">
                <div class="form-group">
                        <label class="col-md-4 control-label">Campos Obligatorios (*)</label>
                        <div class="col-md-8"><input class="form-control invisible" type="text" /></div>
                </div>            
                <!-- Column -->
                <div class="col-md-6">
                    <hr class="separator" />
                                 <!-- Group -->

                    <div class="form-group">
                        <label class="col-md-5 control-label">* Nombre del A&ntilde;o Escolar:</label>
                        <div class="col-md-7"><input class="form-control" id="name" name="name" type="text" /></div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-5 control-label">* 1er Lapso desde fecha:</label>
                        <div class="col-md-7"><input class="form-control" id="inputmask-date" name="fromdate1" type="text" /></div>
                    </div>

                     <div class="form-group">
                        <label class="col-md-5 control-label">* 1er Lapso hasta fecha:</label>
                        <div class="col-md-7"><input class="form-control" id="inputmask-date1" name="todate1" type="text" /></div>
                    </div>

                </div>
                    <div class="col-md-6">
                         <hr class="separator" />
                       
                        <div class="form-group">
                        <label class="col-md-5 control-label">* 2do Lapso desde fecha:</label>
                        <div class="col-md-7"><input class="form-control" id="inputmask-date2" name="fromdate2" type="text" /></div>
                    </div>

                     <div class="form-group">
                        <label class="col-md-5 control-label">* 2do Lapso hasta fecha:</label>
                        <div class="col-md-7"><input class="form-control" id="inputmask-date3" name="todate2" type="text" /></div>
                    </div>

                        <div class="form-group">
                        <label class="col-md-5 control-label">* 3er Lapso desde fecha:</label>
                        <div class="col-md-7"><input class="form-control" id="inputmask-date4" name="fromdate3" type="text" /></div>
                    </div>

                     <div class="form-group">
                        <label class="col-md-5 control-label">* 3er Lapso hasta fecha:</label>
                        <div class="col-md-7"><input class="form-control" id="inputmask-date5" name="todate3" type="text" /></div>
                    </div>
                    <!-- // Group END -->
                </div>
                <!-- // Column END -->
            </div>
            <!-- // Row END -->
            
            <hr class="separator" />
            
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

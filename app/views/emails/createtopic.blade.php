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
            <h4 class="modal-title" id="exampleModalLabel">¿Desea enviar el siguiente mensaje?</h4>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
        <a onclick="document.getElementById('form-notification').submit();" class="btn btn-primary" >ENVIAR</a>
      </div>
        
      </div>
      
    </div>
  </div>
</div>
<!--   MODAL DE CONFIRMACION END -->
    <!-- Form -->
    <div class="innerLR">
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />

    <form id="form-notification" class="form-horizontal margin-none" id="validateSubmitForm" action="{{ action('TopicController@creator') }}" method="post" role="form">
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white col-md-12">
   
        <!-- Widget heading -->
       
        <div class="widget-head">
            <h3 class="pull-left">Enviar Correo Electr&oacute;nico</h3>
            <a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
            </br>
        </div> 

        <div class="widget-body">
            
        <!-- // Widget heading END -->
        
            <!-- Row -->
            <div class="row">

              <div class="form-group">
                        <label class="col-md-3 control-label">Campos Obligatorios (*)</label>
                        <div class="col-md-6"><input class="form-control invisible" type="text" /></div>
                </div> 

                <!-- Column -->
                
                <div class="col-md-6">
                  
                            <div class="widget-head-white" align="center">
                                <h4 class="heading">Descripción</h4>
                            </div>
                            <hr class="separator" />
                                 <!-- Group -->

                        <!-- // Group END -->
                                        
                    <!-- Group -->
                     <div class="form-group ">
                        <div id="divuser">
                        <label class="col-md-3 control-label">* Destinado a:</label>
                        <?php $user = User::where('status','=','A')->where('user_level','<>','4')->get(); ?>
                        <div class="col-md-9"><select data-style="btn-default btn-small" id="select2_11" style="width:100%; text-align:center;" name="id_user"/>
                        <option value="" selected></option>
                        @foreach($user as $use)
                        <option value="{{ $use->id }}"> {{$use->ci}} - {{ $use->name }} {{ $use->lastname }} - {{ $use->email }}</option>
                        @endforeach
                        </select></div></div>
                     
                    </div>                    
                                       
                    <!-- // Group END -->
                </div>
            
                <!-- // Column END -->
                
                <!-- Column -->
               
                <div class="col-md-6">
                        <div class="widget-head-white" align="center">
                                <h4 class="heading">Especificaciones</h4>
                            </div>
                            <hr class="separator" />
                    <!-- Group -->
                    
                    <!-- // Group END -->
                    
                    <!-- Group -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">* Asunto:</label>
                        <div class="col-md-9"><input maxlength="255" style="width:100%; text-align:center;" class="form-control" name="asunto" type="text" /></div>
                                                                
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Texto:</label>
                        <div class="col-md-9"><textarea style="overflow:auto;resize:none" name="especificaciones" cols="50" rows="5"></textarea></div>
                    </div>

                </div>
                <!-- // Column END -->
                
            </div>
        
            <!-- // Row END -->
            
            <hr class="separator invisible" />

            
            <!-- Form actions -->
            <div class="form-actions">
                <a class="btn invisible"></a>
                <button data-toggle="modal" data-target="#confirmmodal" id="btn-loading" data-loading-text="Cargando..."  class="btn btn-icon btn-primary pull-right"><i></i>Enviar</button>
                <a href="/"><span class="btn btn-danger btn-icon pull-right"><i></i>Cancelar</span></a>
            </div>
            <!-- // Form actions END -->
            
        </div>
    </div>
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />

    <!-- // Widget END -->
    
</form>
<!-- // Form END -->
</div>

@stop

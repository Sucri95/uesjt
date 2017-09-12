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
            <h4 class="modal-title" id="exampleModalLabel">¿Desea guardar el siguiente documento?</h4>
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
<form class="form-horizontal margin-none" enctype="multipart/form-data"onsubmit="return validarExtencion();" id="validateSubmitForm" action="{{ action('DocumentController@creator') }}" method="post" role="form">
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white col-md-12">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Almacenar Documento</h2> <a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
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
                <div class="col-md-10">
                    <hr class="separator invisible" />
                                 <!-- Group -->
                       <div class="form-group">
                        <label class="col-md-5 control-label">* Usuario:</label>
                        <div class="col-md-7"><select id="select2_11" style="width:100%" data-style="btn-default btn-small" style="text-align: center" name="id_user"/>
                        <?php $user = User::where('status','=','A')->where('user_level','<>','4')->where('user_level','<>','1')->get();?>
                        <option value="" selected></option>
                        @foreach ($user as $u)
                            <option value="{{$u->id}}"> {{$u->ci}} - {{$u->name}} {{$u->lastname}} - {{$u->email}}</option>                 
                        @endforeach
                        </select>
                        </div>                                
                    </div>

                      <div class="form-group">
                        <label class="col-md-5 control-label">* Seleccione el documento a adjuntar:</label>
                        <div class="col-md-7"><input class="form-control" id="document" name="document" type="file" accept="image/*" onchange="handleFiles(this.files)"/></div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-md-5 control-label">Documento seleccionado:</label>
                        <div class="col-md-7" id="image" ><div class=" holderjs-fluid" id="" style="color: rgb(170, 170, 170); width:190px; height: 190px; line-height: 190px; background-color: rgb(238, 238, 238);">Sin imagen</div></div>
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

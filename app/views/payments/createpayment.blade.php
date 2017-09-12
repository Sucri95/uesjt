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
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
<form class="form-horizontal margin-none" id="validateSubmitForm" action="{{ action('PaymentController@creator') }}" method="post" role="form">
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white col-md-12">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Registrar Pago de Mensualidad</h2> <a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
        </div>
        </br>
        <!-- // Widget heading END -->
        
        <div class="widget-body">
        
            <!-- Row -->
                <div class="row">
                  <div class="form-group col-md-6">
                        <label class="col-md-6 control-label">Campos Obligatorios (*)</label>
                        <div class="col-md-7"><input class="form-control invisible" type="text" /></div>
                </div> 
            
                <!-- Column -->
                <div class="col-md-10">
                                 <!-- Group -->

                    <div class="form-group">
                        <label class="col-md-5 control-label">* Representante:</label>
                        <div class="col-md-7"><select id="select2_10" style="width:100%" data-style="btn-default btn-small" name="id_parent" />
                        <?php $parents = User::where('user_level', '=', '3')->get();?>
                        <option value="" selected></option>
                        @foreach ($parents as $parent) 
                            <?php $user = User::find($parent->ci);?>
                            <option value="{{$parent->id}}" > {{$parent->ci}} - {{$parent->name}} {{$parent->lastname}}</option>            
                        @endforeach
                        </select>
                        </div>                                
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">* Seleccione el mes a pagar:</label>
                        <div class="col-md-7"><select id="select2_11" style="width:100%" data-style="btn-default btn-small" name="month" />
                        <option value="" selected></option>
                        <option value="Enero">Enero</option>
                        <option value="Febrero">Febrero</option>
                        <option value="Marzo">Marzo</option> 
                        <option value="Abril">Abril</option> 
                        <option value="Mayo">Mayo</option> 
                        <option value="Junio">Junio</option> 
                        <option value="Julio">Julio</option> 
                        <option value="Agosto">Agosto</option> 
                        <option value="Septiembre">Septiembre</option> 
                        <option value="Octubre">Octubre</option> 
                        <option value="Noviembre">Noviembre</option> 
                        <option value="Diciembre">Diciembre</option>                    
                        </select></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">* Modo de pago:</label>
                        <div class="col-md-7"><select id="select2_12" style="width:100%" data-style="btn-default btn-small" name="pay_mode" />
                        <option value="" selected></option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="Tarjeta de Débito">Tarjeta de Débito</option>                   
                        </select></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">* Fecha:</label>
                        <div class="col-md-7"><input class="form-control" id="inputmask-date" name="pay_date" type="text" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">* Cantidad Bs:</label>
                        <div class="col-md-7"><input class="form-control" id="inputmask-currency" name="amount" type="text" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">* N&uacute;mero de Factura:</label>
                        <div class="col-md-7"><input class="form-control" id="bill_number" name="bill_number" type="text" /></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">Comentarios:</label>
                        <div class="col-md-7"><textarea style="overflow:auto;resize:none" id="comments" name="comments" cols="66" rows="5"></textarea></div>
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

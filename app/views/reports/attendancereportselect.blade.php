@extends('layouts.default')

@section('content')

<script type="text/javascript">
 function generate(){

    var month = document.getElementById('select2_14').value;
    var year = document.getElementById('select2_11').value;
    var grado = document.getElementById('select2_10').value;

    if (year == '' || grado == '' || month == '')  {    
        document.getElementById('generator').href = '/reports/index?msg=Llene%20todos%20los%20campos&titulo=InformaciÃ³n';
    }else{
        document.getElementById('generator').href = '/reports/graphicreport?year='+year+'&month='+month+'&grado='+grado;
    };


 }

</script>
<div class="innerLR">
    <!-- Form -->
<form class="form-horizontal margin-none" id="validateSubmitForm" action="" method="post" role="form">
    <h2></h2>
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white">
    
        <!-- Widget heading -->
        
        <!-- // Widget heading END -->
        
        <div class="widget-body col-md-10">
        <div class="widget-head-white">
            <h3 class="pull-left">Generar Asistencias Mensuales</h3> <a class ="pull-right" href="{{ action('ReportController@view') }}"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
        </div>
        </br>
        <hr class="separator invisible" />
        <hr class="separator " />
        <hr class="separator invisible" />
            <!-- Row -->
            <div class="row">
            
                <!-- Column -->

                <div class="col-md-6">
                
                                 <!-- Group -->
                    <div class="form-group pull-center">
                        <label class="col-md-4 control-label">Mes</label>
                       <div class="col-md-8"><select  style="width: 100%;" data-style="btn-default btn-small" id="select2_14" name="month" onChange="generate()">
                        <option value="1" selected>Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                       </select></div>
                     
                    </div>

                  <div class="form-group pull-center" id="prof_select_grado">
                        <label class="col-md-4 control-label">Grado</label>
                        <div class="col-md-8"><select id="select2_10" style="width:100%" data-style="btn-default btn-small" name="grado" onChange="generate();" />
                        <?php $grados = Grades::all();?>
                        <option value="" selected></option>
                        @foreach ($grados as $grado)
                            <option value="{{$grado->id}}">{{$grado->name_grade}} - {{$grado->name_section}}</option>                 
                        @endforeach
                        </select>
                        </div>   
                    </div>

                     <div class="form-group">
                        <label class="col-md-4 control-label">Año escolar</label>
                        <div class="col-md-8"><select id="select2_11" style="width:100%" data-style="btn-default btn-small" name="year" readonly/>
                        <?php $year = Year::where('status', '=' , 'A')->get();?>
                        @foreach ($year as $y)
                        <option value="{{$y->id}}"selected>{{$y->name}}</option>  
                        @endforeach            
                        </select></div>
                    </div> 
                    <!-- // Group END -->
                </div>
                <!-- // Column END --> 
                
            </div>
            <!-- // Row END -->
            
            
            
            <!-- Form actions -->
            <div class="form-actions">
                <a class="btn invisible"></a>
                <a id="generator" href="{{action('ReportController@view')}}" target="_blank" onMouseOver="generate()"><span class="btn btn-success btn-icon pull-right"><i></i>Generar<span></a>
                
            </div>
            <hr class="separator invisible" />
            <!-- // Form actions END -->
            
        </div>
    </div>
    <!-- // Widget END -->
    
</form>
<!-- // Form END -->
</div>
@stop

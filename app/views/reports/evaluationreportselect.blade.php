@extends('layouts.default')

@section('content')

<script type="text/javascript">
 function generate(){

    var grado = document.getElementById('select2_10').value;
    var materia = document.getElementById('select2_11').value;
    var lapso = document.getElementById('select2_12').value;

    if (grado == '' || materia == '' || lapso == '')  {    
        document.getElementById('generator').href = '/reports/index?msg=Llene%20todos%20los%20campos&titulo=InformaciÃ³n';
    }else{
        

        document.getElementById('generator').href = '/reports/evaluationreport?grado='+grado+'&materia='+materia+'&lapso='+lapso;

        
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
            <h3 class="pull-left">Generar Plan de Evaluaci&oacute;n</h3><?php if (Auth::user()->user_level == 1 || Auth::user()->user_level == 2) { ?><a class ="pull-right" href="{{ action('ReportController@view') }}"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a><?php } ?>
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

                    <div class="form-group pull-center" id="prof_select_grado">
                        <label class="col-md-4 control-label">Materia</label>
                        <div class="col-md-8"><select id="select2_11" style="width:100%" data-style="btn-default btn-small" name="materia" onChange="generate();" />
                        <?php $materia = Subjets::all();?>
                        <option value="" selected></option>
                        @foreach ($materia as $m)
                            <option value="{{$m->id}}">{{$m->name_sub}}</option>                 
                        @endforeach
                        </select>
                        </div>   
                    </div>

                    <div class="form-group pull-center" id="prof_select_grado">
                        <label class="col-md-4 control-label">Lapso</label>
                        <div class="col-md-8"><select id="select2_12" style="width:100%" data-style="btn-default btn-small" name="materia" onChange="generate();" />
                        <?php $lapso = Periods::where('status', '=', 'A')->get();?>
                        <option value="" selected></option>
                        @foreach ($lapso as $l)
                            <option value="{{$l->id}}">{{$l->period_name}}</option>                 
                        @endforeach
                        </select>
                        </div>   
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

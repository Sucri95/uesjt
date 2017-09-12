@extends('layouts.default')

@section('content')
<?php $teacher = User::find(Auth::user()->id);?>
<script type="text/javascript">
 function generate(){

    var year = document.getElementById('select2_10').value;

    if (year == '')  {    
        document.getElementById('generator').href = '/reports/index?msg=Llene%20todos%20los%20campos&titulo=InformaciÃ³n';
    }else{
        document.getElementById('generator').href = '/reports/disablereport?year='+year;
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
            <h3 class="pull-left">Generar Lista de alumnos desactivados por a&ntilde;o escolar</h3> <a class ="pull-right" href="{{ action('ReportController@view') }}"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
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
                        <label class="col-md-4 control-label">A&ntilde;o Escolar</label>
                        <div class="col-md-8"><select id="select2_10" style="width:100%" data-style="btn-default btn-small" name="year" onChange="generate();" />
                        <?php $year = Year::where('status', '=', 'D')->get();?>
                        <option value="" selected></option>
                        @foreach ($year as $y)
                            <option value="{{$y->id}}">{{$y->name}}</option>                 
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

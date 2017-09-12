@extends('layouts.default')

@section('content')

<script type="text/javascript">
 function generate(){

    var period = document.getElementById('select2_11').value;
    var grado = document.getElementById('select2_10').value;
    var student = document.getElementById('select2_12').value;
    var direct = document.getElementById('select2_13').value;

    if (grado == '' || student == '' || period == '' || direct == '')  {    
        document.getElementById('generator').href = '/reports/constanciareportselect?msg=Llene%20todos%20los%20campos&titulo=InformaciÃ³n';
    }else{
        document.getElementById('generator').href = '/reports/constanciareport?grado='+grado+'&period='+period+'&student='+student+'&direct='+direct;
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
            <h3 class="pull-left">Generar Constancia de Estudios</h3> <a class ="pull-right" href="{{ action('ReportController@view') }}"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
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
                    <label class="col-md-4 control-label">Quien suscribe: </label>
                    <div class="col-md-8"><select id="select2_13" style="width:100%" data-style="btn-default btn-small" name="direct" onChange="generate();" />
                    <?php $director = User::where('user_level', '=', '1')->get();?>
                    <option value="" selected></option>
                    @foreach ($director as $d)
                        <option value="{{$d->id}}">{{$d->ci}} - {{$d->name}} {{$d->lastname}}</option>                 
                    @endforeach
                    </select>
                    </div>   
                </div>

                <div class="form-group pull-center" id="prof_select_grado">
                    <label class="col-md-4 control-label">A nombre de: </label>
                    <div class="col-md-8"><select id="select2_12" style="width:100%" data-style="btn-default btn-small" name="student" onChange="generate();" />
                    <?php $student = User::where('user_level', '=', '4')->get();?>
                    <option value="" selected></option>
                    @foreach ($student as $stu)
                        <option value="{{$stu->id}}">{{$stu->ci}} - {{$stu->name}} {{$stu->lastname}}</option>                 
                    @endforeach
                    </select>
                    </div>   
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

                <div class="form-group pull-center" id="prof_select_grado">
                    <label class="col-md-4 control-label">A&ntilde;o Escolar</label>
                    <div class="col-md-8"><select id="select2_11" style="width:100%" data-style="btn-default btn-small" name="period" onChange="generate();" />
                    <?php $period = Year::where('status', '=', 'A')->get();?>
                    <option value="" selected></option>
                    @foreach ($period as $p)
                        <option value="{{$p->id}}">{{$p->name}}</option>                 
                    @endforeach
                    </select>
                    </div>   
                </div>

                    <div class="form-group">
                   
                    <!-- // Group END -->
                </div>
                <!-- // Column END --> 
                
            </div>
            <!-- // Row END -->
            </div>
            
            
            <!-- Form actions -->
            <div class="form-actions">
                <a class="btn invisible"></a>
                <a id="generator" href="{{action('ReportController@view')}}" target="_blank" onMouseOver="generate();"><span class="btn btn-success btn-icon pull-right"><i></i>Generar<span></a>
                
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

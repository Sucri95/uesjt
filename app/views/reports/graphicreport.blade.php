@extends('layouts.default')

@section('content')

<script type="text/javascript">
 function generate(){

    var month = document.getElementById('select2_14').value;
    var year = document.getElementById('year').value;
    var grado = document.getElementById('select2_10').value;

    if (year == '' || year.length < 4 || grado == '')  {    
        document.getElementById('generator').href = '/reports/index?msg=Llene%20todos%20los%20campos&titulo=InformaciÃ³n';
    }else{
        document.getElementById('generator').href = '/reports/attendancereport?year='+year+'&month='+month+'&grado='+grado;
    };


 }

</script>
<?php
if (isset($_GET['month']) && isset($_GET['year']) && isset($_GET['grado'])) { 
  $month1 = $_GET['month'];
  $year = $_GET['year'];
  $grado = Grades::find($_GET['grado']);

    $month[1]['mont'] = 'Enero';
    $month[2]['mont'] = 'Febrero';
    $month[3]['mont'] = 'Marzo';
    $month[4]['mont'] = 'Abril';
    $month[5]['mont'] = 'Mayo';
    $month[6]['mont'] = 'Junio';
    $month[7]['mont'] = 'Julio';
    $month[8]['mont'] = 'Agosto';
    $month[9]['mont'] = 'Septiembre';
    $month[10]['mont'] = 'Octubre';
    $month[11]['mont'] = 'Noviembre';
    $month[12]['mont'] = 'Diciembre';

};?>

<script type="text/javascript">

$(function() {

    var a = document.getElementById('asistencias').value;
    var i = document.getElementById('inasistencias').value;

var data = [
{ label: "Asistencias",  data: a},
{ label: "Inasistencias",  data: i}
];
var placeholder = $("#chart_donut1");


   placeholder.unbind();

   $.plot(placeholder, data, {
    series: {
     pie: { 
      innerRadius: 0.1,
      show: true,
      label: {
              show: true,
              formatter: labelFormatter,
              threshold: 0.1
            }
     }
    }
   });

   setCode([
    "$.plot('#placeholder', data, {",
    "    series: {",
    "        pie: {",
    "            innerRadius: 0.1,",
    "            show: true",
    "            label: {",
    "                show: true,",
    "                formatter: labelFormatter,",
    "                threshold: 0.1",
    "            }",
    "        }",
    "    }",
    "});"
   ]);
  
function labelFormatter(label, series) {
  return "<div style='font-size:8pt; text-align:center; padding:2px; color:black;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
 }
});

</script>
<div class="innerLR">
    <!-- Form -->
<form class="form-horizontal margin-none" id="validateSubmitForm" action="" method="post" role="form">
    <h2></h2>
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white">
    
        <!-- Widget heading -->
        
        <!-- // Widget heading END -->
        
        <div class="widget-body col-md-12">
        <div class="widget-head-white">
            <h3 class="pull-left">Gr&aacute;fico de Asistencias e Inasistencias de {{$month[$month1]['mont']}}</h3> <a class ="pull-right" href="{{ action('ReportController@view') }}"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
        </div>
        </br>
        <hr class="separator invisible" />
        <hr class="separator " />
        <hr class="separator invisible" />
            <!-- Row -->
            <div class="row">
            
                <!-- Column -->

            <div class="col-md-12">
                
                
            <div id="chart_donut1" class="flotchart-holder" style="height:200px; weight:200px;">

        
            </div> 
             <?php $asis = Attendances::where('id_grade', '=', $grado->id)->where('id_year', '=', $year)->where('month','=', $month1)->get();
            $a = 0;
            $i = 0;
            foreach ($asis as $asi) {
                $student = User::find($asi->id_student);
                $a = $a + $asi->assistance;
                $i = $i + $asi->inattendances;
            }?>
            <input id="asistencias" class="hidden" value="{{$a}}">
            <input id="inasistencias" class="hidden" value="{{$i}}">
            </div>
            <!-- // Row END -->
            </div>
            
            
            <!-- Form actions -->
            <div class="form-actions">
                <a class="btn invisible"></a>
                <a id="generator" href="/reports/attendancereport?year={{$year}}&month={{$month1}}&grado={{$grado->id}}" target="_blank" onMouseOver="generate()"><span class="btn btn-success btn-icon pull-right"><i></i>Imprimir<span></a>               
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

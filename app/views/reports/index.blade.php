@extends('layouts.default')

@section('content')

<div class="innerLR">
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <!-- Form -->
   
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Reportes</h2> <a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
        </div>
        </br>
        <!-- // Widget heading END -->
        
        <div class="widget-body">
        
            <!-- Row -->
            <div class="row">                
                <!-- Column -->
                <div class="col-md-12">
                <div class="widget-head-white" align="center">
                    <h4 class="heading">Seleccione el Reporte a Generar</h4>
                </div>
                    <table class="table table-bordered table-primary table-striped table-vertical-center checkboxs js-table-sortable">
                        <tbody>
                <?php if (Auth::user()->user_level == 1) { ?>
                <tr>
                    <td>Alumnos que han estudiado en el plantel por periodo acad&eacute;mico</td>
                    <td align="center">
                        <a class="btn btn-default btn-icon" href="/reports/disablereportselect">Generar Reporte</a>
                    </td>
                </tr>
                <?php } ?>

                <?php if (Auth::user()->user_level == 1) { ?>
                <tr>
                    <td>Asistencias e inasistencias mensuales</td>
                    <td align="center">
                        <a class="btn btn-default btn-icon" href="/reports/attendancereportselect">Generar Reporte</a>
                    </td>
                </tr>

                <?php } ?>

                <?php if (Auth::user()->user_level == 1) { ?>
                 <tr>
                    <td>Promedio de calificaciones por grado</td>
                    <td align="center">
                        <a class="btn btn-default btn-icon" href="/reports/promedioreportselect">Generar Reporte</a>
                    </td>
                </tr>
                <?php } ?>
               
                <?php if (Auth::user()->user_level == 1) { ?>
                  <tr>
                    <td>Bolet&iacute;n de calificaciones</td>
                    <td align="center">
                        <a class="btn btn-default btn-icon" href="/reports/boletinreportselect">Generar Reporte</a>
                    </td>
                </tr>
                <?php } ?>

           
                <tr>
                    <td>Plan de evaluaci&oacute;n</td>
                    <td align="center">
                        <a class="btn btn-default btn-icon" href="/reports/evaluationreportselect">Generar Reporte</a>
                    </td>
                </tr>
              

    
                  <tr>
                    <td>Horarios</td>
                    <td align="center">
                        <a class="btn btn-default btn-icon" href="/reports/schedulesreportselect">Generar Reporte</a>
                    </td>
                </tr>
             

                 <?php if (Auth::user()->user_level == 1) { ?>
                 <tr>
                    <td>Constancias de Estudios</td>
                    <td align="center">
                        <a class="btn btn-default btn-icon" href="/reports/constanciareportselect">Generar Reporte</a>
                    </td>
                </tr>
                <?php } ?>

                <tr>
                    <td>Lista de &Uacute;tiles</td>
                    <td align="center">
                        <a class="btn btn-default btn-icon" href="/reports/listreportselect">Generar Reporte</a>
                    </td>
                </tr>


               

                </tbody>
        </table>
                </div>
                <!-- // Column END -->
                
            </div>
            <!-- // Row END -->
        
            
        </div>
    </div>
    <!-- // Widget END -->
    
</div>
@stop

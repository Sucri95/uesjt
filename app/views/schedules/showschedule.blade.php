@extends('layouts.default')

@section('content')
<script type="text/javascript">

function deletemodalconfirm(val){
 document.getElementById('deletemodalbtn').href = "/schedules/deletemodule?id="+val;
}

</script>

<hr class="separator invisible">
<hr class="separator invisible">
<div class="innerLR">
<?php
if (isset($_GET['idgrade'])) {
    $grade = Grades::find($_GET['idgrade']);
}

?>
<div class="innerLR">
    <div class="modal fade" id="confirmmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">CONFIRMACI&Oacute;N</h4>
      </div>
      <div class="modal-body">  
            <h4 class="modal-title" id="exampleModalLabel">¿Desea guardar los cambios?</h4>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
        <a onclick="document.getElementById('validateSubmitForm').submit();" class="btn btn-primary" >GUARDAR</a>
      </div>
        
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">CONFIRMACI&Oacute;N</h4>
      </div>
      <div class="modal-body">  
            <h4 class="modal-title" id="exampleModalLabel">¿Desea Borrar esta clase?</h4>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
        <a href="" id="deletemodalbtn" class="btn btn-primary" >BORRAR</a>
      </div>
        
      </div>
      
    </div>
  </div>
</div>
    <!-- Form -->
    <!-- Widget -->
    <h2></h2>
    <div class="widget widget-heading-simple widget-body-white">
    
        <!-- Widget heading -->
        <div class="widget-body">
            <h3 class="pull-left"></h3>
            <a class ="pull-right" href="/schedules/sortbygrade"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
       
        </br></br></br>
        <!-- // Widget heading END -->
        <!-- Tabs -->
    <div class="relativeWrap" >
        <div class="widget widget-tabs widget-tabs-responsive">
        
            <!-- Tabs Heading -->
            <div class="widget-head">
                <ul class="pull-left">
                    <li><a class="glyphicons edit" href="#tab-2" data-toggle="tab"><i></i>Registrar</a></li>
                    <li class="active"><a class="glyphicons table" href="#tab-1" data-toggle="tab"><i></i>Horario</a></li>           
                </ul>
            </div>
            <!-- // Tabs Heading END -->
            
            <div class="widget-body">
                <div class="tab-content">
                
                    <!-- Tab content -->
                     <?php if (isset($_GET['param'])) {?>
                       <div class="tab-pane" id="tab-1">
                    <?php } else{ ?>
                    <div class="tab-pane active" id="tab-1">
                        <?php } ?>
                    
                       <!-- Widget -->
    <div class="widget-body">
    
        <!-- Widget heading -->
        
        </br>
        <!-- // Widget heading END -->        
        
            <!-- Row -->
            <div class="row">
            
                <!-- Column -->
                <div class="col-md-12">
                
                     <table class="table table-bordered table-primary">
            <tr>
                <th class="success">Hora / D&iacute;a</th>
                <th class="center">Lunes</th>
                <th class="center">Martes</th>
                <th class="center">Mi&eacute;rcoles</th>
                <th class="center">Jueves</th>
                <th class="center">Viernes</th>
            </tr>
            <tr>
                <td>7:30-8:15</td>
                <td><?php $monday1 = Schedules::where('day', '=', '1')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '1')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '2')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '2')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '3')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '3')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '4')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '4')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '5')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '5')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
            </tr>
            <tr>
                <td>8:15-9:00</td>
                <td><?php $monday1 = Schedules::where('day', '=', '1')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '1')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '2')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '2')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '3')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '3')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '4')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '4')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '5')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '5')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
            </tr>

            <tr>
                <td>9:00-9:30</td>
                <td>Recreo</td>
                <td>Recreo</td>
                <td>Recreo</td>
                <td>Recreo</td>
                <td>Recreo</td>

            </tr>

            <tr>
                <td>9:45-10:15</td>
                <td><?php $monday1 = Schedules::where('day', '=', '1')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '1')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '2')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '2')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '3')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '3')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '4')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '4')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '5')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '5')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
            </tr>
            <tr>
                <td>10:15-11:00</td>
                <td><?php $monday1 = Schedules::where('day', '=', '1')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '1')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '2')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '2')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '3')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '3')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '4')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '4')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '5')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '5')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
            </tr>
             <tr>
                <td>11:00-11:45</td>
                <td><?php $monday1 = Schedules::where('day', '=', '1')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '1')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '2')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '2')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '3')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '3')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '4')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '4')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
                <td><?php $monday1 = Schedules::where('day', '=', '5')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
                if($monday1 > 0){$monday12 = Schedules::where('day', '=', '5')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
                $mat = Subjets::find($monday12[0]['id_subjet']);
                ?>{{$mat->name_sub}}<button  data-toggle="modal" data-target="#deletemodal" value ="{{$monday12[0]['id']}}" onmouseover="deletemodalconfirm(this.value)" class="btn btn-danger glyphicon glyphicon-remove pull-right"><i></i></button><?php } ?></td>
            </tr>
             <tr>
                <td>11:45-12:30</td>
                <td>Hora Recreativa</td>
                <td>Hora Recreativa</td>
                <td>Hora Recreativa</td>
                <td>Hora Recreativa</td>
                <td>Hora Recreativa</td>            
            </tr>
        </table>
                    
                </div>
                <!-- // Column END -->
                
                <!-- Column -->
                
                <!-- // Column END -->
                
            </div>
            <!-- // Row END -->
            
            
            
            <!-- Form actions -->
            
           
            </br>
            <!-- // Form actions END -->
            
        </div>
    
    <!-- // Widget END -->
                    </div>
                    <!-- // Tab content END -->
                    
                    <!-- // Tab content -->
                    <div class="tab-pane" id="tab-2">
                       <form class="form-horizontal margin-none" id="validateSubmitForm" action="{{ action('ScheduleController@creator') }}" method="post" role="form">
                        <div class="widget-body">
                            <div class="row">
            
                <!-- Column -->
                <div class="col-md-6">
                    <hr class="separator" />

                    <div class="form-group" id="prof_select_materia">
                        <label class="col-md-4 control-label">Materia</label>
                        <div class="col-md-8"><select id="select2_13" style="width:100%" data-style="btn-default btn-small" name="id_subjet" />
                        <?php $materia = Subjets::all();?>
                        <option value="" selected></option>
                        @foreach ($materia as $materia)
                            <option value="{{$materia->id}}">{{$materia->name_sub}}</option>                 
                        @endforeach
                        </select>
                        </div>                                
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Hora</label>
                        <div class="col-md-8"><select id="select2_14" style="width:100%" data-style="btn-default btn-small" name="module"/>
                        <option value="" selected></option>
                        <option value="1">7:30-8:15</option>
                        <option value="2">8:15-9:00</option>
                        <option value="3">9:00-9:30</option>
                        <option value="4">9:45-10:15</option>
                        <option value="5">10:15-11:00</option>
                        <option value="6">11:00-11:45</option>
                        <option value="7">11:45-12:30</option>                    
                        </select></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">D&iacute;a</label>
                        <div class="col-md-8"><select id="select2_15" style="width:100%" data-style="btn-default btn-small" name="day"/>
                        <option value="" selected></option>
                        <option value="1">Lunes</option>
                        <option value="2">Martes</option>
                        <option value="3">Mi&eacute;rcoles</option>
                        <option value="4">Jueves</option>
                        <option value="5">Viernes</option>                   
                        </select></div>
                    </div>
                    <input class="form-control center" id="id_grade" name="id_grade" value="{{ $grade->id }}" type="hidden"/>

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
                <a href="" class="btn btn-danger btn-icon glyphicons remove pull-right">Cancelar</a>
            </div>
                      </div>
                  </form>
                    </div>    
             
                    
                    <!-- // Tab content END -->

                    <!-- // Tab content -->
                    
                    
                    <!-- // Tab content END -->
                    
                </div>
            </div>
        </div>
    </div></div></div> </div></div>
    <!-- // Tabs END -->    
<!-- // Form END -->
@stop

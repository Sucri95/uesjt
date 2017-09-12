@extends('layouts.default')

@section('content')


<script type="text/javascript">
function deletemodalconfirm(val){
 document.getElementById('deletemodalbtn').href = "/notifications/delete?id="+val;
}
</script>

<?php if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = User::find($id);
}?>
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">CONFIRMACI&Oacute;N</h4>
      </div>
      <div class="modal-body">  
            <h4 class="modal-title" id="exampleModalLabel">¿Desea eliminar este documento?</h4>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
        <a href="" id="deletemodalbtn" class="btn btn-primary" >BORRAR</a>
      </div>
        
      </div>
      
    </div>
  </div>
</div>

<div class="innerLR">
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <!-- Form -->
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Documentos de {{ $user->name }} {{ $user->lastname }}</h2> <a class ="pull-right" href="/parent/index"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right">Regresar</span></a>
        </div>
        </br>
        <!-- // Widget heading END -->
        
        <div class="widget-body">
        
            <!-- Row -->
            <div class="row">
                 <!-- Column -->
                <div class="col-md-12">
                                 <!-- Group -->
                    <?php $very = Documen::where('id_user', $user->id)->count();?>
                    <?php if ($very > 0 ) { ?>
                    <?php $very1 = Documen::where('id_user', $user->id)->get();?>

                    @foreach ($very1 as $doc)
                            <div class="col-md-4" id="image"><img class="obj thumbnail config_img" src="{{$doc->doc}}" width="300px" heigth="300px" ><button  data-toggle="modal" value="{{$doc->id}}" data-target="#deletemodal" type="button" onmouseover="deletemodalconfirm(this.value);" class="btn btn-danger btn-icon glyphicons circle_remove"><i></i>Eliminar</button></div>
                        @endforeach
                    <?php } ?>                                
                </div>                    
                    <input class="form-control invisible" id="id" name="id" type="text" />
                    <!-- // Group END -->
                </div>
                <!-- // Column END -->
            </div>
            <!-- // Row END -->
        </div>
    </div>
    <!-- // Widget END -->
<!-- // Form END -->
</div>
@stop

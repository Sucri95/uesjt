@extends('layouts.default')

@section('content')

<?php if (isset($_GET['id']) && isset($_GET['idgrado']) && isset($_GET['idsub'])) {
    $id = $_GET['id'];
    $idgrado = $_GET['idgrado'];
    $idsub = $_GET['idsub'];

    $student = User::find($id);
    $grado = Grades::find($idgrado);
    $materia = Subjets::find($idsub);
}

?>
<script language="javascript" type="text/javascript">

function editnote() {
    
    $("#select2_14").parent("div").find("ul > li").remove();
    $("#select2_14 > .filter-option").html(null);
    $("#select2_15").parent("div").find("ul > li").remove();
    $("#select2_15 > .filter-option").html(null);
    $("#select2_16").parent("div").find("ul > li").remove();
    $("#select2_16 > .filter-option").html(null);

    var st = document.getElementById("id_student").value;
    var pe = document.getElementById("select2_13").value;
    var su = document.getElementById("id_subjet").value;
    var gr = document.getElementById("id_grado").value;

  $.get("/califications/ajaxnotes","stu="+st+"&per="+pe+"&sub="+su+"&gra="+gr, function(respuesta){

    resultado = respuesta.split("|");
    
    notas = resultado[2].split(",");
    letras = resultado[1].split(","); 
    cuali = resultado[0].split(",");
    estudiante = resultado[3].split(",");
    var opcion1 = opcion2 = opcion3 = ''; 

    for(var i=0;i<notas.length;i++)
     {
    if(notas[i] != estudiante[1]){

    opcion1 = opcion1+'<option value="'+notas[i]+'">'+notas[i]+'</option>';
     }else{
        opcion1 = opcion1+'<option value="'+notas[i]+'" selected>'+notas[i]+'</option>'; 
     }
    }

    for(var i=0;i<letras.length;i++)
     {
    if(letras[i] != estudiante[2]){
        opcion2 = opcion2+'<option value="'+letras[i]+'">'+letras[i]+'</option>';
     }else{
        opcion2 = opcion2+'<option value="'+letras[i]+'" selected>'+letras[i]+'</option>';
     }
    }
    
    for(var i=0;i<cuali.length;i++)
     {
    if(cuali[i] != estudiante[0]){
       // console.log(cuali[i] +" "+ estudiante[2]);
        opcion3 = opcion3+'<option value="'+cuali[i]+'">'+cuali[i]+'</option>';
     }else{
        opcion3 = opcion3+'<option value="'+cuali[i]+'" selected>'+cuali[i]+'</option>';
     }
    }
     $("#select2_14").html(opcion2);
     $("#select2_15").html(opcion3);
     $("#select2_16").html(opcion1);

    $("#select2_14").trigger('change');
    $("#select2_15").trigger('change');
    $("#select2_16").trigger('change');

    document.getElementById("id_ca").value = estudiante[3];
});
}

</script>

<div class="innerLR">
    <hr class="separator invisible" />
    <hr class="separator invisible" />
    <hr class="separator invisible" />

    <!-- Form -->
<form id="form-updatecalification" class="form-horizontal margin-none" id="validateSubmitForm" action="{{ action('CalificationController@editor') }}" method="post" role="form">
    
    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-white col-md-12">
    
        <!-- Widget heading -->
        <div class="widget-head">
            <h2 class="pull-left">Notas de {{ $student->name }} {{ $student->lastname }} en {{$materia->name_sub}}</h2><a class ="pull-right" href="/califications/indexsubjet?id={{$student->id}}&idgrado={{$grado->id}}"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>
        </div>
        </br>
        <!-- // Widget heading END -->
        
        <div class="widget-body">
        
            <!-- Row -->
            <div class="row">
            
                <!-- Column -->
                <div class="col-md-10">

                     <div class="form-group">
                        <label class="col-md-4 control-label">Seleccione el lapso acad&eacute;mico (*)</label>
                        <div class="col-md-12"><input class="form-control invisible" type="text" /></div>
                </div> 


                <input type="hidden" id="id_student" value="{{ $student->id }}"/>
                <input type="hidden" id="id_ca" name="id_ca"/>
                <input type="hidden" id="id_subjet" value="{{ $materia->id }}"/>
                <input type="hidden" id="id_grado" value="{{ $grado->id }}"/>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Estudiante:</label>
                        <div class="col-md-8"><input class="form-control center" id="name" name="name" value="{{ $student->name }} {{ $student->lastname }}" type="text" readonly /></div>
                    </div>


                    <?php $period = Periods::where('status', '=', 'A')->get();?>
                    <div class="form-group">
                            <label class="col-md-4 control-label">* Lapso Acad&eacute;mico:</label>
                            <div class="col-md-8"><select id="select2_13" style="width:100%" data-style="btn-default btn-small" name="id_period" onChange="editnote();" />
                            <option value="" selected></option>
                            @foreach ($period as $p)
                                <option value="{{$p->id}}">{{$p->period_name}}</option>                 
                            @endforeach
                            </select>
                            </div>                                
                    </div>

                   
                    <div class="form-group">
                        <label class="col-md-4 control-label">Calificaci&oacute;n Literal:</label>
                        <div class="col-md-8"><select id="select2_14" style="width:100%" data-style="btn-default btn-small" name="continue_eval" readonly/>        
                        </select></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Calificaci&oacute;n Cualitativa:</label>
                        <div class="col-md-8"><select id="select2_15" style="width:100%" data-style="btn-default btn-small" name="cualitative" readonly/>           
                        </select></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Calificaci&oacute;n Numeral:</label>
                        <div class="col-md-8"><select id="select2_16" style="width:100%" data-style="btn-default btn-small" name="cuantitative" readonly/>               
                        </select></div>
                    </div>
            </div>
            
            
            <!-- Form actions -->
            <div class="form-actions">
                    <input class="form-control center" id="id_student" name="id_student" value="{{ $student->id }}" type="hidden"/>
                    <input class="form-control center" id="id_subjet" name="id_subjet" value="{{ $materia->id }}" type="hidden"/>
                    <input class="form-control center" id="id_grado" name="id_grado" value="{{ $grado->id }}" type="hidden"/>
            </div>
            <!-- // Form actions END -->
         </div>   
        </div>
    </div>
    <!-- // Widget END -->
    
</form>
<!-- // Form END -->
</div>
@stop

jQuery.gritters = function(msg, titulo, cl){

	$.gritter.add({
			// (string | mandatory) the heading of the notification
			title: titulo,
			// (string | mandatory) the text inside the notification
			text: msg,
			// (string | optional) the image to display on the left
			
			// (bool | optional) if you want it to fade out on its own or just sit there
			sticky: false,
			// (int | optional) the time you want it to be alive for before fading out
			time: '',
			// (string | optional) the class name you want to apply to that specific message
			class_name: cl
	});

	

	return false;

}


function validarExtencion(){ 

	if($("#document").val() != "")
  	{

			var extension = $("#document").val().split('.').pop(); // Obtengo la extensión

		    if((extension != "jpg")&&(extension != "jpeg")&&(extension != "png"))
		    {
		        $("#document").parents('label:first, div:first').find('.has-error').remove();        

		        $("#document").parents('.form-group:first').addClass('has-error');
		                
		        $("#document").parents('label:first').length ? $("#document").parents('label:first') : $("#document").parents('div:first').append('<p class="has-error help-block">Extención invalida, por favor seleccione un archivo jpg o png.</p>');
		        
		        return false;
		    }else{
		        return true;
		    }
		    
	}
}


function validarTiempos(){ 

    if(parseInt($("#expiration_time").val()) < parseInt($("#delivery_time").val()))
    {
        $("#delivery_time").parents('label:first, div:first').find('.has-error').remove();        

        $("#delivery_time").parents('.form-group:first').addClass('has-error');
                
        $("#delivery_time").parents('label:first').length ? $("#delivery_time").parents('label:first') : $("#delivery_time").parents('div:first').append('<p class="has-error help-block">El tiempo de entrega debe ser menor que el tiempo de expiración</p>');
        
        return false;
    }else{
    	var error = false;
        if($("#gato > .filter-option").html() == ""){

	        $("#gato").parents('label:first, div:first').find('.has-error').remove();        

	        $("#gato").parents('.form-group:first').addClass('has-error');
	                
	        $("#gato").parents('label:first').length ? $("#gato").parents('label:first') : $("#gato").parents('div:first').append('<p class="has-error help-block"> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Cliente Requerido</p>');

	        error = true;

	    }else{
	        $("#gato").parents('label:first, div:first').find('.has-error').remove(); 
	    }

	    if($("#perro > .filter-option").html() == ""){

	        $("#perro").parents('label:first, div:first').find('.has-error').remove();        

	        $("#perro").parents('.form-group:first').addClass('has-error');
	                
	        $("#perro").parents('label:first').length ? $("#perro").parents('label:first') : $("#perro").parents('div:first').append('<p class="has-error help-block"> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Vendedor Requerido</p>');

	        error = true;

	    }else{
	        $("#perro").parents('label:first, div:first').find('.has-error').remove(); 
	    }


	    if($("#id_customer_contact > .filter-option").html() == ""){

	        $("#id_customer_contact").parents('label:first, div:first').find('.has-error').remove();        

	        $("#id_customer_contact").parents('.form-group:first').addClass('has-error');
	                
	        $("#id_customer_contact").parents('label:first').length ? $("#id_customer_contact").parents('label:first') : $("#id_customer_contact").parents('div:first').append('<p class="has-error help-block"> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Contacto Requerido</p>');

	        error = true;

	    }else{
	        $("#id_customer_contact").parents('label:first, div:first').find('.has-error').remove(); 
	    }

	    if(! error)
			return true;
		else
			return false;
    }
}




function handleFiles(files) {

  var extension = $("#document").val().split('.').pop(); // Obtengo la extensión

  if((extension == "jpg") || (extension == "jpeg") || (extension == "png"))
  {
	  for (var i = 0; i < files.length; i++) {
	   
	    var file 		= files[i];
	    var imageType 	= /image.*/;
	    var img 		= document.createElement("img");

	    img.classList.add("obj");
	    img.classList.add("thumbnail");
	    img.classList.add("config_img");
	    img.file 		= file;
	    
	    $("#image").html(img);
	    
	    var reader 		= new FileReader();
	    reader.onload 	= (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
	    reader.readAsDataURL(file);
	  }
  }

}

function validarletras(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8 || tecla==0 || tecla==9 || tecla==13) return true;
    patron =/[A/.-Za-zñÑíáíóúéÁÉÍÓÚ$€\s]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}



 function soloLetras(e){

		 key = e.keyCode || e.which;
		 tecla = String.fromCharCode(key).toLowerCase();
		 letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
		 especiales = [8,39];

		 tecla_especial = false
		 for(var i in especiales){

		     if(key == especiales[i]){
		  			tecla_especial = true;
		  			break;
		     } 

		 }
 
        if(letras.indexOf(tecla)==-1 && !tecla_especial)
     		return false;

}
 function solonumeros(e){

		 key = e.keyCode || e.which;
		 tecla = String.fromCharCode(key).toLowerCase();
		 letras = "1234567890";
		 especiales = [8,39];

		 tecla_especial = false
		 for(var i in especiales){

		     if(key == especiales[i]){
		  			tecla_especial = true;
		  			break;
		     } 

		 }
 
        if(letras.indexOf(tecla)==-1 && !tecla_especial)
     		return false;

}

function tal(){
    
    if($("#quantity").val() != "" )
        {   
            $("#quantity").parents('label:first, div:first').find('.has-error').remove();
            $("button").attr("type","submit");
            
            if(parseInt($("#stock").val()) <  parseInt($("#quantity").val()))
            {
                $("#quantity").parents('.form-group:first').addClass('has-error');
                
                $("#quantity").parents('label:first').length ? $("#quantity").parents('label:first') : $("#quantity").parents('div:first').append('<p class="has-error help-block">No hay suficiente material en stock</p>');
                
                $("button").attr("type","button");
            }
        }
}


function changes() {
  var ab = document.getElementById("absolute").value;
  if (ab == 1) {
    document.getElementById('muchoprecio').readOnly = false;
    
  }
  if (ab == 0) {
   document.getElementById('muchoprecio').readOnly = true;
   
  }
}


function populate(o,bandera)
  {
  	$("#select2_11").parent("div").find("ul > li").remove();
  	$("#select2_11 > .filter-option").html(null);
  	//alert($(padre).children("ul").html());
	$.get("/company/ajaxcomp","rep="+o, function(respuesta){
	   results = respuesta.split("|");

       resultsseller = results[0].split(",");
       resultsclient = results[1].split(",");
      
	   var opcion2 = opcion1 = ' ';

		   for(var i=0;i<resultsseller.length;i++)
		   {
			 if(resultsseller[i] != '')
				opcion2 = opcion2+'<option value="'+resultsseller[i]+'" selected>'+resultsseller[i]+'</option>';
		   }
	

		   for(var i=0;i<resultsclient.length-1;i++)
		   {
				rest = resultsclient[i].split("-");
				opcion1 = opcion1+'<option value="'+rest[0]+'" selected >'+rest[1]+'</option>';
		   }
	   if(bandera == 2)
	   {
	   		$("#select2_4 > .filter-option").html("");
	   		$("#select2_14 > .filter-option").html("");
	   }
	 
	   
	   $("#select2_4").html(opcion1);
	   $("#select2_14").html(opcion2);
    
	});
  }


/*function validarTiempos2(){ 

    if(parseInt($("#expiration_time").val()) < parseInt($("#delivery_time").val()))
    {
        $("#delivery_time").parents('label:first, div:first').find('.has-error').remove();        

        $("#delivery_time").parents('.form-group:first').addClass('has-error');
                
        $("#delivery_time").parents('label:first').length ? $("#delivery_time").parents('label:first') : $("#delivery_time").parents('div:first').append('<p class="has-error help-block">El tiempo de entrega debe ser menor que el tiempo de expiración</p>');
        
        return false;
    }else{
        return true;
    }
}*/



function contacto(valor){	
  	
	
	$.post("/cliente",{a:valor}, function (data){

		var record = eval(data);
		var opcion = "";

		for(var i =0; i < record.length; i++)
		{
			opcion = opcion+'<option value="'+record[i].id+'" selected >'+record[i].name_contact+'</option>';
		}
		
		$("#select2_11").html(opcion);

	});

}


function number_format(number, decimals, dec_point, thousands_sep) {  

  number = (number + '')
    .replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + (Math.round(n * k) / k)
        .toFixed(prec);
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
    .split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '')
    .length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1)
      .join('0');
  }
  return s.join(dec);
}

function obtenerValorMoneda(){

	$.post("/valorMoneda",{data:$("#select2_12").val()}, function(respuesta){

		var array = eval(respuesta);
		var unitprice = $("#unitprice").val();
    	var quantity = $("#quantity").val(); 	    
    	$("#totalprice").val(array.tipoMoneda+" "+number_format((unitprice * quantity),2,',','.'));
    	$("#oculto").val(unitprice * quantity);

	});

}
 function bloqueodepunto(e){

		 key = e.keyCode || e.which;
		 tecla = String.fromCharCode(key).toLowerCase();
		 letras = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890";
		 especiales = [8,39];

		 tecla_especial = false
		 for(var i in especiales){

		     if(key == especiales[i]){
		  			tecla_especial = true;
		  			break;
		     } 

		 }
 
        if(letras.indexOf(tecla)==-1 && !tecla_especial)
     		return false;

}

function calcularEdad()
{
    var fecha = document.getElementById("inputmask-date-2").value;

        // Si la fecha es correcta, calculamos la edad
        var values = fecha.split("/");
        var dia = values[0];
        var mes = values[1];
        var ano = values[2];
 
        // cogemos los valores actuales
        var fecha_hoy = new Date();
        var ahora_ano = fecha_hoy.getFullYear();
        var ahora_mes = fecha_hoy.getMonth()+1;
        var ahora_dia = fecha_hoy.getDate();
 
        // realizamos el calculo
        var edad = ahora_ano - ano;
        if ( ahora_mes < mes )
        {
            edad--;
        }
        if ((mes == ahora_mes) && (ahora_dia < dia))
        {
            edad--;
        }

    document.getElementById("age").value = edad;
}

function calcularAnios()
{
    var fecha = document.getElementById("inputmask-date-1").value;

        // Si la fecha es correcta, calculamos la edad
        var values = fecha.split("/");
        var dia = values[0];
        var mes = values[1];
        var ano = values[2];
 
        // cogemos los valores actuales
        var fecha_hoy = new Date();
        var ahora_ano = fecha_hoy.getFullYear();
        var ahora_mes = fecha_hoy.getMonth()+1;
        var ahora_dia = fecha_hoy.getDate();
 
        // realizamos el calculo
        var edad = ahora_ano - ano;
        if ( ahora_mes < mes )
        {
            edad--;
        }
        if ((mes == ahora_mes) && (ahora_dia < dia))
        {
            edad--;
        }

    document.getElementById("years_service").value = edad;
}

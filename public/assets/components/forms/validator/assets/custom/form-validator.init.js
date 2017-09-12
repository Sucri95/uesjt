/* ==========================================================
 * QuickAdmin v2.0.0
 * form_validator.js
 * 
 * http://www.mosaicpro.biz
 * Copyright MosaicPro
 *
 * Built exclusively for sale @Envato Marketplaces
 * ========================================================== */ 

$.validator.setDefaults(
{
	showErrors: function(map, list) 
	{
		this.currentElements.parents('label:first, div:first').find('.has-error').remove();
		this.currentElements.parents('.form-group:first').removeClass('has-error');
		
		$.each(list, function(index, error) 
		{
			var ee = $(error.element);
			var eep = ee.parents('label:first').length ? ee.parents('label:first') : ee.parents('div:first');
			
			ee.parents('.form-group:first').addClass('has-error');
			eep.find('.has-error').remove();
			eep.append('<p class="has-error help-block">' + error.message + '</p>');
		});
		//refreshScrollers();
	}
});

$(function()
{
	// validate signup form on keyup and submit
	$("#validateSubmitForm").validate({
		rules: {
			//User's Validators
			name:"required",
			lastname: "required",
			ci:"required",
			address:"required",
			phone:"required",
			gender:"required",
			birthdate:"required",
			er_number:"required",
			allergies:"required",
			medicines:"required",
			back_medical:"required",
			password: {
				required: true,
				minlength: 5,
				maxlength: 15
			},
			confirm_password: {
				required: true,
				minlength: 5,
				maxlength: 15,
				equalTo: "#password"
			},
				password2: {
				required: false,
				minlength: 5,
				maxlength: 15
			},
			confirm_password2: {
				required: false,
				minlength: 5,
				maxlength: 15,
				equalTo: "#password2"
			},
			email: {
				required: true,
				email: true
			},
			topic: {
				required: "#newsletter:checked",
				minlength: 2
			},
			agree: "required"
		},
		messages: {
			name:"Ingrese su nombre",
			ci:"Ingrese una cédula de identidad válida",
			address:"Ingrese su dirección",
			gender:"Indentifique su género/sexo",
			birthdate:"Ingrese su fecha de nacimiento",
			phone:"Ingrese su número de teléfono",
			email:"Ingrese un correo electrónico válido",
			lastname: "Ingrese su apellido",
			er_number:"Indique un número de emergencia",
			allergies:"Indique si sufre de alguna alergia o en su defecto indique lo contrario",
			medicines:"Indique los medicamentos que se le pueden suministrar al alumno en caso de emergencia",
			back_medical:"Indique los antecedentes médicos relevantes en caso de emergencia",
			password: {
				required: "Porfavor Ingrese una contraseña",
				minlength: "Tu contraseña debe tener al menos 5 caracteres de largo",
				maxlength: "Tu contraseña no puede tener más de 15 caracteres"
			},
			confirm_password: {
				required: "Porfavor Ingrese una contraseña",
				minlength: "Tu contraseña debe tener al menos 5 caracteres de largo",
				maxlength: "Tu contraseña no puede tener más de 15 caracteres",
				equalTo: "las contraseñas no coinciden"
			},
				password2: {
				required: "Porfavor Ingrese una contraseña",
				minlength: "Tu contraseña debe tener al menos 5 caracteres de largo",
				maxlength: "Tu contraseña no puede tener más de 15 caracteres"
			},
			confirm_password2: {
				required: "Porfavor Ingrese una contraseña",
				minlength: "Tu contraseña debe tener al menos 5 caracteres de largo",
				maxlength: "Tu contraseña no puede tener más de 15 caracteres",
				equalTo: "las contraseñas no coinciden"
			},
			agree: "Please accept our policy"
		}
	});

	// propose username by combining first- and lastname
	$("#username").focus(function() {
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		if(firstname && lastname && !this.value) {
			this.value = firstname + "." + lastname;
		}
	});

	//code to hide topic selection, disable for demo
	var newsletter = $("#newsletter");
	// newsletter topics are optional, hide at first
	var inital = newsletter.is(":checked");
	var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
	var topicInputs = topics.find("input").attr("disabled", !inital);
	// show when newsletter is checked
	newsletter.click(function() {
		topics[this.checked ? "removeClass" : "addClass"]("gray");
		topicInputs.attr("disabled", !this.checked);
	});
});
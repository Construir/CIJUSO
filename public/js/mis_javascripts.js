	/*
	function validarNuevoAbogado(){		
	
		var nombreAbogado = $('#nombreAbogado').val();
		var apellidoAbogado = $('#apellidoAbogado').val();
		var cuitAbogado = $('#cuitAbogado').val();		
		var emailAbogado = $('#emailAbogado').val();
		var celularAbogado = $('#celularAbogado').val();
		var checkboxAcepto = $('#checkboxAcepto').val();
						
		var validadoOK = true;
		
		if ((nombreAbogado.length  == 0) || (apellidoAbogado.length == 0) || (cuitAbogado.length == 0) || (emailAbogado.length == 0) || (celularAbogado == 0)){
				
				if (nombreAbogado.length == 0){agregaMensajeValidacion($("#nombreAbogado"), "Debe ingresar nombre");}
				if (apellidoAbogado.length == 0){agregaMensajeValidacion($("#apellidoAbogado"), "Debe ingresar un apellido");}									
				if (cuitAbogado.length == 0){agregaMensajeValidacion($("#cuitAbogado"), "Debe ingresar un cuit");}				
				if (emailAbogado.length == 0){agregaMensajeValidacion($("#emailAbogado"), "Debe ingresar un E-mail");}							
				if (celularAbogado == 0){agregaMensajeValidacion($("#celularAbogado"), "Debe ingresar un celular");}				
				if (horarioDomicilio.length == 0){agregaMensajeValidacion($("#horarioDomicilio"), "Debe ingresar un horario");}											
				
				validadoOK = false;					
		}
		if(!validaCuitCuil(cuitAbogado)){			
			
			agregaMensajeValidacion($("#cuitAbogado"), "Debe ingresar una CUIT válida");	
			validadoOK = false;
	
		}
		if(!validaEmail(emailAbogado)){
			agregaMensajeValidacion($('#emailAbogado'), "Debe ingresar un E-mail válido");	
			validadoOK = false;				
		}
		//validamos que tenga al menos un domicilio cargado
		padre = document.getElementById('lista_de_domicilios');	
			
		if(padre.children.length < 1){
			$('#mensaje_ya_existe').html('Debe ingresar al menos un domicilio.');
			$('#modal_mensaje_ya_existe').modal('show');
			validadoOK = false;	
		}
	
		return validadoOK;
	}
	*/
	function validarExcusacion(){
		
		var desplegableestadoconsulta = $("#desplegableestadoconsulta").val();
		var desplegablemotivoexcusacion = $("#desplegablemotivoexcusacion").val();
				
		validadoOK = true;
			
		if(desplegableestadoconsulta == 5){
			if (desplegableestadoconsulta == 0){
				
				if (desplegableestadoconsulta == 0){agregaMensajeValidacion($("#desplegableestadoconsulta"), "Debe seleccionar un tipo");}			
											
				validadoOK = false;	
			}
		}else{
			if ((desplegableestadoconsulta == 0) || (desplegablemotivoexcusacion == 0)){
				
				if (desplegableestadoconsulta == 0){agregaMensajeValidacion($("#desplegableestadoconsulta"), "Debe seleccionar un tipo");}
				if (desplegablemotivoexcusacion == 0){agregaMensajeValidacion($("#desplegablemotivoexcusacion"), "Debe seleccionar un motivo");}
				
											
				validadoOK = false;	
			}
		}
		return validadoOK;
		
	}
	function validarNuevaSuspencion(){
		
		var tipo_movimiento = $("#tipo_movimiento").val();
		var fechaInicioMovimiento = $("#fechaInicioMovimiento").val();
		var fechaFinMovimiento = $("#fechaFinMovimiento").val();
		var motivoMovimiento = $("#motivoMovimiento").val();
		
		validadoOK = true;
		
		if(fechaFinMovimiento.length > 0){

			if (fechaFinMovimiento < fechaInicioMovimiento){							
					
					agregaMensajeValidacion($("#fechaFinMovimiento"), "Debe ingresar una fecha fin superior a fecha inicio");												
					
					validadoOK = false;					
			}

		}
		
		if ((fechaInicioMovimiento.length == 0) || (motivoMovimiento.length == 0) || (tipo_movimiento == 0)){
			
			if (tipo_movimiento == 0){agregaMensajeValidacion($("#tipo_movimiento"), "Debe ingresar un tipo de movimiento");}
			if (fechaInicioMovimiento.length == 0){agregaMensajeValidacion($("#fechaInicioMovimiento"), "Debe ingresar una fecha de inicio");}
			if (motivoMovimiento.length == 0){agregaMensajeValidacion($("#motivoMovimiento"), "Debe ingresar un motivo");}
										
			validadoOK = false;	
		}
	
		return validadoOK;
		
	}
	function validarNuevaLicencia(){
		
		var matriculacion = $('#matriculacion').val();
		var fechaInicio = $('#fechaInicio').val();
		var fechaFin = $('#fechaFin').val();
		var motivo = $('#motivo').val();
		
		var validadoOK = true;
		
		if(fechaFin.length > 0){

			if (fechaFin < fechaInicio){							
					
					agregaMensajeValidacion($("#fechaFin"), "Debe ingresar una fecha fin superior a fecha inicio");												
					
					validadoOK = false;					
			}

		}
		if ((matriculacion == 0) || (fechaInicio.length == 0) || (motivo.length == 0)){				
						
				if (matriculacion == 0){agregaMensajeValidacion($("#matriculacion"), "Seleccione para que matriculación quiere la licencia");}			
				if (fechaInicio == 0){agregaMensajeValidacion($("#fechaInicio"), "Debe ingresar una fecha de inicio");}			
				if (motivo.length == 0){agregaMensajeValidacion($("#motivo"), "Debe ingresar un motivo");}										
				
				validadoOK = false;					
		}
		
	
		return validadoOK;
	}
	function validarContrasenia(){
		
		var contrasena = $("#passworcambiapassword").val();
		var confirmarpassword = $("#confirmarcambiapassword").val();
		//console.log(contrasena,confirmarpassword);
		validadoOK = true;
		
		if ((contrasena.length == 0) || (confirmarpassword.length == 0)){
			
			if (contrasena.length == 0){agregaMensajeValidacion($("#passworcambiapassword"), "Debe ingresar una Contraseña");}
			if (confirmarpassword.length == 0){agregaMensajeValidacion($("#confirmarcambiapassword"), "Debe ingresar una Contraseña");}
										
			validadoOK = false;	
		}
		if ((contrasena !==null) && (confirmarpassword !==null)){
			
			if((contrasena.length < 6) || (contrasena.length > 30)){						
				agregaMensajeValidacion($("#passworcambiapassword"), "La Contraseña debe tener entre 6 y 30 caracteres");						
			validadoOK = false;
			}
			if((confirmarpassword.length < 6) || (confirmarpassword.length > 30)){						
				agregaMensajeValidacion($("#confirmarcambiapassword"), "La confirmación de Contraseña debe tener entre 6 y 30 caracteres");						
			validadoOK = false;
			}
			if(contrasena !== confirmarpassword){						
				agregaMensajeValidacion($("#confirmarcambiapassword"), "La Confirmación de Contraseña, debe ser igual a la Contraseña");
			validadoOK = false;
			}				
		}
		return validadoOK;
	}
	function validarDatosPersonales(){
				
		var apellido_datos_personales = $("#apellido_datos_personales").val();
		var nombre_datos_personales = $("#nombre_datos_personales").val();
		var usuario = $("#nombre_usuario_datos_personales").val();
		var celular = $("#celular_datos_personales").val();
		var telefono = $("#telefono_datos_personales").val();
		var email = $("#email_datos_personales").val();
		
		validadoOK = true;
		
		if ((apellido_datos_personales.length == 0) || (nombre_datos_personales.length == 0) || (email.length == 0) || (usuario.length == 0) || (celular.length == 0) || (telefono.length == 0)){
			
			if (apellido_datos_personales.length == 0){agregaMensajeValidacion($("#apellido_datos_personales"), "Debe ingresar un Apellido");}
			if (nombre_datos_personales.length == 0){agregaMensajeValidacion($("#nombre_datos_personales"), "Debe ingresar un Nombre");}
			if (email.length == 0){agregaMensajeValidacion($("#email_datos_personales"), "Debe ingresar un E-mail");}	
			if (usuario.length == 0){agregaMensajeValidacion($("#nombre_usuario_datos_personales"), "Debe ingresar un Nombre de Usuario");}	
			if (celular.length == 0){agregaMensajeValidacion($("#celular_datos_personales"), "Debe ingresar un Celular");}	
			if (telefono.length == 0){agregaMensajeValidacion($("#telefono_datos_personales"), "Debe ingresar un Teléfono");}	
										
			validadoOK = false;	
		}
		if(!validaEmail(email)){
			agregaMensajeValidacion($('#email_datos_personales'), "Debe ingresar un E-mail válido");	
			validadoOK = false;				
		}
		return validadoOK;
	}
	function validarNuevoSorteo(){		
				
		var tipoconsulta = $('#tipoconsulta').val();		
		var provincia = $('#provincia').val();
		var partidoDomicilio = $('#partidoDomicilio').val();
		var localidadDomicilio = $('#localidadDomicilio').val();
		var nombreRequirente = $('#nombreRequirente').val();
		var apellidoRequirente = $('#apellidoRequirente').val();
		var emailRequirente = $('#emailRequirente').val();	
		var telefonoRequirente = $('#telefonoRequirente').val();
		var celularRequirente = $('#celularRequirente').val();
	
						
		var validadoOK = true;
		
		if((telefonoRequirente.length == 0) && (celularRequirente.length == 0)){
			$('#mensaje').html('Debe Ingresar al menos un teléfono.');	
			$('#modal_mensaje').modal('show'); 
			validadoOK = false;	
		}
		
		if ((tipoconsulta == 0) || (provincia == 0) || (partidoDomicilio == 0) || (localidadDomicilio == 0) || (nombreRequirente.length == 0) || (apellidoRequirente.length == 0) || (emailRequirente.length == 0)){
				
						
				if (tipoconsulta == 0){agregaMensajeValidacion($("#tipoconsulta"), "Debe seleccionar tipo de consulta");}
				if (provincia == 0){agregaMensajeValidacion($("#provincia"), "Debe seleccionar una provincia");}
				if (partidoDomicilio == 0){agregaMensajeValidacion($("#partidoDomicilio"), "Debe seleccionar un domicilio");}
				if (localidadDomicilio == 0){agregaMensajeValidacion($("#localidadDomicilio"), "Debe seleccionar una localidad");}				
				if (nombreRequirente.length == 0){agregaMensajeValidacion($("#nombreRequirente"), "Debe ingresar un nombre");}
				if (apellidoRequirente.length == 0){agregaMensajeValidacion($("#apellidoRequirente"), "Debe ingresar un apellido");}				
				if (emailRequirente.length == 0){agregaMensajeValidacion($("#emailRequirente"), "Debe ingresar un E-mail");}				
				//if (telefonoRequirente == 0){agregaMensajeValidacion($("#telefonoRequirente"), "Debe seleccionar una localidad");}								
				//if (celularRequirente.length == 0){agregaMensajeValidacion($("#celularRequirente"), "Debe ingresar un telefono");}
													
				
				validadoOK = false;					
		}
		if(!validaEmail(emailRequirente)){
			agregaMensajeValidacion($('#emailRequirente'), "Debe ingresar un E-mail válido");	
			validadoOK = false;				
		}
	
		return validadoOK;
	}
	function validarNuevoDomicilio(){		
	
		var tomoAbogado = $('#tomoAbogado').val();
		var folioAbogado = $('#folioAbogado').val();
		var matriculaAbogado = $('#matriculaAbogado').val();
		var colegioAbogado = $('#colegioAbogado').val();			
		var emailEstudio = $('#emailEstudio').val();		
		var provincia = $('#provincia').val();
		var partidoDomicilio = $('#partidoDomicilio').val();
		var localidadDomicilio = $('#localidadDomicilio').val();
		var calleDomicilio = $('#calleDomicilio').val();
		var numeroDomicilio = $('#numeroDomicilio').val();
		//var pisoDomicilio = $('#pisoDomicilio').val();
		//var oficinaDomicilio = $('#oficinaDomicilio').val();		
		var telefonoEstudio = $('#telefonoEstudio').val();
		var horarioDomicilio = $('#horarioDomicilio').val();
	
						
		var validadoOK = true;
		
		if ($('#matriculaAbogado').prop('disabled')){
			if((tomoAbogado.length == 0) || (folioAbogado.length == 0)){
				if (tomoAbogado.length == 0){agregaMensajeValidacion($("#tomoAbogado"), "Debe ingresar un tomo");}
				if (folioAbogado.length == 0){agregaMensajeValidacion($("#folioAbogado"), "Debe ingresar un folio");}
				validadoOK = false;					
			}
		}
	
		if ($('#tomoAbogado').prop('disabled')){
			if(matriculaAbogado.length == 0){
				agregaMensajeValidacion($("#matriculaAbogado"), "Debe ingresar una matrícula"); 
				validadoOK = false;	
			}
		}

		if ((colegioAbogado == 0) || (emailEstudio.length == 0) || (calleDomicilio.length == 0) || (numeroDomicilio.length == 0) 
			|| (provincia == 0) || (partidoDomicilio == 0) || (localidadDomicilio == 0) || (celularAbogado == 0) || (telefonoEstudio.length == 0) || (horarioDomicilio.length == 0)){
				
						
				if (colegioAbogado == 0){agregaMensajeValidacion($("#colegioAbogado"), "Debe seleccionar un colegio");}			
				if (emailEstudio.length == 0){agregaMensajeValidacion($("#emailEstudio"), "Debe ingresar un E-mail");}
				if (calleDomicilio.length == 0){agregaMensajeValidacion($("#calleDomicilio"), "Debe ingresar una calle");}				
				if (numeroDomicilio.length == 0){agregaMensajeValidacion($("#numeroDomicilio"), "Debe ingresar un número");}
				//if (pisoDomicilio.length == 0){agregaMensajeValidacion($("#pisoDomicilio"), "Debe ingresar un piso");}				
				//if (oficinaDomicilio.length == 0){agregaMensajeValidacion($("#oficinaDomicilio"), "Debe ingresar un domicilio");}
				if (provincia == 0){agregaMensajeValidacion($("#provincia"), "Debe seleccionar una provincia");}				
				if (partidoDomicilio == 0){agregaMensajeValidacion($("#partidoDomicilio"), "Debe seleccionar un partido");}
				if (localidadDomicilio == 0){agregaMensajeValidacion($("#localidadDomicilio"), "Debe seleccionar una localidad");}								
				if (telefonoEstudio.length == 0){agregaMensajeValidacion($("#telefonoEstudio"), "Debe ingresar un telefono");}
				if (horarioDomicilio.length == 0){agregaMensajeValidacion($("#horarioDomicilio"), "Debe ingresar un horario");}											
				
				validadoOK = false;					
		}
		if(!validaEmail(emailEstudio)){
			agregaMensajeValidacion($('#emailEstudio'), "Debe ingresar un E-mail válido");	
			validadoOK = false;				
		}		
	
		return validadoOK;
	}
	function validarEditarDomicilio(){		

		var emailEstudio = $('#emailEstudioEditar').val();				
		var telefonoEstudio = $('#telefonoEstudioEditar').val();
		var horarioDomicilio = $('#horarioDomicilioEditar').val();	
						
		var validadoOK = true;

		if ((emailEstudio.length == 0) || (telefonoEstudio.length == 0) || (horarioDomicilio.length == 0)){						
						
			if (emailEstudio.length == 0){agregaMensajeValidacion($("#emailEstudioEditar"), "Debe ingresar un E-mail");}													
			if (telefonoEstudio.length == 0){agregaMensajeValidacion($("#telefonoEstudioEditar"), "Debe ingresar un telefono");}
			if (horarioDomicilio.length == 0){agregaMensajeValidacion($("#horarioDomicilioEditar"), "Debe ingresar un horario");}											
				
				validadoOK = false;					
		}
		if(!validaEmail(emailEstudio)){
			agregaMensajeValidacion($('#emailEstudioEditar'), "Debe ingresar un E-mail válido");	
			validadoOK = false;				
		}		
	
		return validadoOK;
	}
	function validarMovimiento(){		

		var titulo = $('#titulo').val();				
		var fecha_nuevo_movimiento = $('#fecha_nuevo_movimiento').val();		
		var desplegable_tipo_movimiento = $('#desplegable_tipo_movimiento').val();		
		var descripcion = $('#descripcion').val();		
						
		var validadoOK = true;

		if ((titulo.length == 0) || (fecha_nuevo_movimiento.length == 0) || (desplegable_tipo_movimiento == 0) || (descripcion.length == 0)){						
						
			if (titulo.length == 0){agregaMensajeValidacion($("#titulo"), "Debe ingresar un título para el tramite");}													
			if (fecha_nuevo_movimiento.length == 0){agregaMensajeValidacion($("#fecha_nuevo_movimiento"), "Debe ingresar una fecha");}
			if (desplegable_tipo_movimiento == 0){agregaMensajeValidacion($("#desplegable_tipo_movimiento"), "Debe ingresar un tipo");}
			if (descripcion.length == 0){agregaMensajeValidacion($("#descripcion"), "Debe ingresar una descripción");}
						
			validadoOK = false;					
		}		
	
		return validadoOK;
	}		
	function validarEditarMovimiento(){		

		var editar_titulo = $('#editar_titulo').val();				
		var fecha_nuevo_movimiento_editar = $('#fecha_nuevo_movimiento_editar').val();		
		var desplegable_tipo_movimiento_editar = $('#desplegable_tipo_movimiento_editar').val();		
		var editar_descripcion = $('#editar_descripcion').val();		
						
		var validadoOK = true;

		if ((editar_titulo.length == 0) || (fecha_nuevo_movimiento_editar.length == 0) || (desplegable_tipo_movimiento_editar == 0) || (editar_descripcion.length == 0)){						
						
			if (editar_titulo.length == 0){agregaMensajeValidacion($("#editar_titulo"), "Debe ingresar un título para el tramite");}													
			if (fecha_nuevo_movimiento_editar.length == 0){agregaMensajeValidacion($("#fecha_nuevo_movimiento_editar"), "Debe ingresar una fecha");}
			if (desplegable_tipo_movimiento_editar == 0){agregaMensajeValidacion($("#desplegable_tipo_movimiento_editar"), "Debe ingresar un tipo");}
			if (editar_descripcion.length == 0){agregaMensajeValidacion($("#editar_descripcion"), "Debe ingresar una descripción");}
						
			validadoOK = false;					
		}
	
		return validadoOK;
	}	
	function validarComisionMedica(){		

		var desplegable_comision_medica = $('#desplegable_comision_medica').val();				
							
		var validadoOK = true;

		if (desplegable_comision_medica == 0){						
						
			if (desplegable_comision_medica == 0){agregaMensajeValidacion($("#desplegable_comision_medica"), "Debe seleccionar una comisión médica");}													
							
			validadoOK = false;					
		}
	
		return validadoOK;
	}
	function validarDomicilio(){		

		var emailEstudio = $('#emailEstudio').val();
		var calleDomicilio = $('#calleDomicilio').val();
		var numeroDomicilio = $('#numeroDomicilio').val();
		var partidoDomicilio = $('#partidoDomicilio').val();
		var localidadDomicilio = $('#localidadDomicilio').val();					
		var telefonoEstudio = $('#telefonoEstudio').val();
		var horarioDomicilio = $('#horarioDomicilio').val();	
						
		var validadoOK = true;

		if ((emailEstudio.length == 0) || (calleDomicilio.length == 0) || (numeroDomicilio.length == 0) 
			|| (telefonoEstudio.length == 0) || (horarioDomicilio.length == 0)){
				
						
						
				if (emailEstudio.length == 0){agregaMensajeValidacion($("#emailEstudio"), "Debe ingresar un E-mail");}
				if (calleDomicilio.length == 0){agregaMensajeValidacion($("#calleDomicilio"), "Debe ingresar una calle");}				
				if (numeroDomicilio.length == 0){agregaMensajeValidacion($("#numeroDomicilio"), "Debe ingresar un número");}
				if (partidoDomicilio == 0){agregaMensajeValidacion($("#partidoDomicilio"), "Debe seleccionar un partido");}				
				if (localidadDomicilio == 0){agregaMensajeValidacion($("#localidadDomicilio"), "Debe seleccionar una localidad");}										
				if (telefonoEstudio.length == 0){agregaMensajeValidacion($("#telefonoEstudio"), "Debe ingresar un telefono");}
				if (horarioDomicilio.length == 0){agregaMensajeValidacion($("#horarioDomicilio"), "Debe ingresar un horario");}											
				
				validadoOK = false;					
		}
		if(!validaEmail(emailEstudio)){
			agregaMensajeValidacion($('#emailEstudio'), "Debe ingresar un E-mail válido");	
			validadoOK = false;				
		}		
	
		return validadoOK;
	}
	function validarNuevoAbogado(){	
		
		var nombreAbogado = $('#nombreAbogado').val();
		var apellidoAbogado = $('#apellidoAbogado').val();
		var tomoAbogado = $('#tomoAbogado').val();
		var folioAbogado = $('#folioAbogado').val();
		var colegioAbogado = $('#colegioAbogado').val();
		var matriculaAbogado = $('#matriculaAbogado').val();
		var cuitAbogado = $('#cuitAbogado').val();		
		//var emailAbogado = $('#emailAbogado').val();
		var calleDomicilio = $('#calleDomicilio').val();
		var numeroDomicilio = $('#numeroDomicilio').val();
		//var pisoDomicilio = $('#pisoDomicilio').val();
		//var oficinaDomicilio = $('#oficinaDomicilio').val();
		var provincia = $('#provincia').val();
		var partidoDomicilio = $('#partidoDomicilio').val();
		var localidadDomicilio = $('#localidadDomicilio').val();
		//var celular = $('#celularAbogado').val();
		//var telefono = $('#telefono').val();		
		var emailEstudio = $('#emailEstudio').val();		
		var horarioDomicilio = $('#horarioDomicilio').val();
		var telefonoEstudio = $('#telefonoEstudio').val();
						
		var validadoOK = true;
		
		if ($('#matriculaAbogado').prop('disabled')){
			if((tomoAbogado.length == 0) || (folioAbogado.length == 0)){
				if (tomoAbogado.length == 0){agregaMensajeValidacion($("#tomoAbogado"), "Debe ingresar un tomo");}
				if (folioAbogado.length == 0){agregaMensajeValidacion($("#folioAbogado"), "Debe ingresar un folio");}
				validadoOK = false;					
			}
		}
	
		if ($('#tomoAbogado').prop('disabled')){
			if(matriculaAbogado.length == 0){
				agregaMensajeValidacion($("#matriculaAbogado"), "Debe ingresar una matrícula"); 
				validadoOK = false;	
			}
		}
		/*
		if((celular.length == 0) && (telefono.length == 0)){
			$('#mensaje_cliente').html('Debe Ingresar al menos un teléfono.');	
			$('#modal_mensaje').modal('show'); 
			validadoOK = false;	
		}
		*/
		if ((nombreAbogado.length  == 0) || (apellidoAbogado.length == 0) || (colegioAbogado == 0) || (cuitAbogado.length == 0)
			|| (calleDomicilio.length == 0) || (numeroDomicilio.length == 0) 
			|| (provincia == 0) || (partidoDomicilio == 0) || (telefonoEstudio.length == 0)
			|| (localidadDomicilio == 0) || (horarioDomicilio.length == 0) || (emailEstudio.length == 0)){
				
				if (nombreAbogado.length == 0){agregaMensajeValidacion($("#nombreAbogado"), "Debe ingresar nombre");}
				if (apellidoAbogado.length == 0){agregaMensajeValidacion($("#apellidoAbogado"), "Debe ingresar un apellido");}							
				//if (tomoAbogado.length == 0){agregaMensajeValidacion($("#tomoAbogado"), "Debe ingresar un tomo");}
				//if (folioAbogado.length == 0){agregaMensajeValidacion($("#folioAbogado"), "Debe ingresar un folio");}				
				if (colegioAbogado == 0){agregaMensajeValidacion($("#colegioAbogado"), "Debe seleccionar un colegio");}
				//if (matriculaAbogado.length == 0){agregaMensajeValidacion($("#matriculaAbogado"), "Debe ingresar una matrícula");}				
				if (cuitAbogado.length == 0){agregaMensajeValidacion($("#cuitAbogado"), "Debe ingresar un cuit");}				
				//if (emailAbogado.length == 0){agregaMensajeValidacion($("#emailAbogado"), "Debe ingresar un E-mail");}
				if (calleDomicilio.length == 0){agregaMensajeValidacion($("#calleDomicilio"), "Debe ingresar una calle");}				
				if (numeroDomicilio.length == 0){agregaMensajeValidacion($("#numeroDomicilio"), "Debe ingresar un número");}
				//if (pisoDomicilio.length == 0){agregaMensajeValidacion($("#pisoDomicilio"), "Debe ingresar un piso");}				
				//if (oficinaDomicilio.length == 0){agregaMensajeValidacion($("#oficinaDomicilio"), "Debe ingresar un domicilio");}
				if (provincia == 0){agregaMensajeValidacion($("#provincia"), "Debe seleccionar una provincia");}				
				if (partidoDomicilio == 0){agregaMensajeValidacion($("#partidoDomicilio"), "Debe seleccionar un partido");}
				if (localidadDomicilio == 0){agregaMensajeValidacion($("#localidadDomicilio"), "Debe seleccionar una localidad");}				
				if (emailEstudio == 0){agregaMensajeValidacion($("#emailEstudio"), "Debe ingresar un E-mail");}				
				if (telefonoEstudio == 0){agregaMensajeValidacion($("#telefonoEstudio"), "Debe ingresar un Teléfono");}				
				//if (celular.length == 0){agregaMensajeValidacion($("#celular"), "Debe ingresar celular de contacto");}
				//if (telefonoConsultante1.length == 0){agregaMensajeValidacion($("#telefonoConsultante1"), "Debe ingresar un telefono");}				
				//if (telefonoConsultante2.length == 0){agregaMensajeValidacion($("#telefonoConsultante2"), "Debe ingresar un telefono");}
				if (horarioDomicilio.length == 0){agregaMensajeValidacion($("#horarioDomicilio"), "Debe ingresar un horario");}											
				
				validadoOK = false;					
		}
		if((!validaCuitCuil(cuitAbogado)) || (cuitAbogado.length == 0)){			
			
			agregaMensajeValidacion($("#cuitAbogado"), "Debe ingresar un CUIT válido");	
			validadoOK = false;
	
		}
		/*
		if(!validaEmail(emailAbogado)){
			agregaMensajeValidacion($('#emailAbogado'), "Debe ingresar un E-mail válido");	
			validadoOK = false;				
		}
		*/
		if(!validaEmail(emailEstudio)){
			agregaMensajeValidacion($('#emailEstudio'), "Debe ingresar un E-mail válido");	
			validadoOK = false;				
		}		
	
		return validadoOK;
	}
	function validarEditarUsuario(){	
		
		var nombre_usuarioEditar = $('#nombre_usuarioEditar').val();
		var apellido_usuarioEditar = $('#apellido_usuarioEditar').val();
		var email_usuarioEditar = $('#email_usuarioEditar').val();
		var cuit_usuarioEditar = $('#cuit_usuarioEditar').val();		
		var departamento_usuarioEditar = $('#departamento_usuarioEditar').val();							
		var nombre_usuario_de_usuarioEditar = $('#nombre_usuario_de_usuarioEditar').val();
		var contrasenia = $('#contrasenia_usuarioEditar').val();
						
		var validadoOK = true;		
	
		if ((nombre_usuarioEditar.length  == 0) || (apellido_usuarioEditar.length == 0) || (departamento_usuarioEditar == 0) || (nombre_usuario_de_usuarioEditar.length == 0) || (contrasenia.length == 0)){
				
				if (nombre_usuarioEditar.length == 0){agregaMensajeValidacion($("#nombre_usuarioEditar"), "Debe ingresar nombre");}
				if (apellido_usuarioEditar.length == 0){agregaMensajeValidacion($("#apellido_usuarioEditar"), "Debe ingresar un apellido");}								
				if (departamento_usuarioEditar == 0){agregaMensajeValidacion($("#departamento_usuarioEditar"), "Debe seleccionar un colegio");}							
				if (nombre_usuario_de_usuarioEditar.length == 0){agregaMensajeValidacion($("#nombre_usuario_de_usuarioEditar"), "Debe ingresar un usuario");}				
				if (contrasenia.length == 0){agregaMensajeValidacion($("#contrasenia_usuarioEditar"), "Debe ingresar una contraseña");}												
				
				validadoOK = false;					
		}
		if(cuit_usuarioEditar.length > 0){
			
			if(!validaCuitCuil(cuit_usuarioEditar)){			
				
				agregaMensajeValidacion($("#cuit_usuarioEditar"), "Debe ingresar un CUIT válido");	
				validadoOK = false;
		
			}
		}
		if(email_usuarioEditar.length > 0){
			
			if(!validaEmail(email_usuarioEditar)){
				
				agregaMensajeValidacion($('#email_usuarioEditar'), "Debe ingresar un E-mail válido");	
				validadoOK = false;	
				
			}			
		}
		if(contrasenia.length < 6){
						
			agregaMensajeValidacion($('#contrasenia_usuarioEditar'), "La contraseña debe ser mayor a 6 caracteres");	
			validadoOK = false;	
					
		}
		return validadoOK;
	}
	function validarNuevoUsuario(){	
		
		var nombreUsuario = $('#nombreUsuario').val();
		var apellidoUsuario = $('#apellidoUsuario').val();
		var emailUsuario = $('#emailUsuario').val();
		var cuitUsuario = $('#cuitUsuario').val();		
		var colegioAbogado = $('#colegioAbogado').val();							
		var usuario = $('#usuario').val();
		var contrasenia = $('#contrasenia').val();
						
		var validadoOK = true;		
	
		if ((nombreUsuario.length  == 0) || (apellidoUsuario.length == 0) || (colegioAbogado == 0) || (usuario.length == 0) || (contrasenia.length == 0)){
				
				if (nombreUsuario.length == 0){agregaMensajeValidacion($("#nombreUsuario"), "Debe ingresar nombre");}
				if (apellidoUsuario.length == 0){agregaMensajeValidacion($("#apellidoUsuario"), "Debe ingresar un apellido");}								
				if (colegioAbogado == 0){agregaMensajeValidacion($("#colegioAbogado"), "Debe seleccionar un colegio");}							
				if (usuario.length == 0){agregaMensajeValidacion($("#usuario"), "Debe ingresar un usuario");}				
				if (contrasenia.length == 0){agregaMensajeValidacion($("#contrasenia"), "Debe ingresar una contraseña");}												
				
				validadoOK = false;					
		}
		if(cuitUsuario.length > 0){
			
			if(!validaCuitCuil(cuitUsuario)){			
				
				agregaMensajeValidacion($("#cuitUsuario"), "Debe ingresar un CUIT válido");	
				validadoOK = false;
		
			}
		}
		if(emailUsuario.length > 0){
			
			if(!validaEmail(emailUsuario)){
				
				agregaMensajeValidacion($('#emailUsuario'), "Debe ingresar un E-mail válido");	
				validadoOK = false;	
				
			}			
		}
		if(contrasenia.length < 6){
						
			agregaMensajeValidacion($('#contrasenia'), "La contraseña debe ser mayor a 6 caracteres");	
			validadoOK = false;	
					
		}
		return validadoOK;
	}
	function validarEditarComision(){	
		
		var nombre_comisionEditar = $('#nombre_comisionEditar').val();
		var provincia_comisionEditar = $('#provincia_comisionEditar').val();	
						
		var validadoOK = true;		
	
		if ((nombre_comisionEditar.length  == 0) || (provincia_comisionEditar == 0)){
				
				if (nombre_comisionEditar.length == 0){agregaMensajeValidacion($("#nombre_comisionEditar"), "Debe ingresar nombre");}
				if (provincia_comisionEditar == 0){agregaMensajeValidacion($("#provincia_comisionEditar"), "Debe seleccionar una provincia");}										
				
				validadoOK = false;					
		}
		
		return validadoOK;
	}
	function validarNuevaComision(){	
		
		var nombreComision = $('#nombreComision').val();
		var provincia_comision = $('#provincia_comision').val();	
						
		var validadoOK = true;		
	
		if ((nombreComision.length  == 0) || (provincia_comision == 0)){
				
				if (nombreComision.length == 0){agregaMensajeValidacion($("#nombreComision"), "Debe ingresar nombre");}
				if (provincia_comision == 0){agregaMensajeValidacion($("#provincia_comision"), "Debe seleccionar una provincia");}										
				
				validadoOK = false;					
		}
		
		return validadoOK;
	}
	function validaEmail(email) {
		var re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!(re.test(email))){
			return false;				
		}else{
			return true;
		}
	}
	function validaCuitCuil(inputValor) {
		var inputString = inputValor.toString()
		if (inputString.length == 11) {
			var Caracters_1_2 = inputString.charAt(0) + inputString.charAt(1)
			if (Caracters_1_2 == "20" || Caracters_1_2 == "23" || Caracters_1_2 == "24" || Caracters_1_2 == "27" || Caracters_1_2 == "30" || Caracters_1_2 == "33" || Caracters_1_2 == "34") {
				var Count = inputString.charAt(0) * 5 + inputString.charAt(1) * 4 + inputString.charAt(2) * 3 + inputString.charAt(3) * 2 + inputString.charAt(4) * 7 + inputString.charAt(5) * 6 + inputString.charAt(6) * 5 + inputString.charAt(7) * 4 + inputString.charAt(8) * 3 + inputString.charAt(9) * 2 + inputString.charAt(10) * 1
				Division = Count / 11;
				if (Division == Math.floor(Division)) {
					return true
				}
			}
		}
		return false
	}			
	function validar_login(){
			
			var usuario = $("#usuario").val();
			var contrasenia = $("#contrasenia").val();
					
			validadoOK = true;
			
			if ((usuario.length == 0) || (contrasenia.length == 0)){
				
				if (usuario.length == 0){agregaMensajeValidacion($("#usuario"), "Debe ingresar un usuario");}
				if (contrasenia.length == 0){agregaMensajeValidacion($("#contrasenia"), "Debe ingresar una contraseña");}
		
															
				validadoOK = false;	
			}	
		
			return validadoOK;
	}
	function noback(){
	   window.location.hash="no-back-button";
	   window.location.hash="Again-No-back-button"
	   window.onhashchange=function(){window.location.hash="no-back-button";}
	}
	function remover_mensaje_error(selector){
		
		 x = document.getElementById(selector).nextSibling;
		if(x.nextElementSibling){
			x.nextElementSibling.remove();
		}
	}	
	function validaCadena(cadena) {
		var re = /^[a-zA-Z]+$/;
		if(!(re.test(cadena))){
			return true;				
		}else{
			return false;
		}
	}
	function agregaMensajeValidacion($obj, strmensaje){

		strMensajeCampo = "Campo Obligatorio";

		if ( strmensaje != "" ) {
			strMensajeCampo = strmensaje;
		}
		
		if ($obj.next(".estilos-errores").length == 0) {
			//Inserta despues de '(*)' de un campo obligatorio un div con el mensaje
			if ($obj.next().prop('tagName') == 'BR') {						
				if ($obj.next().next(".estilos-errores").length == 0){
					$obj.next().after("<div class='estilos-errores'><b>" + strMensajeCampo + "</b></div>");
				}
			} else if ($obj.parents('div[class^="input-"]').length > 0) {
				if ($obj.parents('div[class^="input-"]').next(".estilos-errores").length == 0){
					$obj.parents('div[class^="input-"]').after("<div class='estilos-errores'><b>" + strMensajeCampo + "</b></div>");
				}
			} else {
				$obj.after("<div class='estilos-errores'><b>" + strMensajeCampo + "</b></div>");
			}
			
			//Inserta despues de '(*)' de un campo obligatorio un div con el mensaje
			if ($obj.prop('tagName') == 'DIV') {
					$obj.find('input').attr('onfocus','eliminaError()');
			} else {
					$obj.attr('onfocus','eliminaError()');
			}
		}
	}
	function eliminaError() {

		$(".estilos-errores").remove();
	}
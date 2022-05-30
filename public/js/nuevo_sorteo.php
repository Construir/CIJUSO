		
		<div class="container">			
			<br>
			<form action=""  method="post" enctype="multipart/form-data" name="formNuevoSorteo" id="formNuevoSorteo"> 
				
				<div class="card">
				  <h5 class="card-header ">Detalles de Consulta</h5>
				  <div class="card-body">
						
						<div class="row form-group">
						  <div class="col-sm-6">
							<label>Cuit</label>
							<input name="cuitRequirente" id="cuitRequirente" onkeyup="validarCuitRequirente();valida_cadena(event, this)" type="text" class="form-control required" placeholder="Ingrese su cuit" data-required="true">							
						   </div>
						  <div class="col-sm-6">
							<label>Tipo de Consulta</label>
								<select name="tipoconsulta" id="tipoconsulta" class="form-control required" data-required="true" disabled>
									<option value="0">Seleccione un tipo de consulta</option>												
									  <?php foreach ($tiposconsulta as $tipos){ ?>					
											<option  value="<?php echo $tipos['IdTipoConsulta']?>"><?php echo $tipos['NombreTipoConsulta']?></option>
									  <?php }?>				
								</select>						
						  </div>
						</div>
						<div class="row form-group">
																
							<div class="col-sm-6">
								<label>Provincia</label>
								<select name="provincia" id="provincia" class="form-control required" data-required="true" disabled>
									<option value="0">Seleccione una provincia</option>												
									  <?php foreach ($provincias as $provincia){ ?>					
											<option  value="<?php echo $provincia['IdProvincia']?>"><?php echo $provincia['NombreProvincia']?></option>
									  <?php }?>				
								</select>
							</div>
							<div class="col-sm-6">
								<label>Partido</label>
								<!--
								<select class="form-control required" name="partidoDomicilio" id="partidoDomicilio" data-required="true">
								<option value="0">Seleccione un Patido</option>												
								  <?php //foreach ($partidos as $partido){ ?>					
										<option  value="<?php //echo $partido['IdPartido']?>"><?php //echo $partido['NombrePartido']?></option>
								  <?php //}?>
								</select>
								-->	
																
								 <select class="form-control required" name="partidoDomicilio" id="partidoDomicilio" data-required="true" disabled>
									<option value="0">Seleccione un patido</option>
								 </select>									
								
							</div>
						</div>
						<div class="row form-group">						
	
							<div class="col-sm-6">
								<label>Localidad</label>
								<!--
								<select name="localidadDomicilio" id="localidadDomicilio" class="form-control required" data-required="true">
									<option value="0">Seleccione una Localidad</option>	
									<?php foreach ($localidades as $localidad){ ?>					
										<option  value="<?php echo $localidad['IdMunicipio']?>"><?php echo $localidad['NombreMunicipio']?></option>
								  <?php }?>
								</select>
								-->
								<select class="form-control required" name="localidadDomicilio" id="localidadDomicilio" data-required="true" disabled>
									<option value="0">Seleccione una localidad</option>
								 </select>
							</div>
						</div>		
						
				  </div>
				</div>
				<br>
				<div class="card">
					<h5 class="card-header">Datos Personales</h5>
					<div class="card-body">						
								
						<div class="row form-group">
							  <div class="col-sm-6">
							<label>Nombre</label>
							<input name="nombreRequirente" id="nombreRequirente" type="text" class="form-control number required" placeholder="Ingrese un nombre" disabled>							
						  </div>
						  <div class="col-sm-6">
							<label>Apellido</label>
							<input name="apellidoRequirente" id="apellidoRequirente" type="text" class="form-control" placeholder="Ingrese un apellido" disabled>							
						  </div>
						</div>

						<div class="row form-group">
						  <div class="col-sm-6">
							<label>Teléfono</label>
							<input name="telefonoRequirente" id="telefonoRequirente" type="text" class="form-control" placeholder="Ingrese un teléfono" disabled>							
						  </div>
							<div class="col-sm-6">
								<label>Celular</label>
								<input name="celularRequirente" id="celularRequirente" type="text" class="form-control required email" placeholder="Ingrese un celular" disabled>
							</div>
						</div>			

						<div class="row form-group">						 	
							<div class="col-sm-6">
								<label>E-mail</label>
								<input name="emailRequirente" id="emailRequirente" type="text" class="form-control number" placeholder="Ingrese su direcci&oacute;n de email" disabled>				
							</div>
							<div class="col-sm-6">
								<label>Calle</label>
								<input name="calleDomicilio" id="calleDomicilio" type="text" class="form-control required" placeholder="Ingrese la calle del inmueble" disabled>							
							</div>	
						</div>

						<div class="row form-group">
							  <div class="col-sm-6">
							<label>N&uacute;mero</label>
							<input name="numeroDomicilio" id="numeroDomicilio" type="text" class="form-control number required" placeholder="Ingrese el nro del inmueble" disabled>							
						  </div>
						  <div class="col-sm-6">
							<label>Piso</label>
							<input name="pisoDomicilio" id="pisoDomicilio" type="text" class="form-control" placeholder="Ingrese el piso del inmueble" disabled>							
						  </div>
						</div>

						<div class="row form-group">
						  <div class="col-sm-6">
							<label>Departamento</label>
							<input name="departamentoDomicilio" id="departamentoDomicilio" type="text" class="form-control" placeholder="Ingrese su departamento" disabled>							
						  </div>
							<div class="col-sm-6" invisible>
								
							</div>
						</div>
						
						<div class="row form-group">						
							<div class="col-sm-12">
								<label>Detalle</label>
								<textarea name="detalle" id="detalle" type="text" class="form-control" rows="5" disabled></textarea>
							</div>
						</div>	
							
						<br><hr>						
						<?php if($origen == 0){?>
							<a style="float:right;margin-right:0.5%"href="<?php echo base_url()?>" class="btn btn-secondary active" role="button" aria-pressed="true">Volver</a>
						<?php }?>
						<button id="btn_enviar_formulario" style="float:right;margin-right:0.5%" class="btn btn-primary" type="button">Sortear</button>									
												
					</div>
				</div>	
			</form>					
			<br>		
		</div>
		<br>	
		<div class="text-center">
			<img style="width:30px;height:30px" class="img-fluid" alt="Responsive image"src="<?php echo base_url()?>/imagenes/Colproba_400x400.jpg"></img>
			<a href="https://colproba.org.ar/" class="btn btn-link">Colegio de Abogados de la Provincia de Buenos Aires</a><br>
			<small>© Copyright 2020 ColProBA </small><br>
		</div>
		<br>
		
<!----------------------------------------------MODALES--------------------------------------------------------------------->		
		
<div class="modal fade " id="modal_mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content ">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Mensaje para el Usuario</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
		</div>			
		<div class="modal-body">
			<div class="alert alert-success"  role="alert">					
				<div class="form-group">
					<h5>¡Atención!</h5>
					<div  id="mensaje"></div>						
				</div>
			</div>		
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>													
			</div>							
		</div> 
	</div>
  </div>
</div>
<!-- Bootstrap core JavaScript================================================== -->

<script type="text/javascript">
	jQuery(document).ready(function() {
		
		$("#provincia").change(function(){
			
			var provincia = $('#provincia').val();
			document.getElementById('localidadDomicilio').value = 0;
			document.getElementById("localidadDomicilio").disabled = true;
			
			if(provincia == 0){
				
				document.getElementById('partidoDomicilio').value = 0;
				document.getElementById("partidoDomicilio").disabled = true;
	
				
			} else {
				var url = 'devolver_partidos_json';					
				$.ajax({
					type:"POST",					
					url:url,
					data:{provincia:provincia},
					success:function(rta){	
					
						document.getElementById("partidoDomicilio").disabled = false;								
						$('#partidoDomicilio').html(rta).fadeIn();								
						
					}
				});	
			
			}
		});	
		
		$("#partidoDomicilio").change(function(){
			var partido = $('#partidoDomicilio').val();
			if(partido == 0){
				
				document.getElementById('localidadDomicilio').value = 0;
				document.getElementById("localidadDomicilio").disabled = true;
				
			} else {	
				var url = 'devolver_localidades_json';
			
				$.ajax({
					type:"POST",					
					url:url,					
					data:{partido:partido},
					success:function(rta){	
				
						document.getElementById("localidadDomicilio").disabled = false;			
						$('#localidadDomicilio').html(rta).fadeIn();								
						
					}
				});	
			}
		});	
		$('#btn_enviar_formulario').click(function(){
			
			if(validarNuevoSorteo()){				  
				
				var cuit = $('#cuitRequirente').val();				
				var tipoconsulta = $('#tipoconsulta').val();
				var provincia = $('#provincia').val();				
				var partidoDomicilio = $('#partidoDomicilio').val();
				var localidadDomicilio = $('#localidadDomicilio').val();				
				var nombre = $('#nombreRequirente').val();
				var apellido = $('#apellidoRequirente').val();			
				var email = $('#emailRequirente').val();
				var telefono = $('#telefonoRequirente').val();
				var celular = $('#celularRequirente').val();			
				var calle = $('#calleDomicilio').val();			
				var numero = $('#numeroDomicilio').val();			
				var piso = $('#pisoDomicilio').val();			
				var departamento = $('#departamentoDomicilio').val();			
				var detalle = $('#detalle').val();			
								
				/*
				console.log(nombreAbogado,apellidoAbogado,tomoAbogado,folioAbogado,colegioAbogado,matriculaAbogado,emailAbogado,calleDomicilio,numeroDomicilio,
				pisoDomicilio,cuitAbogado,oficinaDomicilio,provincia,partidoDomicilio,localidadDomicilio,celular,telefono,emailEstudio,
				telefonoEstudio,horarioDomicilio);
				 */	
								
				var url = 'realizar_nuevo_sorteo_json';
				
				$.ajax({
					type:"POST",					
					url:url,
					data:{cuit:cuit,tipoconsulta:tipoconsulta,provincia:provincia,partidoDomicilio:partidoDomicilio,
						  localidadDomicilio:localidadDomicilio,nombre:nombre,apellido:apellido,email:email,
						  telefono:telefono,celular:celular,calle:calle,numero:numero,piso:piso,departamento:departamento,detalle:detalle},
					success:function(rta){								
						
							$('#mensaje').html(rta);	
							reset_form_nuevo_sorteo();								
											
						$('#modal_mensaje').modal('show');
						
					}
				});						
			 							
			}
		});	
		
	});
	function validarCuitRequirente(){
		
		var validacion = validaCuitCuil($('#cuitRequirente').val());

		if(validacion){
				document.getElementById("tipoconsulta").disabled = false;
				document.getElementById("provincia").disabled = false;
				document.getElementById("nombreRequirente").disabled = false;
				document.getElementById("apellidoRequirente").disabled = false;
				document.getElementById("emailRequirente").disabled = false;
				document.getElementById("telefonoRequirente").disabled = false;
				document.getElementById("celularRequirente").disabled = false;
				document.getElementById("calleDomicilio").disabled = false;
				document.getElementById("numeroDomicilio").disabled = false;
				document.getElementById("pisoDomicilio").disabled = false;
				document.getElementById("departamentoDomicilio").disabled = false;
				document.getElementById("detalle").disabled = false;
		}else{
				document.getElementById("tipoconsulta").disabled = true;
				document.getElementById("provincia").disabled = true;
				document.getElementById("partidoDomicilio").disabled = true;
				document.getElementById("localidadDomicilio").disabled = true;
				document.getElementById("nombreRequirente").disabled = true;
				document.getElementById("apellidoRequirente").disabled = true;
				document.getElementById("emailRequirente").disabled = true;
				document.getElementById("telefonoRequirente").disabled = true;
				document.getElementById("celularRequirente").disabled = true;
				document.getElementById("calleDomicilio").disabled = true;
				document.getElementById("numeroDomicilio").disabled = true;
				document.getElementById("pisoDomicilio").disabled = true;
				document.getElementById("departamentoDomicilio").disabled = true;
				document.getElementById("detalle").disabled = true;				
		}
		document.getElementById('tipoconsulta').value = 0;
		document.getElementById('provincia').value = 0;
		document.getElementById('partidoDomicilio').value = 0;
		document.getElementById('localidadDomicilio').value = 0;
		document.getElementById('nombreRequirente').value = '';
		document.getElementById('apellidoRequirente').value = '';
		document.getElementById('emailRequirente').value = '';
		document.getElementById('telefonoRequirente').value = '';
		document.getElementById('celularRequirente').value = '';
		document.getElementById('calleDomicilio').value = '';
		document.getElementById('numeroDomicilio').value = '';
		document.getElementById('pisoDomicilio').value = '';
		document.getElementById('departamentoDomicilio').value = '';
		document.getElementById('detalle').value = '';
	}	
	function reset_form_nuevo_sorteo(){
		
		$("#formNuevoSorteo").trigger("reset");
		document.getElementById("tipoconsulta").disabled = false;
		document.getElementById("provincia").disabled = false;
		document.getElementById("nombreRequirente").disabled = false;
		document.getElementById("apellidoRequirente").disabled = false;
		document.getElementById("emailRequirente").disabled = false;
		document.getElementById("telefonoRequirente").disabled = false;
		document.getElementById("celularRequirente").disabled = false;
		document.getElementById("calleDomicilio").disabled = false;
		document.getElementById("numeroDomicilio").disabled = false;
		document.getElementById("pisoDomicilio").disabled = false;
		document.getElementById("departamentoDomicilio").disabled = false;
		document.getElementById("detalle").disabled = false;
		document.getElementById('tipoconsulta').value = 0;
		document.getElementById('provincia').value = 0;
		document.getElementById('partidoDomicilio').value = 0;
		document.getElementById('localidadDomicilio').value = 0;
		document.getElementById('nombreRequirente').value = '';
		document.getElementById('apellidoRequirente').value = '';
		document.getElementById('emailRequirente').value = '';
		document.getElementById('telefonoRequirente').value = '';
		document.getElementById('celularRequirente').value = '';
		document.getElementById('calleDomicilio').value = '';
		document.getElementById('numeroDomicilio').value = '';
		document.getElementById('pisoDomicilio').value = '';
		document.getElementById('departamentoDomicilio').value = '';
		document.getElementById('detalle').value = '';
		
	}

	function valida_cadena(event, el){//Validar nombre	
		//Obteniendo posicion del cursor 
		var val = el.value;//Valor de la caja de texto
		var pos = val.slice(0, el.selectionStart).length;
		
		var out = '';//Salida
		var filtro = '0123456789';
		var v = 0;//Contador de caracteres validos
		
		//Filtar solo los numeros
		for (var i=0; i<val.length; i++){
		   if (filtro.indexOf(val.charAt(i)) != -1){
			 v++;
			 out += val.charAt(i);		   
			 //Agregando un espacio cada 4 caracteres
			 //if((v==4) || (v==8) || (v==12))
				 //out+=' ';
		   }
		}
		//Reemplazando el valor
		el.value = out;
		
		//En caso de modificar un numero reposicionar el cursor
		//if(event.keyCode==8){//Tecla borrar precionada
			//el.selectionStart = pos;
			//el.selectionEnd = pos;
		//}
	}
	</script>
  </body>
</html>
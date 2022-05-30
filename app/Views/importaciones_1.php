<br>
<div class="card">
	<div class="card-body">
		<table id="tabla-importaciones" class="table table-striped table-sm">
		  <thead>
			<tr>
			  <th scope="col">Apellido y Nombre</th>
			  <th scope="col">E-mail</th>
			  <th scope="col">Cuit</th>
			  <th scope="col">Teléfono</th>
			  <th scope="col">Celular</th>			
			  <th scope="col">Colegio</th>			
			  <!--<th scope="col">Perfil</th>-->
			  <th scope="col" style='width:8%'>Acción</th>
			</tr>
		  </thead>
		  <tbody>
		  	<?php foreach ($importaciones as $usuario){?>				  
			<tr>
				<input type="hidden" name="nombre_completo_usuario<?php echo $usuario['IdUsuario']?>" id="nombre_completo_usuario<?php echo $usuario['IdUsuario']?>" value="<?php echo $usuario['Apellido'].' '.$usuario['Nombre']?>">
				<input type="hidden" name="apellido_usuario<?php echo $usuario['IdUsuario']?>" id="apellido_usuario<?php echo $usuario['IdUsuario']?>" value="<?php echo $usuario['Apellido']?>">
				<input type="hidden" name="nombre_usuario<?php echo $usuario['IdUsuario']?>" id="nombre_usuario<?php echo $usuario['IdUsuario']?>" value="<?php echo $usuario['Nombre']?>">
				<input type="hidden" name="email_usuario<?php echo $usuario['IdUsuario']?>" id="email_usuario<?php echo $usuario['IdUsuario']?>" value="<?php echo $usuario['Email']?>">
				<input type="hidden" name="cuit_usuario<?php echo $usuario['IdUsuario']?>" id="cuit_usuario<?php echo $usuario['IdUsuario']?>" value="<?php echo $usuario['Cuit']?>">
				<input type="hidden" name="telefono_usuario<?php echo $usuario['IdUsuario']?>" id="telefono_usuario<?php echo $usuario['IdUsuario']?>" value="<?php echo $usuario['Telefono']?>">
				<input type="hidden" name="celular_usuario<?php echo $usuario['IdUsuario']?>" id="celular_usuario<?php echo $usuario['IdUsuario']?>" value="<?php echo $usuario['Celular']?>">
				<input type="hidden" name="departamento_usuario<?php echo $usuario['IdUsuario']?>" id="departamento_usuario<?php echo $usuario['IdUsuario']?>" value="<?php echo $usuario['IdDepartamento']?>">
				<input type="hidden" name="nombre_usuario_de_usuario<?php echo $usuario['IdUsuario']?>" id="nombre_usuario_de_usuario<?php echo $usuario['IdUsuario']?>" value="<?php echo $usuario['Usuario']?>">
				<input type="hidden" name="contrasenia_usuario<?php echo $usuario['IdUsuario']?>" id="contrasenia_usuario<?php echo $usuario['IdUsuario']?>" value="<?php echo $usuario['Contrasenia']?>">
				
				<td><?php echo $usuario['Apellido'].' '.$usuario['Nombre']?></td>
				<td><?php echo $usuario['Email']?></td>											
				<td><?php echo $usuario['Cuit']?></td>
				<td><?php echo $usuario['Telefono']?></td>
				<td><?php echo $usuario['Celular']?></td>																
				<td><?php echo $usuario['NombreDepartamento']?></td>																
				<!--<td><?php //echo $usuario['NombrePerfil']?></td>-->
				<td>				
						
					<button onclick="editar_usuario(<?php echo $usuario['IdUsuario']?>)"  style="margin-right:3px" type="button" class="btn btn-primary btn-sm">
						<img src="<?php echo base_url(); ?>/public/imagenes/editar_blanco.png" width="18" height="18" title="Editar">
					</button>
					
					
					<button style="margin-right:3px" type="button" class="btn btn-danger btn-sm" href="#myModal" data-toggle="modal" data-target="#modal_eliminar_usuario" id="<?php echo $usuario['IdUsuario']?>" onclick="cagar_usuario_para_eliminar(<?php echo $usuario['IdUsuario']?>)">
						<img src="<?php echo base_url(); ?>/public/imagenes/eliminar.png" width="18" height="18" title="Eliminar">
					</button>	
					</a>
			   </td>
			</tr>
			<?php }?>
		  </tbody>
		</table>
	</div>
</div>
<div class="modal fade" id="modal_eliminar_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content ">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Mensaje para el usuario</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
		</div>			
		<div class="modal-body">		
								
			<div class="form-group">						
				<div class="alert alert-danger"  role="alert">					
					<div class="form-group">
						<h5>¡Atención!</h5>
						<div>¿Esta seguro que quiere eliminar el usuario <b><label id="nombre_usuario_eliminar"></label></b>?</div>						
					</div>
				</div>										
			</div>
						
			<div class="modal-footer">
				<form class="form-inline" action="eliminar_usuario" method="post" enctype="multipart/form-data" id="formeliminarusuario" name="formeliminarusuario">
					<input type="hidden" name="id_usurio_eliminar" id="id_usurio_eliminar" value="">
					<button type="submit" id="btn_eliminar_usuario" class="btn btn-danger">Eliminar</button>
				</form>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>									
							
		</div> 
	</div>
  </div>
</div>
<div class="modal fade" id="editar_usuario_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>		
		<form action=""  method="post" enctype="multipart/form-data" name="formEditarUsuario" id="formEditarUsuario"> 
			<input type="hidden" name="id_usuario_editar" id="id_usuario_editar" value="">	 	
				<div class="card">
					
					<div class="card-body">						
								
						<div class="row form-group">
							  <div class="col-sm-6">
							<label>Nombre<sup style="color:red"><strong>*</strong></sup></label>
							<input name="nombre_usuarioEditar" id="nombre_usuarioEditar" type="text" class="form-control number required">							
						  </div>
						  <div class="col-sm-6">
							<label>Apellido<sup style="color:red"><strong>*</strong></sup></label>
							<input name="apellido_usuarioEditar" id="apellido_usuarioEditar" type="text" class="form-control">							
						  </div>
						</div>

						<div class="row form-group">						 	
							<div class="col-sm-6">
								<label>E-mail</label>
								<input name="email_usuarioEditar" id="email_usuarioEditar" type="text" class="form-control number">				
							</div>
							<div class="col-sm-6">
								<label>Cuit</label>
								<input name="cuit_usuarioEditar" id="cuit_usuarioEditar" onkeyup="valida_cadena(event, this)" type="text" class="form-control required">							
							</div>	
						</div>
						
						<div class="row form-group">
						  <div class="col-sm-6">
							<label>Teléfono</label>
							<input name="telefono_usuarioEditar" id="telefono_usuarioEditar" type="text" class="form-control">							
						  </div>
							<div class="col-sm-6">
								<label>Celular</label>
								<input name="celular_usuarioEditar" id="celular_usuarioEditar" type="text" class="form-control required email">
							</div>
						</div>			
				
						<div class="row form-group">						 	
							<div class="col-sm-6">
								<label>Usuario<sup style="color:red"><strong>*</strong></sup></label>
								<input name="nombre_usuario_de_usuarioEditar" id="nombre_usuario_de_usuarioEditar" type="text" class="form-control number">				
							</div>
							<div class="col-sm-6">
								<label>Contraseña<sup style="color:red"><strong>*</strong></sup></label>
								<input name="contrasenia_usuarioEditar" id="contrasenia_usuarioEditar" type="password" class="form-control required" value="">							
							</div>	
						</div>
						<br>					
						
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button id="btn_enviar_formulario" style="float:right;margin-right:0.5%" class="btn btn-primary" type="button">Guardar</button>									
												
						</div>
					</div>
				</div>	
			</form>	
	 
    </div>
  </div>
</div>
 <!-- Bootstrap core JavaScript
    ================================================== -->
	<script type="text/javascript">
	jQuery(document).ready(function() {		
		
		$('#btn_enviar_formulario').click(function(){
			if(validarEditarUsuario()){  
				$("#formEditarUsuario").attr("action","guardar_editar_usuario");	            
				$("#formEditarUsuario").submit();							
			}
		});
		
		$('#tabla-importaciones').stacktable();
		$('#tabla-importaciones').DataTable( {
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
			//"ordering": false,
			"order": [[ 0, "asc" ]],
			"paging": true,
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"			
			}		
		});	
					
	});	
	function cagar_usuario_para_eliminar(idusuario){		
		
		var nombre_usuario = $("#nombre_completo_usuario"+idusuario).val();		
		document.getElementById('id_usurio_eliminar').value = idusuario;
		document.getElementById('nombre_usuario_eliminar').innerHTML=(nombre_usuario);	
		
	}	
	function editar_usuario(idusuario){
		
		$(".estilos-errores").remove();		
		var apellido_usuario = $("#apellido_usuario"+idusuario).val();		
		var nombre_usuario = $("#nombre_usuario"+idusuario).val();		
		var cuit_usuario = $("#cuit_usuario"+idusuario).val();		
		var email_usuario = $("#email_usuario"+idusuario).val();		
		var telefono_usuario = $("#telefono_usuario"+idusuario).val();				
		var celular_usuario = $("#celular_usuario"+idusuario).val();	
		var departamento_usuario = $("#departamento_usuario"+idusuario).val();	
		var nombre_usuario_de_usuario = $("#nombre_usuario_de_usuario"+idusuario).val();	
		var contrasenia_usuario = $("#contrasenia_usuario"+idusuario).val();	
		
		document.getElementById('id_usuario_editar').value = idusuario;
		document.getElementById('apellido_usuarioEditar').value = apellido_usuario;
		document.getElementById('nombre_usuarioEditar').value = nombre_usuario;
		document.getElementById('cuit_usuarioEditar').value = cuit_usuario;
		document.getElementById('email_usuarioEditar').value = email_usuario;
		document.getElementById('telefono_usuarioEditar').value = telefono_usuario;
		document.getElementById('celular_usuarioEditar').value = celular_usuario;
		//document.getElementById('departamento_usuarioEditar').option = departamento_usuario;
		document.getElementById('departamento_usuarioEditar').value = departamento_usuario;
		document.getElementById('nombre_usuario_de_usuarioEditar').value = nombre_usuario_de_usuario;
		document.getElementById('contrasenia_usuarioEditar').value = contrasenia_usuario;
		
		$('#editar_usuario_modal').modal('show');		
		
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
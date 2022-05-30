<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #ffb606 !important">
			
	<a class="navbar-brand" href="#"><img class="img-fluid" alt="Responsive image" src="<?php echo base_url(); ?>/public/imagenes/logo-cijuso.svg" width="80%" height="80%"></a>
	
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		
		<ul class="navbar-nav mr-auto">
			<!--
			<li class="nav-item active">
				<a class="nav-link" href="administrar_importaciones">Importaciones</a>
			</li>
			-->			
			<!--		
			<li class="nav-item dropdown active">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Facturación
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="nueva_facturacion">Nuevo</a>
				  <a class="dropdown-item" href="administrar_facturacion">Ver Facturación</a>
				</div>
			</li>
			-->
			<!--			
			<li class="nav-item active">
				<a class="nav-link" href="administrar_facturacion">Facturación</a>
			</li>			
			-->
			<li class="nav-item active">
				<a class="nav-link" href="administrar_importaciones">Archivos</a>
			</li>			
			<li class="nav-item active">
				<a class="nav-link" href="administrar_lotes">Lotes</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="reporte_de_facturacion">Reporte</a>
			</li>
			
			  
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#"><?php echo mb_strtoupper($nombre_de_usuario)?></a>
				</li>			
				<li class="nav-item">
					<a class="nav-link" id="abrir_cambiar_contrasenia" href="#"><img src="<?php echo base_url(); ?>/public/imagenes/icono_cambiar_contrasena.png" width="20" height="20" title="Cambiar Contraseña"></a>
				</li>					
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/public/imagenes/icono_salir.png" width="20" height="20" title="Salir"></a>
				</li>
			 </ul>
		</form>
	</div>
		
	
	
</nav>
<br>
<!-- Modales -->
<div class="modal" id="cambiar_contrasenia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		<form action=""  method="post" enctype="multipart/form-data" name="formCambiarContrasenia" id="formCambiarContrasenia"> 
		  <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario?>">
		  <div class="modal-body">
			<div class="form-group ">									
				<label class="font-weight-bold">Contraseña (Entre 6 y 30 Caracteres)</label>
				<input class="form-control" id="passworcambiapassword" name="passworcambiapassword" type="password" onfocus>
			
			</div>
			<div class="form-group ">									
				<label class="font-weight-bold">Confirme Contraseña</label>
				<input class="form-control" id="confirmarcambiapassword" name="confirmarcambiapassword" type="password">
				
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Salir</button>		
			<input class="btn btn-primary btn-sm" id="botoncambiarcontrasenia" type="button" value="Guardar">
		  </div>
		</form>
    </div>
  </div>
</div>

<div class="modal" id="modal_exito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <div class="modal-body">
		<div class="alert alert-success" role="alert">	  
			<label class="font-weight-bold">La Contraseña se cambio con Exito!</label>					
		</div>
	  </div>
	   <div class="modal-footer">
		<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Salir</button>		
	  </div>
    </div>
  </div>
</div>
<div class="modal" id="modal_fallo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <div class="modal-body">
		<div class="alert alert-danger" role="alert">
		   <label>No se pudo cambiar la Contraseña. Por favor, contacte a su Administrador.</label>
		</div>	
	  </div>	
	  <div class="modal-footer">
		<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Salir</button>		
	  </div>		
    </div>
  </div>
</div>

<div id="loading-screen" style="display:none">
	<img src="<?php echo base_url()?>/public/imagenes/spinning-circles.svg">
</div>

<script type="text/javascript">

	jQuery(document).ready(function() {
		
		$('#abrir_cambiar_contrasenia').click(function(){
			$(".estilos-errores").remove();
						
			document.getElementById('passworcambiapassword').value = '';
			document.getElementById('confirmarcambiapassword').value = '';				
			
			$('#cambiar_contrasenia').modal('show');			
		});	
		$('#botoncambiarcontrasenia').click(function(){
				
				if(validarContrasenia()=== true){
					
					var url = 'guardar_cambiar_contrasenia';
					
					var cont1 = $("#passworcambiapassword").val();
					var cont2 = $("#confirmarcambiapassword").val();
					var id_usuario = $("#id_usuario").val();
					
					$.ajax({
						type:"POST",
						url:url,
						data:{pass1:cont1,pass2:cont2,id_usuario:id_usuario},					
						success:function(rta){
							if(rta){
								$('#cambiar_contrasenia').modal('hide');
								$('#modal_exito').modal('show');
							}else{
								$('#cambiar_contrasenia').modal('hide');
								$('#modal_fallo').modal('show');
							}														
						}
					});
				}
			});
	});	

</script>
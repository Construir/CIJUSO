<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>CIJUSO</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url()?>/public/imagenes/icono.PNG"/>
	
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="<?php echo base_url(); ?>/public/css/mis_estilos.css" rel="stylesheet">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>/public/js/mis_javascripts.js"></script> 		
</head>
<body>
	<div class="row">
	
		<div class="col-4" style="background-color:#FFFFFF;text-align:center;margin-top:12%">
			
			<a target="blank_1" href="http://cijuso.org.ar/institucional.php#autoridades-colproba"><img src="<?php echo base_url()?>/public/imagenes/logo-cijuso.svg" width="300" height="100"></a>
				
		</div>
	
		<div class="col-8" style="background-color: #ffb606 !important;color: #fff !important;height:900px">
				
			<form class="form-signin" action="" method="post" enctype="multipart/form-data" name="formLogin" id="formLogin">	
			
			  <fieldset class="col-5" style="text-align:center;margin-top:10%;margin-left:25%">
				
				<br>
				<div class="col-md-12" id="divmensajedealerta">
			  
				  <label class="col-md-12" id="labelPreguntas" >
				  <?php if(!empty($mensaje)){?>
					  <div id="mensajedealerta" class="alert alert-danger" role="alert">
						
						<?php echo $mensaje;?>
						
												
					  </div> 
				  <?php }?>
				  </label>
				  
				</div>
			
				<a class="btn btn-secondary btn-sm rounded-circle" href="#"><img style="margin:10px" width="100" height="100" src="<?php echo base_url(); ?>/public/imagenes/clientes.png"/></a>							
				
				<div class="form-group">
				  <label for="usuario" style="float:left">Usuario</label>
				  <input type="text" id="usuario" name="usuario" class="form-control" autofocus>
				</div>
				
				<div class="form-group">
				  <label for="contrasenia" style="float:left">Contraseña</label>
				  <input type="password" id="contrasenia" name="contrasenia" class="form-control">
				</div>
				
				<button type="button" id="botoncontinuar" class="btn-block btn btn-secondary">Ingresar</button>
			  </fieldset>
			</form>
			
			<center style="margin-top:15%" class="pb-2 border-top"><small>© Copyright 2021 CIJUSO</small></center>
			
		</div>
	
	</div>

</body>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    
	<script type="text/javascript">

		jQuery(document).ready(function() {
			
			$('#contrasenia').keydown(function(event){ 
				var keyCode = (event.keyCode ? event.keyCode : event.which);   
				if (keyCode == 13) {
					$('#botoncontinuar').trigger('click');
				}
			});

			$('#botoncontinuar').click(function(){
				
				if(validar_login()){			
				
					$("#formLogin").attr("action","cijuso/valida_usuario");	            
					$("#formLogin").submit();
				
				}
				
			});			
				
		});	
	
	</script>
</html>
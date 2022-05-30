<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ialonardi Nestor Claudio">    
	<link rel="shortcut icon" type="image/x-icon" href="imagenes/icono_cafe.PNG" width="20" height="20">
    <title>Sistema Manager CBR</title>
		
    <!-- Bootstrap core CSS -->
	<link href="bootstrap/css/estilo-login.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap core JS -->	
	<script src="bootstrap/js/jquery.js"></script>	 
  </head>

    <body id="background_login">			
		<div class="container col-md-3">
			<?php if(isset($mensaje)){?>				
				 						  
					  <div id="mensajedealerta" class="alert alert-danger" role="alert">
						<?php echo $mensaje;?>
					  </div> 						 
				  		
			 <?php }?>
				<div class="col-md-12" id="contenedor" >						
					<div class="panel-heading" id="titulo-panel-heading" style="text-align:center">
						<h3 class="panel-title">Manager CBR</h3>
					</div>								
					<div class="panel-body">
						<form class="form-signin" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">					
							<fieldset>							
								<div class="form-group ">									
									<label class="font-weight-bold">Usuario</label>
									<input onchange="remover_mensaje_error(this.id)" type="usuario" name="usuario" id="usuario" class="form-control" placeholder="Usuario" autofocus required>    
									
								</div>	
								<div class="form-group ">									
									<label class="font-weight-bold">Contraseña</label>
									<input onchange="remover_mensaje_error(this.id)" type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
							
								</div>										
								<button class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Login" id="botoncontinuar">Ingresar</button>
							</fieldset>									
						</form>
					</div>					
				</div>
		
		</div>
	</body>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    
	<script type="text/javascript">

		jQuery(document).ready(function() {
			$('#botoncontinuar').click(function(){
				ingreso_usuario();
			});				
	
			function ingreso_usuario(){
				$("#form1").attr("action","<?php echo base_url()?>index.php/login/valida_usuario");	            
				$("#form1").submit();
			}	
		});	
		function remover_mensaje_error(selector){
			
			 x = document.getElementById(selector).nextSibling;
			 if(x.nextElementSibling){
				x.nextElementSibling.remove();
			 }
		}
	</script>
 
</html>
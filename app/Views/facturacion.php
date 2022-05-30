<div class="container col-10">
	
	  <!-- para mostrar el mensaje en caso de error -->
	  <div class="row" id="div_error_cnt" style="display: none">
		<div class="col-md-12">
		  <div id="div_error" class="alert alert-danger"></div>
		</div>
	  </div>
	
	<div class="card">
		 
		<div class="card-body">		
			
			<h5>Facturar Lote</h5>
			<br>
			
			<table id="tabla-recetas" style="font-size:80%" class="table table-striped table-sm">
			  <thead>
				<tr>
				 
				  <th style="width:2%">Lote</th>
				  <th>Fecha</th>
				  <th>Usuario</th>	
				  <th>Archivo</th>				  	
				  <!--<th>Estado</th>-->
				  <th>Acción</th>	
				  
				</tr>
			  </thead>
			  <tbody>
				
				<?php foreach($importaciones as $importacion){?>
					<tr>
						<td><?php echo $importacion['Id']?></td>
						<td style="width:8%">
							<span style="display:none"><?php echo date("d-m-Y H:i:s",strtotime($importacion['created_at']));?></span> 
							<?php echo date("d-m-Y",strtotime($importacion['created_at']))?>
						</td>
						<td><?php echo mb_strtoupper($importacion['nombre_usuario'])?></td>						
						<td><?php echo $importacion['NombreArchivo']?></td>
						<!--
						<?php //if($importacion['Estado'] == 1){?>
						
							<td class="text-success"><?php //echo $importacion['nombre_estado']?></td>
						
						<?php //}else{?>
							
							<td class="text-danger"><?php //echo $importacion['nombre_estado']?></td>
							
						<?php// } ?>	
						-->
						<td style="text-align:center;width:8%">
							
							<div class="form-inline">							
								<!--
								<button style="margin-left:5%" type="button" class="btn btn-primary btn-sm">										
									<img src="<?php //echo base_url(); ?>/public/imagenes/ver.png" width="20" height="20" title="Ver detalle"> 
								</button>	
								-->								
								<?php //if($importacion['Estado'] == 2){?>
								
									<button type="button" class="btn btn-primary btn-sm" onclick="cargar_lote_a_facturar(<?php echo $importacion['Id']?>)">										
										<img src="<?php echo base_url(); ?>/public/imagenes/ver.png" width="20" height="20" title="Facturar"> 
									</button>							
								
								<?php //}else{ ?>
									<!--
									<button style="margin-left:5%" type="button" class="btn btn-secondary btn-sm" onclick="cargar_lote(<?php //echo $importacion['Id']?>)">										
										<img src="<?php //cho base_url(); ?>/public/imagenes/impresora_blanca.png" width="20" height="20" title="Imprimir Facturas"> 
									</button>
									-->
								<?php //}?>
								
							</div>	
							
						</td>
											
					</tr>					

				<?php }?>				
			  
			  </tbody>

			</table>
			
		  </div>
	</div>
</div>
<!-- Modal -->

<div class="modal " id="modalimprimirfacturas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-width: 1150px !important;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Imprimir facturas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="mostrar_lote"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		<button type="button" class="btn btn-primary"><img src="<?php echo base_url(); ?>/public/imagenes/impresora_blanca.png" width="20" height="20" title="Imprimir Facturas"> Imprimir Facturados</button>        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalfacturarlote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-width: 1150px !important;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Facturar lote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="mostrar_lote_a_facturar"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
		<button type="button" class="btn btn-info"><img src="<?php echo base_url(); ?>/public/imagenes/impresora_blanca.png" width="20" height="20" title="Imprimir Facturas"> Imprimir Facturados</button>
		<button type="button" class="btn btn-primary"><img src="<?php echo base_url(); ?>/public/imagenes/baseline_qr_code_scanner_white_24dp.png" width="20" height="20" title="Facturar"> Facturar Pendientes</button>		
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content ">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Mensaje para el Usuario</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
		</div>			
		<div class="modal-body">
							
			<div  id="lista_de_facturas"></div>						
							
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>								
			</div>	
			
		</div> 
	</div>
  </div>
</div>
<div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						<div>¿Esta seguro que quiere eliminar de manera <b>PERMANENTE</b> el trámite iniciado por <b><label id="numero_tramite_eliminar"></label></b>?</div>						
					</div>
				</div>										
			</div>
						
			<div class="modal-footer">
				<form class="form-inline" action="eliminar_tramite" method="post" enctype="multipart/form-data" id="formeliminar" name="formeliminar">				  
				    <input type="hidden" name="id_tramite_eliminar" id="id_tramite_eliminar" value="">
					<button type="submit" id="btn_eliminar_confirmado" class="btn btn-danger">Eliminar</button>
				</form>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>									
							
		</div> 
	</div>
  </div>
</div>


<!--
<div class="modal fade" id="modal_mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
		<div id="div_cabecera" style="color:#FFFFFF" class="modal-header bg-danger">
			<h5 class="modal-title" id="exampleModalLabel">¡Atención!</h5>
			<button style="color:#FFFFFF" type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		</div>			
		<div class="modal-body">		
								
			<div class="form-group">						
				<div class="alert"  role="alert">					
					<div class="form-group">
						<center>
							<img id="img_exito" style="display:none" src="<?php //echo base_url(); ?>/public/imagenes/hecho.png" width="100" height="100">
							<img id="img_fallo"  src="<?php //echo base_url(); ?>/public/imagenes/problemas.png" width="80" height="80">
						</center>
						<br>						
						<div id="color_texto">Estimado profesional: <label id="mensaje_op"></label></div>						
					</div>
				</div>										
			</div>
						
			<div class="modal-footer">
				<button id="btn_cerrar" type="button" style="color:#FFFFFF" class="btn" data-dismiss="modal">Cerrar</button>
			</div>									
							
		</div> 
	</div>
  </div>
</div>	
-->
<!--	
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_mensaje">
  Launch demo modal
</button>
-->
<!-- Bootstrap core JavaScript
    ================================================== -->
	<script type="text/javascript">	
	jQuery(document).ready(function() {	
		
		var screen = $('#loading-screen');						
		var archivo_subido_ok = '<?php echo $archivo_subido_ok?>';						
		
		if(archivo_subido_ok){
			
			$('#mensaje').html(mensaje_enviado);			
			$('#modal_mensaje').modal('show');
			
		}
	
		$('#falso1').click(function(){
			
			$('#rutaimagen').trigger("click");						
			   
		});		
		$('#btn_sellar_archivo').click(function(){
			
			screen.fadeIn();
							
			$("#formSubirReceta").attr("action","subir_receta_a_bfa");	            
			$("#formSubirReceta").submit();	
			setTimeout(function(){ screen.fadeOut();
								   location.reload();			
								 }, 10000);
			
		});
	     
	    // Cuando el autentico cambia hace cambiar al falso
	    $('input[type=file]').on('change', function(e){
		    $(this).next().find('input').val($(this).val());
	    });	
				
		$('#tabla-recetas').stacktable();
		$('#tabla-recetas').DataTable( {
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
			"ordering": true,
			"order": [[ 1, "desc" ]],
			"searching": true,
			"paging": true,
			"info": true,
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"			
			}		
		});	
	
	
					
	});
	function cargar_lote(lote){					
					
		var url = 'devolver_facturas_x_lote_json';
		
		$.ajax({
			type:"POST",					
			url:url,
			data:{lote:lote},
			success:function(rta){									
							
				$('#mostrar_lote').html(rta);
				
				$('#tabla_facturas').stacktable();
				$('#tabla_facturas').DataTable({	
					"lengthMenu": [[50, -1], [50, "Todos"]],
					"searching":false,		
					"info":false,		
					"ordering":false,			
					"paging": false,		
					"language": {
						"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"			
					}	
				});						
				
				$('#modalimprimirfacturas').modal('show');					
				
			}
		});				
	
	}
	function cargar_lote_a_facturar(lote){					
					
		var url = 'facturar_lote_json';
		
		$.ajax({
			type:"POST",					
			url:url,
			data:{lote:lote},
			success:function(rta){									
							
				$('#mostrar_lote_a_facturar').html(rta);
				
				$('tabla_facturar_lote').stacktable();
				$('#tabla_facturar_lote').DataTable({	
					"lengthMenu": [[50, -1], [50, "Todos"]],
					"searching":false,		
					"info":false,		
					"ordering":false,			
					"paging": false,		
					"language": {
						"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"			
					}	
				});						
				
				$('#modalfacturarlote').modal('show');					
				
			}
		});				
	
	}
	/*
	function ValidarImagen(obj){
		
		var uploadFile = obj.files[0];

		if (!window.FileReader) {
			//alert('El navegador no soporta la lectura de archivos');
			$('#mensaje').html('El navegador no soporta la lectura de archivos.');			
			$('#modal_mensaje').modal('show');
			//return false;
		}

		if (!(/\.(jpg|png|PNG|JPEG|gif)$/i).test(uploadFile.name)) {
			
			//alert('El archivo a adjuntar no es una imagen');
			$('#mensaje').html('El archivo que quiere adjuntar no es una imagen.');			
			$('#modal_mensaje').modal('show');
			//return false;
		
		}else{
			
			var img = new Image();
			img.onload = function () {
				
				if (this.width.toFixed(0) < 5000 && this.height.toFixed(0) < 5000) {
					//alert('Las medidas deben ser: 200 * 200');
					$('#mensaje').html('El tamaño máximo de la imagen no debe superar los 1000 x 1000 píxeles.');			
					$('#modal_mensaje').modal('show');
					return false;
				}
				else
				
				if (uploadFile.size > 100000){
					
					//alert('El peso de la imagen no puede exceder los 2MB')
					$('#mensaje').html('El peso de la imagen no puede exceder los 2MB.'+uploadFile.size);			
					$('#modal_mensaje').modal('show');
					//return false;
				
				}else{				
					
					//alert('Imagen correcta :)')  
					//$('#mensaje').html('Imagen correcta.');			
					//$('#modal_mensaje').modal('show');					
					return true;
					
				}
			};
			//img.src = URL.createObjectURL(uploadFile);
		}                 
	}
	*/
	function ValidarImagen(obj){
		
		var uploadFile = obj.files[0];

		if (!(/\.(jpg|png|PNG|JPEG|gif)$/i).test(uploadFile.name)){
			
			//alert('El archivo a adjuntar no es una imagen');
			$('#mensaje').html('El archivo que quiere adjuntar no es una imagen.');			
			$('#modal_mensaje').modal('show');
			//return false;
		
		}else{
							
			return true;
					
		}
		
	}
	function handleFiles(fileInput){
		
		if(ValidarImagen(fileInput)){
			
			var files = fileInput.files;

			for (var i = 0; i < files.length; i++) {
				
				$('#nombre_archivo').html(files[i].name);
				$("#nombre_archivo").show();
				
				document.getElementById('falso1').style.display = 'none';
				$("#btn_sellar_archivo").show();

			}
		
		}
		  
	}
	function visualizarfotos(obj){
		
		document.getElementById('imagenmodal').innerHTML=("<img style='padding:3px' id='fotoenmodal' class='img-responsive' width='775' height='600' src='" + obj + "'>");
			 
	}
	/*	
	function cagar_tramite_eliminar(obj){		
		
		var matriculacion = $("#desc_matriculacion"+obj).val();		
		document.getElementById('id_tramite_eliminar').value = obj;
		document.getElementById('numero_tramite_eliminar').innerHTML=(matriculacion);
		$('#modal_eliminar').modal('show');			
	
	}
	
	function cagar_cuotas(obj){		
	
		var numeroComprobante = $("#numeroComprobante"+obj).val();
		var subTotal = $("#subTotal"+obj).val();
		
		document.getElementById('id_deuda').value = obj;
		document.getElementById('id_deuda_actual').value = obj;
		document.getElementById('numero_comprobante').value = numeroComprobante;
		document.getElementById('subtotal').value = subTotal;
		
		var arrayJS=<?php //echo json_encode($deudas);?>;
		var total = <?php //echo count($deudas);?>;	
		
		var array_final = "";
		var sigue = true;
		
		for (var i = 0; i < total; i++) {			
			
			if(sigue){
				
				var total_cuota = 0;			
				//total_cuota = parseInt(arrayJS[i]['Saldo']) + parseInt(arrayJS[i]['Interes']);
				total_cuota = arrayJS[i]['Subtotal'];
				if(parseInt(arrayJS[i]['Subtotal']) > 0){		
				
					//array_final = array_final + "Período: <b style='color:red'>" + arrayJS[i]['FechaVencimientoParaJson'] + "</b> Comprobante: " + parseInt(arrayJS[i]['NumeroComprobante']) + " Importe: $" + new Intl.NumberFormat(["ban", "id"]).format(total_cuota) + "<br>";	
					array_final = array_final + "Período: <b style='color:red'>" + arrayJS[i]['FechaVencimientoParaJson'] + "</b> Comprobante: " + parseInt(arrayJS[i]['NumeroComprobante']) + "<br>";	
				
				}
				
				if(arrayJS[i]['IdDeuda'] === obj){
					sigue = false;
				}
				
			}
		}
		array_final = array_final + "<hr/><h5><b style='color:red'>TOTAL: $" + total_cuota + "</b></h5>";	
		//$('#lista_cuotas').html("Fecha: " + arrayJS[i]['FechaVencimiento'] + " Número de comprobante: " + parseInt(arrayJS[i]['NumeroComprobante']) + " Importe: " + total_cuota + "<br>");	
		$('#lista_cuotas').html(array_final);	
		
		
	}
	function deshabilita_numero_tramite(){	
			
		document.getElementById('numerodetramite').disabled = true;
		document.getElementById('fechadesde').disabled = false;		
		document.getElementById('fechafin').disabled = false;		
		document.getElementById('desplegableestadotramite').disabled = false;
		
		document.getElementById('numerodetramite').value = '';		
			
	}		
	function deshabilita_filtro_fechas(){	
			
		document.getElementById('numerodetramite').disabled = false;
		document.getElementById('fechadesde').disabled = true;		
		document.getElementById('fechafin').disabled = true;		
		document.getElementById('desplegableestadotramite').disabled = true;

		document.getElementById('fechadesde').value = '';
		document.getElementById('fechafin').value = '';
		document.getElementById('desplegableestadotramite').value = 0;		
	
	}
	*/
	</script>
  </body>
</html>
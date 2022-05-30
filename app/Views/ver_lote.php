<div class="container col-10">
	
	  <!-- para mostrar el mensaje en caso de error -->
	  <div class="row" id="div_error_cnt" style="display: none">
		<div class="col-md-12">
		  <div id="div_error" class="alert alert-danger"></div>
		</div>
	  </div>
	<h5 class="card-title">Resumen de Lote #<?php echo $IdLote?>
		
		<?php if($estado_lote == 2){//EL LOTE ESTA ABIERTO?>
			
			<label class="text-danger" style="float:right">ESTADO LOTE: ABIERTO</label>
		
		<?php }else{?>
			
			<label class="text-success" style="float:right">ESTADO LOTE: CERRADO</label>
		
		<?php }?>
		
	</h5>	
		
	<div class="card">
		
		<div class="card-body">
			
			<?php if($pendientes){//EL LOTE ESTA ABIERTO?>	
			
				<form style="float:right" class="form-inline" action="<?php echo base_url()?>/index.php/Cijuso/facturar_pendientes" method="post" enctype="multipart/form-data" id="formenviarfactura" name="formenviarfactura">
					<input type="hidden" name="id_lote" id="id_lote" value="<?php echo $IdLote?>">
					<button type="submit" name="btn_facturar_pendientes" id="btn_facturar_pendientes" class="btn btn-secondary btn-sm" title="Facturar pendientes"><img src="<?php echo base_url();?>/public/imagenes/baseline_qr_code_scanner_white_24dp.png" width="20" height="20"> Facturar pendientes</button>
				</form>	
				
			<?php }?>
			
			<?php if($estado_lote == 2){//EL LOTE ESTA ABIERTO?>
			
				<form style="float:right;margin-right:3px" class="form-inline" action="<?php echo base_url()?>/index.php/Cijuso/cerrar_lote" method="post" enctype="multipart/form-data" id="formenviarfactura" name="formenviarfactura">
					<input type="hidden" name="id_lote_cerrar" id="id_lote_cerrar" value="<?php echo $IdLote?>">
					<button type="submit" name="btn_cerrar_lote" id="btn_cerrar_lote" class="btn btn-danger btn-sm" title="Cerrar lote"><img src="<?php echo base_url();?>/public/imagenes/cancelar.png" width="20" height="20"> Cerrar lote</button>
				</form>	
				
			<?php }?>
			<br>	
			<br>	
		
				<?php if(!empty($facturas)){ ?>			
				
					<table style="font-size:80%" class="table table-striped" id="tabla_facturar_lote">
						<thead>
							<tr>								
								<th style="text-align:center">Orden</th>																																	 
								<th style="text-align:center">Descripción</th>																																	 
								<th style="text-align:center">Medio de Pago</th>																																	 
								<th style="text-align:center">Importe</th>																																	 
								<th style="text-align:center">Comprador</th>																																							 
								<th style="text-align:center">Estado</th>																																							 
								<th style="width:18%">Acción</th>																																							 
							</tr>
						</thead>
						<tbody>
							
							<?php foreach ($facturas as $factura){ ?>	
								
								<tr>
																	
										<td name="orden<?php echo $factura['IdFacturacion'] ?>" id="orden<?php echo $factura['IdFacturacion'] ?>" value="<?php echo $factura['IdOrden'] ?>" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%"><?php echo $factura['IdOrden'] ?></td>
										<td name="descripcion<?php echo $factura['IdFacturacion'] ?>" id="descripcion<?php echo $factura['IdFacturacion'] ?>" value="<?php echo $factura['Descripcion'] ?>" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%"><?php echo $factura['Descripcion'] ?></td>
										<td name="mediodepago<?php echo $factura['IdFacturacion'] ?>" id="mediodepago<?php echo $factura['IdFacturacion'] ?>" value="<?php echo $factura['MedioPago'] ?>" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%"><?php echo $factura['MedioPago'] ?></td>
										<td name="valortransaccion<?php echo $factura['IdFacturacion'] ?>" id="valortransaccion<?php echo $factura['IdFacturacion'] ?>" value="<?php echo $factura['ValorTransaccion'] ?>" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%"><?php echo '$'.number_format($factura['ValorTransaccion'],2,",",".") ?></td>
										<td name="nombrecomprador<?php echo $factura['IdFacturacion'] ?>" id="nombrecomprador<?php echo $factura['IdFacturacion'] ?>" value="<?php echo $factura['NombreComprador'] ?>" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%"><?php echo mb_strtoupper($factura['NombreComprador']) ?></td>
										
										<?php if($factura['IdEstadoFactura'] == 1){ ?>
											
											<td class="text-danger" name="estadodefactura<?php echo $factura['IdFacturacion'] ?>" id="estadodefactura<?php echo $factura['IdFacturacion'] ?>" value="<?php echo $factura['IdEstadoFactura'] ?>" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%">Pendiente</td>
										
										<?php }else{ ?>
											
											<td class="text-success" name="estadodefactura<?php echo $factura['IdFacturacion'] ?>" id="estadodefactura<?php echo $factura['IdFacturacion'] ?>" value="<?php echo $factura['IdEstadoFactura'] ?>" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%">Facturado</td>
										
										<?php } ?>
										
										<?php if($factura['IdEstadoFactura'] == 1){ ?>
											<td>

												<form style="margin-left:3%" class="form-inline" action="<?php echo base_url()?>/index.php/Cijuso/facturar" method="post" enctype="multipart/form-data" id="formenviarfactura" name="formenviarfactura">
													<input type="hidden" name="id_factura_a_facturar" id="id_factura_a_facturar" value="<?php echo $factura['IdFacturacion']?>">
													<input type="hidden" name="id_lote_de_facturar" id="id_lote_de_facturar" value="<?php echo $factura['IdLote']?>">
													<button  type="submit" name="btn_imprimir" id="btn_imprimir" class="btn btn-secondary btn-sm"><img src="<?php echo base_url();?>/public/imagenes/baseline_qr_code_scanner_white_24dp.png" width="20" height="20" title="Facturar"></button>
												</form>	
											
											</td>
										<?php }else{ ?>
											<td class="form-inline">
											
												<form style="margin-left:3%" class="form-inline" action="<?php echo base_url()?>/index.php/Cijuso/enviar_factura" method="post" enctype="multipart/form-data" id="formenviarfactura" name="formenviarfactura">
													<input type="hidden" name="id_factura_enviar_mail" id="id_factura_enviar_mail" value="<?php echo $factura['IdFacturacion']?>">
													<button  type="submit" name="btn_factura_enviar_mail" id="btn_factura_enviar_mail" class="btn btn-success btn-sm"><img src="<?php echo base_url();?>/public/imagenes/baseline_email_white_24dp.png" width="20" height="20" title="Enviar Factura"></button>
												</form>	
											
												<form style="margin-left:3%" class="form-inline" action="imprimir_factura" method="post" enctype="multipart/form-data" id="formimprimirfactura" name="formimprimirfactura">
													<input type="hidden" name="id_factura_imprimir" id="id_factura_imprimir" value="<?php echo $factura['IdFacturacion']?>">
													<button type="submit" name="btn_factura_imprimir" id="btn_factura_imprimir" class="btn btn-primary btn-sm"><img src="<?php echo base_url();?>/public/imagenes/impresora_blanca.png" width="20" height="20" title="Imprimir Factura"></button>
												</form>													
												
												<form style="margin-left:3%" class="form-inline" action="<?php echo base_url()?>/index.php/Cijuso/realizar_nota_de_credito" method="post" enctype="multipart/form-data" id="formnotadecredito" name="formnotadecredito">
													<input type="hidden" name="id_factura_nota_de_credito" id="id_factura_nota_de_credito" value="<?php echo $factura['IdFacturacion']?>">
													<button type="submit" name="btn_factura_nota_de_credito" id="btn_factura_nota_de_credito" class="btn btn-warning btn-sm"><img src="<?php echo base_url();?>/public/imagenes/baseline_undo_white_24dp.png" width="20" height="20" title="Realizar nota de crédito"></button>
												</form>													
												
												<form style="margin-left:3%" class="form-inline" action="<?php echo base_url()?>/index.php/Cijuso/obtener_cae" method="post" enctype="multipart/form-data" id="formobtenercae" name="formobtenercae">
													<input type="hidden" name="id_factura_obtener_cae" id="id_factura_obtener_cae" value="<?php echo $factura['IdFacturacion']?>">
													<button type="submit" name="btn_factura_obtener_cae" id="btn_factura_obtener_cae" class="btn btn-info btn-sm"><img src="<?php echo base_url();?>/public/imagenes/baseline_search_white_24dp.png" width="20" height="20" title="Obtener CAE"></button>
												</form>	
												
											</td>
										<?php } ?>
								</tr>
							<?php } ?>
							
						</tbody>									  
					</table>					
					
			<?php }else{ ?>
				
				<div class="row">
					<div class="col-md-12">
					  <div style="color:red;border-left-color:red" class="callout callout-danger">
					    <h4>¡Atención!</h4>
						No es posible cargar el Lote. Verifique y vuelva a intentar.
					  </div>
					</div>
				</div>				
								
			
			<?php } ?>
			
		  </div>
	</div>
	
	<br>
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
			<div id="alerta_mensaje" class="alert alert-danger"  role="alert">					
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
<div class="modal fade"  id="modalslider" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" >	
		
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Visor de Imágenes</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		</div>	 
		
		<div class="modal-body" id="imagenmodal"></div>
		
		<div class="modal-footer">				
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
			
		$('#falso1').click(function(){
			
			$('#rutaimagen').trigger("click");						
			   
		});		
		$('#btn_sellar_archivo').click(function(){
			
			screen.fadeIn();
							
			$("#formSubirArchivo").attr("action","procesar_archivo_facturacion");	            
			$("#formSubirArchivo").submit();			
			
		});
	     
	    // Cuando el autentico cambia hace cambiar al falso
	    $('input[type=file]').on('change', function(e){
		    $(this).next().find('input').val($(this).val());
	    });	
				
		$('#tabla_facturar_lote').stacktable();
		$('#tabla_facturar_lote').DataTable( {
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

		//if (!(/\.(xls|xlsx)$/i).test(uploadFile.name)){
		if (!(/\.(csv)$/i).test(uploadFile.name)){
			
			//alert('El archivo a adjuntar no es una imagen');
			$('#mensaje').html('El archivo que quiere adjuntar no es del formato requerido.');			
			$('#modal_mensaje').modal('show');
			//return false;
		
		}else{
							
			return true;
					
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
		
		document.getElementById('numerodetramite').value = '		
			
	}		
	function deshabilita_filtro_fechas(){	
			
		document.getElementById('numerodetramite').disabled = false;
		document.getElementById('fechadesde').disabled = true;		
		document.getElementById('fechafin').disabled = true;		
		document.getElementById('desplegableestadotramite').disabled = true;

		document.getElementById('fechadesde').value = '
		document.getElementById('fechafin').value = '
		document.getElementById('desplegableestadotramite').value = 0;		
	
	}
	*/
	</script>
  </body>
</html>
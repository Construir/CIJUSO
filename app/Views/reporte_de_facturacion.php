<div class="container col-10">
	<form action=""  method="post" enctype="multipart/form-data" name="formFiltro" id="formFiltro"> 
		
		<div class="row">
						
			<div class="col-md-2 mb-2">				
									
				<div class="form-group">
					<label for="fechadesde">Desde</label>
					<input onchange="remover_mensaje_error(this.id)" type="date" class="form-control" id="fechadesde" name="fechadesde" value="<?php echo $desde?>">				
				</div>			
				
			</div>
			
			<div class="col-md-2 mb-2">		
									
				<div class="form-group">
					<label for="fechahasta">Hasta</label>
					<input onchange="remover_mensaje_error(this.id)" type="date" class="form-control" id="fechahasta" name="fechahasta" value="<?php echo $hasta?>">				
				</div>			
				
			</div>			
		
			<div class="col-md-3 mb-3">				
									
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input onchange="remover_mensaje_error(this.id)" type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre?>">				
				</div>			
				
			</div>			
			
			<div class="col-md-2 mb-2">				
									
				<div class="form-group">
					<label for="documento">Documento</label>
					<input onchange="remover_mensaje_error(this.id)" type="number" class="form-control" id="documento" name="documento" value="<?php echo $documento?>">				
				</div>			
				
			</div>	
			
			<div class="col-md-2 mb-2">
			  
				<label class="invisible"  for="btn_buscar">Buscar</label>			
				<button type="button" id="btn_buscar" class="btn btn-primary form-control">Buscar</button>				
				
			</div>	
			
			<label style="display:none" id="mensaje_filtro"></label>
		</div>
			
	</form>
	
	<div class="card">
		 
		<div class="card-body">		
			
			<?php if(!empty($facturas)){?>
			
				<h5>Facturas</h5>
								
				<table id="tabla-inscriptos" style="font-size:80%" class="table table-striped table-sm">
				  <thead>
					<tr>
					 
					  <th style="width:12%">Fecha</th>
					  <th>Nombre</th>
					  <th>Dni</th>	
					  <th>Curso</th>						  	
					  <th>Estado</th>	
					  
					</tr>
				  </thead>
				  <tbody>
					
					<?php foreach($facturas as $factura){?>
						<tr>
			
							<td><?php echo date("d-m-Y H:i:s",strtotime($factura['FechaCreacion']))?></td>											
							<td><?php echo mb_strtoupper($factura['NombreComprador'])?></td>			
							<td><?php $factura['TarjetaDocumentoDeIdentificacion']?></td>			
							<td><?php echo mb_strtoupper($factura['Descripcion'])?></td>			
															
							<?php if($factura['IdEstadoFactura'] == 1){?>
								
								<td class="text-danger">Pendiente</td>
															
							<?php }else{ ?>
								
								<td class="text-success">Facturado</td>
								
							<?php } ?>										

						</tr>
					<?php }?>				
				  
				  </tbody>

				</table>
			
			<?php }else{?>				 
			
				  <div class="row">
					<div class="col-md-12">
					  <div style="color:red;border-left-color:red" class="callout callout-danger">
					    <h4>¡Atención!</h4>
						No se encontraron datos para los parámetros seleccionados.
					  </div>
					</div>
				  </div>
			
			<?php }?>
			
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
		<button type="button" class="btn btn-primary">Facturar</button>		
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


<!-- Bootstrap core JavaScript
    ================================================== -->
	<script type="text/javascript">	
	jQuery(document).ready(function() {	
		
		var screen = $('#loading-screen');
		$('#btn_buscar').on('click', function() {
		
			//if(validaFiltro()){
				screen.fadeIn();
				$("#formFiltro").attr("action","reporte_de_facturacion");	            
				$("#formFiltro").submit();	
				
			//}
			
		});	
				
		$('#tabla-inscriptos').stacktable();
		$('#tabla-inscriptos').DataTable( {
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
	function validaFiltro(){
		
		var fechadesde = $("#fechadesde").val();
		var fechahasta = $("#fechahasta").val();		
		var cuit_solicitante = $("#cuit_solicitante").val();			
		var validadoOK = true;
			
		if((fechadesde.length == 0) && (fechahasta.length == 0) && (cuit_solicitante.length == 0)){			
			
			if(perfil == 2){
				
				if(desplegablecolegio == 0){
				
					agregaMensajeValidacion($("#mensaje_filtro"), "Debe ingresar al menos un valor para la búsqueda");
					validadoOK = false;		
				
				}
			
			}else{
				
				agregaMensajeValidacion($("#mensaje_filtro"), "Debe ingresar al menos un valor para la búsqueda");
				validadoOK = false;		
				
			}
			
		}else{	
			
			if(cuit_solicitante.length > 0){
				
				if(!validaCuitCuil(cuit_solicitante)){			
					
					agregaMensajeValidacion($("#cuit_solicitante"), "Debe ingresar un CUIT válido");
					validadoOK = false;
			
				}			
			
			}else{

				if(fechadesde > fechahasta){
									
					agregaMensajeValidacion($("#mensaje_filtro"), "La fecha desde debe ser menor a la fecha de hasta");
					validadoOK = false;
							
				}
				
			}
			
		}
		
		return validadoOK;
		
	}
	</script>
  </body>
</html>
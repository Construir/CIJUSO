<div class="col-11" style=" margin-left: 3%;margin-right: 3%" >
	
	<div class="card">
		<div class="card-header" role="tab" id="headingOne">
		  <h5 class="mb-0">
			<a style="color: #ffb606 !important"  data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			 Cargar Archivo
			</a>
		  </h5>
		</div>
		<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" >							
			<div class="continer">						
				<form class="form-inline" action="<?php echo base_url()?>index.php/medicos/importar_archivo" method="post" enctype="multipart/form-data" name="formimportararchivo" id="formimportararchivo">													
						
					<div class="form-group" style="padding:5px">								
					  <div>
						<input style="margin:5px"class="" type="file" name="file" style="padding:0px;padding-top:5px"/>	
					   </div>
					   <button style="margin:5px" type="submit" id="botonimportar" name="botonimportar" class="btn btn-warning btn-sm" >Importar</button>	
					</div>
				</form>														
			</div>				
		</div>
	</div>
</div>
	
		
    <!-- Bootstrap core JavaScript
    ================================================== -->
	<script type="text/javascript">
	jQuery(document).ready(function() {
		$('#tabla-archivos').DataTable({	
			"lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "Todos"]],
			//"order": [[ 0, "desc" ]],			
			"ordering": false,	
			"info": false,	
			//"searching": false,		
			//"lengthChange": false,		
				
			"language":{
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"			
			}		
		});	
		$('#boton_limpiar_tabla_temporal').on('click', function() {
								
			$("#form_limpiar_tabla").attr("action","<?php echo base_url()?>index.php/adminroot/limpiar_tabla_temporal");	            
			$("#form_limpiar_tabla").submit();						
			
		});	
		
		$('#tabla-archivos').stacktable();
	
		if(mensajeErrorArchivo){
			$('#errorarchivo').modal('show');
		}
		if(importacionOK){
			$('#importacionOK').modal('show');
			//$('#doccompleto').find('input, textarea, button, select').attr('disabled',false);
		}
		$('#botonimportar').on('click', function() {		
			screen.fadeIn();			
		});
	
	});	
	function bloqueartodo() {
		 $('#doccompleto').find('input, textarea, button, select').attr('disabled','disabled');
	}
	function progressBarSim(al) {
		//$('#barradeprogreso').modal('show');
		  $('#doccompleto').find('input, textarea, button, select,a').attr('disabled','disabled');
		  var bar = document.getElementById('progressBar');
		  var status = document.getElementById('status');
		  status.innerHTML = al+"%";
		  bar.value = al;
		  al++;
			var sim = setTimeout("progressBarSim("+al+")",30);
			if(al == 100){
			  status.innerHTML = "100%";
			  bar.value = 100;
			  clearTimeout(sim);
			  var finalMessage = document.getElementById('finalMessage');
			  finalMessage.innerHTML = "El Proceso se Completo Exitosamente";
			   $('#doccompleto').find('input, textarea, button, select').attr('disabled',false);
			   $('#importacionOK').modal('show');
			}
	}
	function remover_mensaje_error(selector){
		
		 x = document.getElementById(selector).nextSibling;
		 if(x.nextElementSibling){
			x.nextElementSibling.remove();
		 }
	}		
	</script>
  </body>
</html>
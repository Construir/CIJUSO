<?php 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Cursos facturados.xls"');
header('Cache-Control: max-age=0');
?>
<style type="text/css">
	#tabla-bonos {
		border-collapse: collapse;
	}
	th {background-color:blue;}
	#tabla-bonos, th, td {
		border:  1px solid black;
	}
</style>
<?php if($facturas){?>
		<table class="table table-striped" id="tabla-bonos">
			  <thead>
				<tr>									  
				
				  <th style="text-align:center;background-color:#00B4CE">Fecha</th>
				  <th style="text-align:center;background-color:#00B4CE">Apellido y Nombre</th>
				  <th style="text-align:center;background-color:#00B4CE">Documento</th>
				  <th style="text-align:center;background-color:#00B4CE">Nombre del curso</th>
				  <th style="text-align:center;background-color:#00B4CE">Comprobante</th>												 													  
				  <th style="text-align:center;background-color:#00B4CE">CAE</th>				 
				  <th style="text-align:center;background-color:#00B4CE">Importe</th>													  
				 																	 
				</tr>
			  </thead>
			  <tbody>
				<?php foreach ($facturas as $factura) {?>	
					<tr>		
					  
					  <td style="text-align:center"><?php echo $factura['FechaFacturacion']?></td>
					  <td style="text-align:center"><?php echo utf8_decode($factura['NombreEnTarjeta'])?></td>					 							  
					  <td style="text-align:center"><?php echo $factura['TarjetaDocumentoDeIdentificacion']?></td>	
					  <td style="text-align:center"><?php echo wordwrap(utf8_decode($factura['Descripcion']),200,"<br>\n",TRUE)?></td>					  
					  <td style="text-align:center; mso-number-format:'0'"><?php echo $factura['NumeroComprobante']?></td>					 							  
					  <td style="text-align:center; mso-number-format:'0'"><?php echo (string)$factura['Cae']?></td>				 								  
					  <td style="text-align:center"><?php echo $factura['ValorTransaccion']?></td>			  					  
						
					</tr>
				<?php }?>
			  </tbody>
		</table>						
	<?php } ?>
  </body>
</html>

<?php 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Listado de Bonos.xls"');
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
<?php if($bonosabogado){?>
		<table class="table table-striped" id="tabla-bonos">
			  <thead>
				<tr>									  
				
				  <th style="text-align:center;background-color:#00B4CE">Fecha</th>
				  <th style="text-align:center;background-color:#00B4CE"><?php echo utf8_decode('Número de Bono')?></th>												 													  
				  <th style="text-align:center;background-color:#00B4CE"><?php echo utf8_decode('Carátula')?></th>
				  <th style="text-align:center;background-color:#00B4CE"><?php echo utf8_decode('Importe')?></th>
				  <th style="text-align:center;background-color:#00B4CE">Estado</th>													  
				 																	 
				</tr>
			  </thead>
			  <tbody>
				<?php foreach ($bonosabogado as $ba) {?>	
					<tr>		
					  
					  <td style="text-align:center"><?php echo $ba->fechabono?></td>
					  <td style="text-align:center; mso-number-format:'0' "><?php echo $ba->numero_de_bono?></td>								  
					  <td style="text-align:center"><?php echo wordwrap(utf8_decode($ba->case_name),100,"<br>\n",TRUE)?></td>
					  <td style="text-align:center; mso-number-format:'0' "><?php echo substr($ba->price, 0,3);?></td>
						<?php if($ba->estadobono =='Generado'){?>
							<td style="text-align:center; color:orange"><?php echo $ba->estadobono ?></td>	
						<?php }elseif($ba->estadobono =='Pagado'){?>
							<td style="text-align:center; color:green"><?php echo $ba->estadobono ?></td>
						<?php }elseif($ba->estadobono =='Vencido'){?>
							<td style="text-align:center; color:grey" ><?php echo $ba->estadobono ?></td>
						<?php }elseif($ba->estadobono =='Anulado'){?>		
							<td style="text-align:center"><?php echo $ba->estadobono ?></td>
						<?php }elseif($ba->estadobono =='Eliminado'){?>															
							<td style="text-align:center; color:red"><?php echo $ba->estadobono ?></td>															
						<?php }elseif($ba->estadobono =='Utilizado'){?>
							<td style="text-align:center; color:blue"><?php echo $ba->estadobono ?></td>	
						<?php }?>							  
						
					</tr>
				<?php }?>
			  </tbody>
		</table>						
	<?php } ?>
  </body>
</html>

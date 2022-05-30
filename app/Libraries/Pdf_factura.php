<?php
namespace App\Libraries;

class Pdf_factura{	

	public function imprimir($data,$donde_imprimir){
		
		require_once("vendor/autoload.php"); 
		$mpdf = new \Mpdf\Mpdf();				
		
		$factura_completa = $data['factura'];
		
		$html = '
			<style type="text/css">
			
			</style>';

		if(!empty($data["id_factura"])){					

			$html .= '
				<!DOCTYPE html>
				<html lang="en">
				  <head>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
					<meta name="description" content="">
					<meta name="author" content="Ialonardi Nestor Claudio">
					
					<title>Factura</title>	  
				  
				</head>
				<body>
					<table class="table" style="margin-bottom:1px">	
							<tbody>
								<tr>
									<td style="font-size:20px;text-align:center; border: 0.5px solid #000000"><b>ORIGINAL</b></td>									
								</tr>
																					
							</tbody>
						</table>
						<table class="table" style="margin-bottom:0px">	
							<tbody>
								
								<tr>						
									<td style="width:45%;border-left: 0.5px solid #000000;border-top: 0.5px solid #000000"></td>
									<td style="padding:1px;text-align:center;border: 0.5px solid #000000">	
										
										<label style="font-size:23px"><b>C</b></label>
										<br>												
										<label style="font-size:10px"><b>COD. 011</b></label>
										
									</td>	
									<td style="width:45%;border-right: 0.5px solid #000000;border-top: 0.5px solid #000000"><p style="font-size:20px"><b>FACTURA</b></p></td>								  
								</tr>
																					
							</tbody>
						</table>						
						<table class="table" style="margin-bottom:1px" border="1" cellspacing="0">	
							<tbody>								
								<tr>
								
								  <td style="width:50%;border-top:0.5px solid #FFFF;border-right: 0.5px solid #000000;border-left: 0.5px solid #000000;border-bottom: 0.5px solid #000000">
									<p style="font-size:15px"><b>Razón Social:</b> CIJUSO</p>															
									<p style="font-size:15px"><b>Domicilio Comercial:</b> Salta 2366 Mar del Plata</p>
									<p style="font-size:15px"><b>Condición frente al IVA:</b> Responsable Monotributo</p>																						
								  </td>
								  <td style="width:50%;border-top:0.5px solid #FFFF;border-right: 0.5px solid #000000;border-left: 0.5px solid #000000;border-bottom: 0.5px solid #000000">	
									
									<p style="margin-left:11%;font-size:15px"><b>Punto de Venta: 02 Comp. Nro. 00032521</b></p>
									<p style="margin-left:11%;font-size:15px"><b>Fecha de Emisión: 01/07/2021</b></p><br>												
									<p style="margin-left:11%;font-size:15px"><b>CUIT:</b> 27270194058</p>
									<p style="margin-left:11%;font-size:15px"><b>Ingresos Brutos:</b> 27270194058</p>
									<p style="margin-left:11%;font-size:15px"><b>Fecha de Inicio de Actividad:</b> 27270194058</p>
									
								  </td>							
								</tr>														
							</tbody>
						</table>
						
						<table class="table" style="margin-bottom:1px">	
							<tbody>													
								  
								<tr>
									
									<td style="font-size:12px;width:40%;border-left: 0.5px solid #000000;border-bottom: 0.5px solid #000000;border-top: 0.5px solid #000000"><b>Período facturado desde:</b> 01/01/2021</td>
									<td style="font-size:12px;width:22%;border-bottom: 0.5px solid #000000;border-top: 0.5px solid #000000"><b>Hasta:</b> 01/05/2021</td>
									<td style="font-size:12px;width:30%;border-right: 0.5px solid #000000;border-bottom: 0.5px solid #000000;border-top: 0.5px solid #000000"><b>Fecha de vencimiento para el pago:</b> 30/05/2021</td>
									
								</tr>
															
							</tbody>
						</table>								
						<table class="table" style="margin-bottom:1px">	
							<tbody>													
								  
								<tr style="border: 0.5px solid #000000">
									
									<td style="font-size:12px;width:50%">
										<p><b>CUIT </b> 45654564343313<p>
										<p><b>Condición frente al IVA</b> IVA sujeto exento<p>
										<p><b>Condición de venta</b> Contado<p>
									</td>								
									
									<td style="font-size:12px;width:50%">
										<p><b>Apellido y Nombre / Razón Social </b> Martin Perez<p>
										<p><b>Domicilio</b> Rivadavia 2025 Mar del Plata<p>
																				
									</td>
									
								</tr>
															
							</tbody>
						</table>		
				
						<table class="table" style="margin-bottom:300px">
							<thead>
								<tr style="background:#cdcdcd">								
									<th style="font-size:12px;text-align:center;color:#000000; border: 0.5px solid #000000">Código</th>																																	 
									<th style="font-size:12px;text-align:center;color:#000000; border: 0.5px solid #000000">Producto/Servicio</th>																																													 
									<th style="font-size:12px;text-align:center;color:#000000; border: 0.5px solid #000000">Cantidad</th>																																							 
									<th style="font-size:12px;text-align:center;color:#000000; border: 0.5px solid #000000">U. Medida</th>																																							 
									<th style="font-size:12px;text-align:center;color:#000000; border: 0.5px solid #000000">Precio Unit.</th>																																							 
									<th style="font-size:12px;text-align:center;color:#000000; border: 0.5px solid #000000">% Bonif.</th>																																							 
									<th style="font-size:12px;text-align:center;color:#000000; border: 0.5px solid #000000">Imp. Bonif.</th>																																							 
									<th style="font-size:12px;text-align:center;color:#000000; border: 0.5px solid #000000">Subtotal</th>																																							 
																																															 
								</tr>
							</thead>
							<tbody>					
									
								<tr>										
											
									<td style="font-size:12px;text-align:center">6666</td>
									<td style="font-size:12px;text-align:center">Curso de Derechos Humanos</td>
									<td style="font-size:12px;text-align:center">1.00</td>
									<td style="font-size:12px;text-align:center">unidades</td>
									<td style="font-size:12px;text-align:center">5.000,00</td>
									<td style="font-size:12px;text-align:center">0,00</td>
									<td style="font-size:12px;text-align:center">0.00</td>
									<td style="font-size:12px;text-align:right">5.000,00</td>
																				
								</tr>							 
								
							</tbody>									  
						</table>
						
						<table style="margin-bottom:1px" class="table">	
							<tbody>
								<tr>
									<td style="text-align:right; border: 0.5px solid #000000">
										<p><b>Subtotal: $5.000,00</b><p>
										<p><b>Importes otros tributos: $0,00</b><p>
										<p><b>Importe Total: $5.000,00</b><p>									
									</td>
									
								</tr>													
								</tr>														
							</tbody>
						</table>
						<table class="table">	
							<tbody>													
								  
								<tr>
									
									<td style="font-size:15px;width:40%">
										<img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=https://bonos.cpacr.org.ar/Bonosadmin/index.php/ImprimirBonoQR/descargar?idbono=888" width="80" height="80" ></img>
									</td>
									
									<td style="font-size:15px;width:22%">Pág. 1/1</td>
									
									<td style="font-size:15px;width:30%">
										<p><b>CAE </b> 45654564343313<p>
										<p><b>Fecha de Vto. de CAE</b> 31/10/2021<p>										
									</td>
									
								</tr>
															
							</tbody>
						</table>						
			
				
			</body>
		</html>';
								
	    }else{
			
            $html = "No se pudo recuperar la información de la consulta";
			
        }
	
		$cadena_footer = '';
	
		$mpdf->setFooter($cadena_footer.date('d-m-Y'));	
		

		
		$mpdf->WriteHTML($html);					
		
		if($donde_imprimir == 0){
			
			$mpdf->Output('Factura.pdf', \Mpdf\Output\Destination::DOWNLOAD);
			
		}else{
			
			$mpdf->Output('Factura.pdf', \Mpdf\Output\Destination::INLINE);			
			
		}
	
	}	
	public function imprimir_original($data,$donde_imprimir){
		
		require_once("vendor/autoload.php"); 
		$mpdf = new \Mpdf\Mpdf();				
		
		$factura_completa = $data['factura'];
		
		$html = '
			<style type="text/css">
			
			</style>';

		if(!empty($data["id_factura"])){					
					
			$html = '
			<style type="text/css">
			
			</style>';

			$html .= '
				<!DOCTYPE html>
				<html lang="en">
				  <head>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
					<meta name="description" content="">
					<meta name="author" content="Ialonardi Nestor Claudio">
					
					<title>Factura</title>	  
				  
				</head>
				<body>

				 <table class="table table-responsive">	
					<tbody>
						<tr>							
						  <td style="width:500">
							<img src="'.$data["logo"].'" width="200" ></img><br>												
						  </td>
						  <td style="width:200;size-text:20px;float:right">	
							<b>FACTURA</b>
						  </td>							
						</tr>				
					</tbody>
				</table>			
								
				<br>
					<table class="table table-responsive">	
						<tbody>
							<tr>							
							  <td style="width:500">
								<p style="width:500;font-size:12px"><b>EMPRESA</b></p>															
								<p style="width:500;font-size:12px">Dirección: Salta 2366</p>
								<p style="font-size:12px">Teléfono: 456-9893</p>
								<p style="font-size:12px">Email: info_cijuso@gmail.com</p>
								<br>									
								<p style="font-size:12px">C.A.E. 99896852</p>	
								<p style="font-size:12px">Comprobante '.$data["id_factura"].'</p>	
								<p style="font-size:12px">Fecha '.date("d-m-Y").'</p>	
							  </td>
							  <td style="width:200">	
								<p style="font-size:12px"><b>CLIENTE</b></p>
								<p style="font-size:12px">Nombre:Ialonardi Claudio</p>												
								<p style="font-size:12px">Dirección: Catamarca 1699</p>
								<p style="font-size:12px">Teléfono: 556-2113</p>
								<p style="font-size:12px">Email: ialonaridclaudio@gmail.com</p>
							  </td>							
							</tr>				
						</tbody>
					</table>				
				<br>				
			
				<table style="border-collapse: collapse" class="table table-striped">
						<thead>
							<tr style="background:#ffb606">								
								<th style="text-align:center;width:10%;color:#FFFFFF; border: 0.5px solid #a9acb0">Orden</th>																																	 
								<th style="text-align:center;width:40%;color:#FFFFFF; border: 0.5px solid #a9acb0">Descripción</th>																																													 
								<th style="text-align:center;width:10%;color:#FFFFFF; border: 0.5px solid #a9acb0">Medio de pago</th>																																							 
								<th style="text-align:center;width:10%;color:#FFFFFF; border: 0.5px solid #a9acb0">Importe</th>																																							 
																																														 
							</tr>
						</thead>
						<tbody>';
							
							foreach ($factura_completa as $factura){	
								
$html .= '						<tr>										
										
									<td style="text-align:center;width:10%; border: 0.5px solid #a9acb0">'.$factura['IdOrden'].'</td>
									<td style="text-align:center;width:40%; border: 0.5px solid #a9acb0">'.$factura['Descripcion'].'</td>
									<td style="text-align:center;width:10%; border: 0.5px solid #a9acb0">'.$factura['Franquicia'].'</td>
									<td style="text-align:right;width:10%; border: 0.5px solid #a9acb0">$'.number_format($factura['ValorProcesamiento'],2,",",".").'</td>
																				
								</tr>
								
								<tr style="background: #dee2e6">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="background: #dee2e6">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="background: #dee2e6;">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="background: #dee2e6;">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="background: #dee2e6;">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>	
								
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="background: #dee2e6;">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="background: #dee2e6;">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="background: #dee2e6;">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="">									
										
									<td style="text-align:center;color: #FFFFFF">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF">dummy_text</td>
									<td style="text-align:center;text-align:right;padding-top:5px;padding-bottom:5px"><b>Total parcial</b></td>									
									<td style="text-align:right;float:right;border-bottom: 2px solid #dee2e6;padding-top:5px;padding-bottom:5px">$'.number_format($factura['ValorProcesamiento'],2,",",".").'</td>
																				
								</tr>
								
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF">dummy_text</td>
									<td style="text-align:center;text-align:right;padding-top:5px;padding-bottom:5px"><b>Descuentos</b></td>									
									<td style="text-align:right;float:right;border-bottom: 2px solid #dee2e6;padding-top:5px;padding-bottom:5px">0.00%</td>
																				
								</tr>								
				
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF">dummy_text</td>
									<td style="text-align:center;text-align:right;color:#ffb606;font-weight: bold;size-text:25px;padding-top:5px;padding-bottom:5px"><b>TOTAL FACTURA</b></td>									
									<td style="text-align:right;float:right;border-bottom: 2px solid #dee2e6;font-weight: bold;size-text:25px;background:#ffb606;color:#FFFFFF;padding-top:5px;padding-bottom:5px">$'.number_format($factura['ValorProcesamiento'],2,",",".").'</td>
																				
								</tr>';

							} 
							
$html .= '				</tbody>									  
					</table>						
			
				
			</body>
		</html>';
								
	    }else{
			
            $html = "No se pudo recuperar la información de la consulta";
			
        }
	
		$cadena_footer = '';
	
		$mpdf->setFooter($cadena_footer.date('d-m-Y'));	
		

		
		$mpdf->WriteHTML($html);					
		
		if($donde_imprimir == 0){
			
			$mpdf->Output('Factura.pdf', \Mpdf\Output\Destination::DOWNLOAD);
			
		}else{
			
			$mpdf->Output('Factura.pdf', \Mpdf\Output\Destination::INLINE);			
			
		}
	
	}
	public function imprimir_y_enviar($data){
		
		require_once("vendor/autoload.php"); 
		$mpdf = new \Mpdf\Mpdf();				
		
		$factura_completa = $data['factura'];
		
		$html = '
			<style type="text/css">
			
			</style>';

		if(!empty($data["id_factura"])){					
					
			$html = '
			<style type="text/css">
			
			</style>';

			$html .= '
				<!DOCTYPE html>
				<html lang="en">
				  <head>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
					<meta name="description" content="">
					<meta name="author" content="Ialonardi Nestor Claudio">
					
					<title>Factura</title>	  
				  
				</head>
				<body>

				 <table class="table table-responsive">	
					<tbody>
						<tr>							
						  <td style="width:500">
							<img src="'.$data["logo"].'" width="200" ></img><br>												
						  </td>
						  <td style="width:200;size-text:20px;float:right">	
							<b>FACTURA</b>
						  </td>							
						</tr>				
					</tbody>
				</table>			
								
				<br>
					<table class="table table-responsive">	
						<tbody>
							<tr>							
							  <td style="width:500">
								<p style="width:500;font-size:12px"><b>EMPRESA</b></p>															
								<p style="width:500;font-size:12px">Dirección: Salta 2366</p>
								<p style="font-size:12px">Teléfono: 456-9893</p>
								<p style="font-size:12px">Email: info_cijuso@gmail.com</p>
								<br>									
								<p style="font-size:12px">C.A.E. 99896852</p>	
								<p style="font-size:12px">Comprobante '.$data["id_factura"].'</p>	
								<p style="font-size:12px">Fecha '.date("d-m-Y").'</p>	
							  </td>
							  <td style="width:200">	
								<p style="font-size:12px"><b>CLIENTE</b></p>
								<p style="font-size:12px">Nombre:Ialonardi Claudio</p>												
								<p style="font-size:12px">Dirección: Catamarca 1699</p>
								<p style="font-size:12px">Teléfono: 556-2113</p>
								<p style="font-size:12px">Email: ialonaridclaudio@gmail.com</p>
							  </td>							
							</tr>				
						</tbody>
					</table>				
				<br>				
			
				<table style="border-collapse: collapse" class="table table-striped">
						<thead>
							<tr style="background:#ffb606">								
								<th style="text-align:center;width:10%;color:#FFFFFF; border: 0.5px solid #a9acb0">Orden</th>																																	 
								<th style="text-align:center;width:40%;color:#FFFFFF; border: 0.5px solid #a9acb0">Descripción</th>																																													 
								<th style="text-align:center;width:10%;color:#FFFFFF; border: 0.5px solid #a9acb0">Importe</th>																																							 
								<th style="text-align:center;width:10%;color:#FFFFFF; border: 0.5px solid #a9acb0">Total</th>																																							 
																																														 
							</tr>
						</thead>
						<tbody>';
							
							foreach ($factura_completa as $factura){	
								
$html .= '						<tr>										
										
									<td style="text-align:center;width:10%; border: 0.5px solid #a9acb0">'.$factura['IdOrden'].'</td>
									<td style="text-align:center;width:40%; border: 0.5px solid #a9acb0">'.$factura['Descripcion'].'</td>
									<td style="text-align:center;width:10%; border: 0.5px solid #a9acb0">'.$factura['ValorProcesamiento'].'</td>
									<td style="text-align:right;width:10%; border: 0.5px solid #a9acb0">'.$factura['ValorProcesamiento'].'</td>
																				
								</tr>
								
								<tr style="background: #dee2e6">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="background: #dee2e6">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="background: #dee2e6;">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="background: #dee2e6;">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="background: #dee2e6;">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>	
								
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="background: #dee2e6;">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="background: #dee2e6;">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="background: #dee2e6;">									
										
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #dee2e6; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF; border: 0.5px solid #a9acb0">dummy_text</td>
																				
								</tr>
								
								<tr style="">									
										
									<td style="text-align:center;color: #FFFFFF">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF">dummy_text</td>
									<td style="text-align:center;text-align:right;padding-top:5px;padding-bottom:5px"><b>Total parcial</b></td>									
									<td style="text-align:right;float:right;border-bottom: 2px solid #dee2e6;padding-top:5px;padding-bottom:5px">'.$factura['ValorProcesamiento'].'</td>
																				
								</tr>
								
								<tr>									
										
									<td style="text-align:center;color: #FFFFFF">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF">dummy_text</td>
									<td style="text-align:center;text-align:right;padding-top:5px;padding-bottom:5px"><b>Descuentos</b></td>									
									<td style="text-align:right;float:right;border-bottom: 2px solid #dee2e6;padding-top:5px;padding-bottom:5px">0.00%</td>
																				
								</tr>								

								<tr>									
										
									<td style="text-align:center;color: #FFFFFF">dummy_text</td>
									<td style="text-align:center;color: #FFFFFF">dummy_text</td>
									<td style="text-align:center;text-align:right;color:#ffb606;font-weight: bold;size-text:25px;padding-top:5px;padding-bottom:5px"><b>TOTAL FACTURA</b></td>									
									<td style="text-align:right;float:right;border-bottom: 2px solid #dee2e6;font-weight: bold;size-text:25px;background:#ffb606;color:#FFFFFF;padding-top:5px;padding-bottom:5px">'.$factura['ValorProcesamiento'].'</td>
																				
								</tr>';

							} 
							
$html .= '				</tbody>									  
					</table>						
			
				
			</body>
		</html>';
								
	    }else{
			
            $html = "No se pudo recuperar la información de la consulta";
			
        }
	
		$cadena_footer = '';
	
		$mpdf->setFooter($cadena_footer.date('d-m-Y'));	
		
		$mpdf->WriteHTML(utf8_encode($html));
		$mpdf->Output('Factura.pdf', \Mpdf\Output\Destination::DOWNLOAD);
		
	}
	function prueba_email(){
		
		$mpdf->WriteHTML(utf8_encode($html));
		$content = $mpdf->Output('', 'S');	
		
		$attachment = new Swift_Attachment($content, 'filename.pdf', 'application/pdf');

		$message = Swift_Message::newInstance()
		  ->setSubject('Factura CIJUSO')
		  ->setFrom(array('cijuso@gmail.com' => 'CIJUSO'))
		  ->setTo(array('ialonaridclaudio@gmail' => 'Estimado Ialonardi Claudio'))
		  ->setBody('Ya podés acceder a tu factura CIJUSO')
		  ->attach($attachment);

		$transport = Swift_MailTransport::newInstance();

		// Create the Mailer using your created Transport
		$mailer = Swift_Mailer::newInstance($transport);

		// Send the created message
		$mailer->send($message);

		// Then, you can send PDF to the browser
		$mpdf->Output($filename ,'I');		
	}
}

?>
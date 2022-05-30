<?php
namespace App\Libraries;

class Enviar_mail{	

	public function enviar_mail($data){	
	
		$mensaje = "";
		$mensaje .= '<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="m_4212806947671067424wrapper" style="border-collapse:collapse;border-spacing:0;border:none!important" width="100%">
						<tbody>				   
					   
							<tr> 
								<td align="center" style="margin:0;border:0;padding:0" width="100%">
									<table align="center" bgcolor="#f2f2f2" border="0" cellpadding="0" cellspacing="0" class="m_4212806947671067424deviceWidth" style="max-width:600px;border-collapse:collapse;border-spacing:0;border:none!important" width="100%">
									   <tbody>
											
										  <tr>
										  
											 <td align="center" style="font-size:0px;border:none!important" valign="top" width="100%">
												 <div style="display:inline-block;max-width:300px;vertical-align:top;width:300px">
													 <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0;max-width:300px" width="100%">
														<tbody>
														   <tr>
																<td style=" background-color: #ffb606 !important">
																	<img style="margin-bottom:10px;margin-top:10px;margin-left:10px" src="http://admin.cijuso.org.ar/imagenes/logo-cijuso.png" width="180">
																</td>
														   </tr>
														</tbody>
													 </table>
												 </div>											 

												 <div style="display:inline-block;max-width:300px;vertical-align:top;width:300px">
													 <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0;max-width:300px" width="100%">
														<tbody>
														   <tr>
																<td align="center" height="81" style="background-color: #ffb606;margin:0;padding:0;border:0;color:#6e6e71;font-family:Segoe,Segoe UI,Verdana,sans-serif;font-size:13px;text-align:center;font-weight:700;padding-right:0;padding-left:0px;padding-top:5px;padding-bottom:0px" valign="middle" width="100%">&nbsp;¡Hola '.$data["titular"].'!</td>
														   </tr>
														</tbody>
													 </table>
												 </div>
											 </td>
										  </tr>
									   </tbody>
									</table>

								</td>
							</tr>
	   
							<tr> 
								 <td align="center" style="margin:0;border:0;padding:0" width="100%">

									<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0;max-width:600px" width="100%" bgcolor="#f4f4f4">
										<tbody>
										  
											<tr>
												<td align="center" style="font-size:0px;border:none!important;padding-bottom:0px" valign="middle" width="100%">
												  
												  <img alt="" border="0" src="https://ci3.googleusercontent.com/proxy/zh_g_NFj_OfRBN-ljHn1AiD8k2qhuyjuarI9B6TGa3mryD2GWNfXxR5qkM9IbvUCMkFlipBA933iQKZfGWtWT1wZyUzoKINTR7rJt_Sohl3Hb2Czmyb83HIUmdnFLApYMHZ6094zZPMGuOL4_FaVA2u-WMdEhzJuLt3Jh_8XgU6oQrEJTcCAwg=s0-d-e1-ft#https://static.cdn.responsys.net/i2/responsysimages/cabfi/contentlibrary/facturafan/clientes/header/images/header.jpg" style="display:block;padding:0;margin:0 auto!important;outline:none;border:none!important" width="100%" class="CToWUd a6T" tabindex="0">
												  
												</td>
											</tr>
												   
										</tbody>
									</table>
												
								</td>
							</tr> 
	   	   
							<tr> 
								<td align="center" style="margin:0;border:0;padding:0" width="100%"></td>
							</tr>    
	   
							<tr> 
								<td align="center" style="margin:0;border:0;padding:0" width="100%">
									
									<table align="center" bgcolor="#eeeeee" border="0" cellpadding="0" cellspacing="0" class="m_4212806947671067424deviceWidth" style="max-width:600px;border-collapse:collapse;border-spacing:0;border:none!important" width="100%">
									   <tbody>
										  <tr>
											 <td align="center" colspan="3" style="font-size:0px;border:none!important;padding-bottom:0px" valign="top" width="100%"><img alt="" border="0" src="https://ci6.googleusercontent.com/proxy/TcT6cvVcG59PufJ2d814z84uxyYiMOcK0Ph1Lb-Cu-Sl3xwpIxWdvw5K2IJSP1jyjPSQkkhwfy3o_GO-nC7iBvY1sMeyyGcVcnM_2_rf4EgNnQu6m5kfw7sfJD5C9bPCyi0ec6IMQFYprVvKF3f_Wad7T_4FZKiQPQzLf4FDALQzAsu1=s0-d-e1-ft#https://static.cdn.responsys.net/i2/responsysimages/cabfi/contentlibrary/facturafan/clientes/images/spacer600.png" style="display:block;padding:0!important;margin:0 auto!important;outline:none;border:none!important" width="100%" class="CToWUd"></td>
										  </tr>
										  <tr>
											 <td width="7%"></td>
											 <td bgcolor="#FFFFFF" style="margin:0;border:0;padding:0;font-family:Lucida Sans,Segoe UI,Lucida Grande,Lucida Sans Unicode,Verdana,sans-serif;font-size:16px;line-height:20px;font-weight:400;color:#333333;text-align:left;border:none!important" width="86%">
											 <table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tbody>
												   <tr>
													  <td bgcolor="#ffb606" style="padding-left:30px;padding-top:10px;padding-bottom:10px;padding-right:5px;font-family:Arial,sans-serif;font-size:14px;line-height:20px;font-weight:400;color:#ffffff;text-align:left;border:none!important" width="100%">RESUMEN DE CUENTA</td>
												   </tr>
												   <tr>
													  <td bgcolor="#ffb606" height="1" style="padding:0px;font-family:Arial,sans-serif;font-size:15px;line-height:20px;font-weight:400;color:#ffffff;text-align:left;border:none!important" width="100%"></td>
												   </tr>
												</tbody>
											 </table>

											 <table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tbody>
												   <tr>
													  <td style="padding-left:30px;padding-top:20px;padding-bottom:5px;padding-right:10px;font-family:Arial,sans-serif;font-size:15px;line-height:20px;font-weight:400;color:#555555;text-align:left;border:none!important" width="100%"><strong style="font-weight:700;color:#555555">Total a pagar:</strong> &nbsp;$'.$data['total_a_pagar'].'</td>
												   </tr>
												</tbody>
											 </table>

											 <table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tbody>
												   <tr>
													  <td style="padding-left:30px;padding-top:5px;padding-bottom:5px;padding-right:10px;font-family:Arial,sans-serif;font-size:15px;line-height:20px;font-weight:400;color:#555555;text-align:left;border:none!important" width="100%"><strong style="font-weight:700;color:#555555">Método de pago:</strong> '.$data['medio_de_pago'].'</td>
												   </tr>
												</tbody>
											 </table>

											 <table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tbody>
												   <tr>
													  <td style="padding-left:30px;padding-top:5px;padding-bottom:5px;padding-right:10px;font-family:Arial,sans-serif;font-size:15px;line-height:20px;font-weight:400;color:#555555;text-align:left;border:none!important" width="100%"><strong style="font-weight:700;color:#555555">Referencia de pago:</strong>&nbsp;'.$data['numero_de_orden'].'</td>
												   </tr>
												</tbody>
											 </table>

											 </td>
											 <td width="7%"></td>
										  </tr>
										  
									   </tbody>
									</table>

								</td>
							</tr> 
	   
							<tr> 
								<td align="center" style="margin:0;border:0;padding:0" width="100%"></td>
							</tr> 
	      
							<tr> 
								<td align="center" style="margin:0;border:0;padding:0" width="100%"></td>
							</tr> 
       
							<tr> 
								<td align="center" style="margin:0;border:0;padding:0" width="100%">

									<table align="center" bgcolor="#eeeeee" border="0" cellpadding="0" cellspacing="0" class="m_4212806947671067424deviceWidth" style="max-width:600px;border-collapse:collapse;border-spacing:0;border:none!important" width="100%">
										<tbody>
											
											<tr>
											  <td align="center" colspan="3" style="font-size:0px;border:none!important;padding-bottom:0px" valign="top" width="100%"><img alt="" border="0" src="https://ci6.googleusercontent.com/proxy/TcT6cvVcG59PufJ2d814z84uxyYiMOcK0Ph1Lb-Cu-Sl3xwpIxWdvw5K2IJSP1jyjPSQkkhwfy3o_GO-nC7iBvY1sMeyyGcVcnM_2_rf4EgNnQu6m5kfw7sfJD5C9bPCyi0ec6IMQFYprVvKF3f_Wad7T_4FZKiQPQzLf4FDALQzAsu1=s0-d-e1-ft#https://static.cdn.responsys.net/i2/responsysimages/cabfi/contentlibrary/facturafan/clientes/images/spacer600.png" style="display:block;padding:0!important;margin:0 auto!important;outline:none;border:none!important" width="100%" class="CToWUd"></td>
											</tr>
										
											<tr>
											  <td width="7%">
											  </td>
											  <td bgcolor="#FFFFFF" style="margin:0;border:0;padding:0;padding-top:20px;padding-left:20px;padding-right:20px;padding-bottom:2px;font-family:Arial,sans-serif;font-size:16px;line-height:20px;font-weight:700;color:#333333;text-align:center;border:none!important" width="86%">Puede descargar su Factura desde aquí
											  </td>
											  <td width="7%">
											  </td>
											</tr>
											
											<tr>
											  <td width="7%">
											  </td>
											  <td bgcolor="#FFFFFF" style="margin:0;border:0;padding:0;padding-top:10px;padding-left:20px;padding-right:20px;padding-bottom:30px;text-align:center;border:none!important" width="86%">
													
													<form style="margin-left:3%" class="form-inline" action="http://admin.cijuso.org.ar/index.php/Cijuso/imprimir_factura_mail" method="post" enctype="multipart/form-data" id="formimprimirfactura" name="formimprimirfactura">
														<input type="hidden" name="id_factura" id="id_factura" value="'.$data['id_factura'].'">
														<button style="border: none;color:#FFFFFF;padding-left:30px;padding-right:30px;padding-top:10px;padding-bottom:10px;border-radius: 50px;background-color: #ffb606 !important" type="submit" name="btn_imprimir" id="btn_imprimir" class="btn">IMPRIMIR FACTURA</button>
													</form>	
											  </td>
											  <td width="7%">
											  </td>
											</tr>
											
											<tr>
											  <td align="center" colspan="3" style="font-size:0px;border:none!important;padding-bottom:6px" valign="top" width="100%"></td>
											</tr>
											
											<tr>
												 <td width="7%"></td>
												 <td bgcolor="#FFFFFF" style="margin:0;border:0;padding:0;font-family:Lucida Sans,Segoe UI,Lucida Grande,Lucida Sans Unicode,Verdana,sans-serif;font-size:16px;line-height:20px;font-weight:400;color:#333333;text-align:center;border:none!important" width="86%"></td>
												 <td width="7%"></td>
											</tr>																				
										</tbody>
									</table>

								</td>
							</tr> 
							<br><br>
						</tbody>
					</table>';

		
		ini_set( 'display_errors', 1 );
		error_reporting( E_ALL );
		
		$from = "cijuso@gmail.com.ar";
		$to = $data['mail_destino'];
		$subject = 'Factura CIJUSO';
		$message = $mensaje;
		
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";		
		$headers .= "From:" . $from;
		
		//$headers .= "Reply-To: no-reply@colproba.org.ar";
		$resultado = mail($to,$subject,$message, $headers);
	
	}
}

?>
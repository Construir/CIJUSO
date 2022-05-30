<?php 
namespace App\Controllers;

use App\Models\Usuario_modelo;
use App\Models\Facturacion_modelo;
use App\Models\Importaciones_modelo;
use App\Models\Inscriptos_modelo;
use App\Libraries\Pdf_factura as pdf_factura;
use App\Libraries\Enviar_mail as email;

class Cijuso extends BaseController{
	
	public $session = null;

	function index($mensaje = null){
		
		//INSTANCIA DE MODELOS
		$session = \Config\Services::session();
		$session->destroy();				
				
		if(empty($mensaje)){
			
			$mensaje = '';
			
		}else{
		
			$mensaje = $mensaje;

		}
		$data = array('mensaje' => $mensaje,
					  
		);		
		
		echo view('login',$data);
		
	}
	function valida_usuario(){		
		
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$usuario_modelo = new Usuario_modelo($db);
		$importaciones_modelo = new Importaciones_modelo($db);
			
		if($request->getPostGet('usuario')){	
				
			$datos_usuario = $usuario_modelo->where('Usuario' , $request->getPostGet('usuario'))
										    ->where('Contrasenia' , $request->getPostGet('contrasenia'))
										    ->findAll();			
	
			if(!empty($datos_usuario)){		
				
				$data = array('importaciones' => $importaciones_modelo->devolver_importaciones(),	
							  'archivo_subido_ok' => false,				
							  'archivo_ya_existe' => false,				
				);
				
				$array = array('apellido_y_nombre' => $datos_usuario[0]['Apellido'].' '.$datos_usuario[0]['Nombre'],
							   'perfil' => $datos_usuario[0]['IdPerfil'],								   
							   'id_usuario' => $datos_usuario[0]['IdUsuario'],								   
				);											  
				$session->set($array);				
						
				echo view('encabezado');			
				echo view($this->barra_navegacion_por_permiso($session->get('perfil')),$this->armar_datos_desesion());
				echo view('importaciones',$data);			
											
			}else{	
				
				$existe_usuario =  $usuario_modelo->where('Usuario' , $request->getPostGet('usuario'))->findAll();
				
				if(!empty($existe_usuario)){
					
					$this->index('CONTRASEÑA INCORRECTA');					
					
				}else{
				
					$this->index('USUARIO NO REGISTRADO.');					
					
				}
				
			}
			
		}	
		
	}
	function administrar_lotes($mensaje = null){
		
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$importaciones_modelo = new Importaciones_modelo($db);
		
		if(!empty($mensaje)){
			
			$mensaje_ya_existe = $mensaje;
			
		}else{
			
			$mensaje_ya_existe = false;
			
		}
		
		$data = array('importaciones' => $importaciones_modelo->devolver_importaciones(),	
					  'archivo_subido_ok' => false,
					  'archivo_ya_existe' => $mensaje_ya_existe,
				);
		
		echo view('encabezado');			
		echo view($this->barra_navegacion_por_permiso($session->get('perfil')),$this->armar_datos_desesion());
		echo view('lotes',$data);	
		
	}	
	function facturar_pendientes(){
		
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$facturacion_modelo = new Facturacion_modelo($db);
		$importaciones_modelo = new Importaciones_modelo($db);
		
		//TRAE TODOS LOS CURSOS SIN FACTURAS DE ESE LOTE
		$facturas = $facturacion_modelo->where('IdLote' , $request->getPostGet('id_lote'))
									   ->where('IdEstadoFactura' , 1)
									   ->findAll();		
		
		if(!empty($facturas)){
		
			foreach($facturas as $factura){
			
				$id_factura = $factura['IdFacturacion'];
				
				$datos = ['id_factura' => $id_factura,	
						  'mail_destino' => $factura['EmailDelPagador'],				 
						  'total_a_pagar' => number_format($factura['ValorProcesamiento'],2,",","."),				 				 
						  'medio_de_pago' => $factura['Franquicia'],				 
						  'numero_de_orden' => $factura['IdOrden'],				 
						  'descripcion' => $factura['Descripcion'],				 
						  'titular' => ucwords(strtolower($factura['NombreEnTarjeta'])),				 
				];
				
				$cae = $this->facturar_afip($datos);
				
				if(!empty($cae)){
					
					$data = ['FechaFacturacion' => date('Y-m-d H:i:s'),
							 'Cae' => $cae,
							 'IdEstadoFactura' => 2,
					];									
					$facturacion_modelo->update($id_factura,$data);	
											
					$email = new email();			
					$email->enviar_mail($datos);				
				
				}
			
			}
			//SI HAY CURSOS SIN FACTURAR (ESTADO == 1) QUE HAY PENDIENTES
			$facturas = $facturacion_modelo->where('IdLote' , $request->getPostGet('id_lote'))
										   ->where('IdEstadoFactura' , 1)
										   ->findAll();
			
			if(empty($facturas)){
				
				//CIERRO EL LOTE
				$data = ['FechaCierre' => date('Y-m-d H:i:s'),				 
						 'Estado' => 1,
						 'IdUsuarioCierra' => $session->get('id_usuario'),
				];									
				$importaciones_modelo->update($request->getPostGet('id_lote'),$data);
					
				$this->ver_lote($request->getPostGet('id_lote'),'La operación se realizó con éxito. Lote facturado y cerrado.');
			
			}else{
				
				$this->ver_lote($request->getPostGet('id_lote'),'La operación falló. Existen Cursos pendientes de facturar.');
				
			}
		
		}else{
			
			$this->ver_lote($request->getPostGet('id_lote'),'El Lote no tiene Cursos pendiente de facturar.');
			
		}
	}
	function cerrar_lote(){
		
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		
		$importaciones_modelo = new Importaciones_modelo($db);
		
		//CIERRO EL LOTE
		$data = ['FechaCierre' => date('Y-m-d H:i:s'),				 
				 'Estado' => 1,
				 'IdUsuarioCierra' => $session->get('id_usuario'),
		];
		$importaciones_modelo->update($request->getPostGet('id_lote'),$data);
		
		$this->administrar_lotes();
	}
	function ver_lote($lote = null,$mensaje = null){
		
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$facturacion_modelo = new Facturacion_modelo($db);
		$importaciones_modelo = new Importaciones_modelo($db);
		
		if(!empty($lote)){
			
			$lote_a_buscar = $lote;
			$mensaje_final = $mensaje;
			
		}else{
			
			$lote_a_buscar = $request->getPostGet('id_lote_ver');
			$mensaje_final = '';
		}
		$lote = $importaciones_modelo->where('Id',$lote_a_buscar)->findAll();
		
		//SI HAY CURSOS SIN FACTURAR (ESTADO == 1) QUE HAY PENDIENTES
		$facturas = $facturacion_modelo->where('IdLote' , $request->getPostGet('id_lote_ver'))
									   ->where('IdEstadoFactura' , 1)
									   ->findAll();
		
		if(empty($facturas)){
			
			$pendientes = false;
		
		}else{
			
			$pendientes = true;
			
		}
		
		$data = array('facturas' =>  $facturacion_modelo->where('IdLote',$lote_a_buscar)->findAll(),
					  'mensaje' => $mensaje_final,
					  'IdLote' => $lote_a_buscar,
					  'estado_lote' => $lote[0]['Estado'],
					  'pendientes' => $pendientes,
					  
		);
		
		echo view('encabezado');			
		echo view($this->barra_navegacion_por_permiso($session->get('perfil')),$this->armar_datos_desesion());
		echo view('ver_lote',$data);	
		
	}
	function imprimir_factura(){
           
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$facturacion_modelo = new Facturacion_modelo($db);
		
       	$id_factura = $request->getPostGet('id_factura_imprimir');
		
		$factura =  $facturacion_modelo->where('IdFacturacion',$id_factura)->findAll();		
		
		$data = ['logo' => 'http://admin.cijuso.org.ar/imagenes/logo-cijuso.svg',
				 'id_factura' => $id_factura,				 
				 'factura' => $factura,				 
		]; 
		
		$pdf = new Pdf_factura();
		$pdf->imprimir($data,0);//0 = descargar y 1 = imprimir
    }
	function facturar(){
           
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$facturacion_modelo = new Facturacion_modelo($db);
		
		$id_lote = $request->getPostGet('id_lote_de_facturar');	
		$id_factura = $request->getPostGet('id_factura_a_facturar');	
		$factura =  $facturacion_modelo->where('IdFacturacion',$id_factura)->findAll();	
		
		$datos = ['id_factura' => $id_factura,	
				  'mail_destino' => $factura[0]['EmailDelPagador'],			
				  'total_a_pagar' => number_format($factura[0]['ValorProcesamiento'],2,",","."),				 				 
				  'medio_de_pago' => $factura[0]['Franquicia'],				 
				  'numero_de_orden' => $factura[0]['IdOrden'],				 
				  'descripcion' => $factura[0]['Descripcion'],				 
				  'titular' => ucwords(strtolower($factura[0]['NombreEnTarjeta'])),				 
		];
		
		$cae = $this->facturar_afip($datos);
		
		if(!empty($cae)){
			
			$data = ['FechaFacturacion' => date('Y-m-d H:i:s'),
					 'Cae' => $cae,
					 'IdEstadoFactura' => 2,
			];									
			$facturacion_modelo->update($id_factura,$data);	
									
			$email = new email();			
			$email->enviar_mail($datos);			
						
			$facturado = 'La operación se realizó con éxito';
		
		}else{
			
			$facturado = 'La operación falló. El servicio de facturación de AFIP, no responde.';
		}
		
		$this->ver_lote($id_lote,$facturado);
    }	
	function facturar_afip($datos_facturacion){
		
		return rand(100000,999999);
		
		//DESDE ACA, LO QUE ME PASO SIL
		/*
		# Crear objeto interface Web Service Autenticación y Autorización
		$WSAA = new COM('WSAA'); 
		# Generar un Ticket de Requerimiento de Acceso (TRA)
		$tra = $WSAA->CreateTRA() ;
		
		# Especificar la ubicacion de los archivos certificado y clave privada
		$path = getcwd()  . "\\";
		# Certificado: certificado es el firmado por la AFIP
		# ClavePrivada: la clave privada usada para crear el certificado
		$Certificado = "LCF_1aa73d2910a15309.crt"; // certificado de prueba
		$ClavePrivada = "privada.key"; // clave privada de prueba
		# Generar el mensaje firmado (CMS) ;
		$cms = $WSAA->SignTRA($tra, $path . $Certificado, $path . $ClavePrivada);
		
		# Llamar al web service para autenticar
		#$ta = $WSAA->CallWSAA($cms); // homologación
		$ta = $WSAA->CallWSAA($cms, "https://wsaa.afip.gov.ar/ws/services/LoginCms"); # producción
		
		echo "Token de Acceso: $WSAA->Token \n";
		echo "Sing de Acceso: $WSAA->Sign \n";
		
		# Crear objeto interface Web Service de Factura Electrónica
		$WSFE = new COM('WSFE') ;
		# Setear tocken y sing de autorización (pasos previos) Y CUIT del emisor
		$WSFE->Token = $WSAA->Token;
		$WSFE->Sign = $WSAA->Sign; 
		$WSFE->Cuit = "30616813907";
		
		# Conectar al Servicio Web de Facturación
		#$ok = $WSFE->Conectar(); // pruebas
		$ok = WSFE.Conectar("https://wsw.afip.gov.ar/wsfe/service.asmx");// ' producción # producción
		
		# Llamo a un servicio nulo, para obtener el estado del servidor (opcional)
		$WSFE->Dummy();
		echo "appserver status $WSFE->AppServerStatus \n";
		echo "dbserver status $WSFE->DbServerStatus \n";
		echo "authserver status $WSFE->AuthServerStatus \n";
		
		# Recupera cantidad máxima de registros (opcional)
		$qty = $WSFE->RecuperarQty();
		
		# Recupera último número de secuencia ID
		$LastId = $WSFE->UltNro();
		
		# Recupero último número de comprobante para un punto de venta y tipo (opcional)
		$tipo_cbte = 1; $punto_vta = 1;
		$LastCBTE = $WSFE->RecuperaLastCMP($punto_vta, $tipo_cbte);
		
		# Establezco los valores de la factura o lote a autorizar:
		$Fecha = date("Ymd");
		echo "Fecha $Fecha \n";
		$id = $LastId + 1; $presta_serv = 1;
		$tipo_doc = 80; $nro_doc = "23111111113";
		$cbt_desde = $LastCBTE + 1; $cbt_hasta = $LastCBTE + 1;
		$imp_total = "121.00"; $imp_tot_conc = "0.00"; $imp_neto = "100.00";
		$impto_liq = "21.00"; $impto_liq_rni = "0.00"; $imp_op_ex = "0.00";
		$fecha_cbte = $Fecha; $fecha_venc_pago = $Fecha;
		# Fechas del período del servicio facturado (solo si presta_serv = 1)
		$fecha_serv_desde = $Fecha; $fecha_serv_hasta = $Fecha;
		
		# Llamo al WebService de Autorización para obtener el CAE
		#$cae = $WSFE->Aut($id, $presta_serv, $tipo_doc, $nro_doc, 
		#	$tipo_cbte, $punto_vta, $cbt_desde, $cbt_hasta, 
		#	$imp_total, $imp_tot_conc, $imp_neto, $impto_liq, $impto_liq_rni, $imp_op_ex, 
		#	$fecha_cbte, $fecha_venc_pago, $fecha_serv_desde, $fecha_serv_hasta);
				
		//HAY QUE HACER TODAVIA
		
		//OBTENER CAE
		
		//NOTA DE CREDITO	
				
		echo "LastId=$LastId \n";
		echo "LastCBTE=$LastCBTE \n";
		echo "CAE=$cae \n";
		echo "Vencimiento $WSFE->Vencimiento"; # Fecha de vencimiento o vencimiento de la autorización
		
		# Verifico que no haya rechazo o advertencia al generar el CAE
		if ($cae=="") {
			
			echo "La página esta caida o la respuesta es inválida\n";
			
		} elseif ($cae=="NULL" || $WSFE->Resultado!="A") {
			
			echo "No se asignó CAE (Rechazado). Motivos: $WSFE->Motivo \n";
			
		} elseif ($WSFE->Motivo!="NULL" && $WSFE->Motivo!="00") {
			
			echo "Se asignó CAE pero con advertencias. Motivos: $WSFE->Motivos \n";
			
		} 
		*/
					
	}
	function imprimir_factura_pruebas($id_factura) {
           
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$facturacion_modelo = new Facturacion_modelo($db);
		
		//$id_factura = $request->getPostGet('id_factura');	
		
		$factura =  $facturacion_modelo->where('IdFacturacion',$id_factura)->findAll();		
		
		$data = ['logo' => 'http://admin.cijuso.org.ar/imagenes/logo-cijuso.svg',
				 'id_factura' => $id_factura,				 
				 'factura' => $factura,				 
		]; 
		
		$pdf = new Pdf_factura();
		$pdf->imprimir($data,0);//0 = descargar y 1 = imprimir
    }	
	function imprimir_factura_html($id_factura) {
           
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$facturacion_modelo = new Facturacion_modelo($db);
		
		//$id_factura = $request->getPostGet('id_factura');	
		
		$factura =  $facturacion_modelo->where('IdFacturacion',$id_factura)->findAll();		
		
		$data = ['logo' => 'http://admin.cijuso.org.ar/imagenes/logo-cijuso.svg',
				 'id_factura' => $id_factura,				 
				 'factura' => $factura,				 
		]; 
		
		echo view('encabezado');
		echo view('imprimir_factura_html',$data);
    }
	function imprimir_factura_mail() {
           
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$facturacion_modelo = new Facturacion_modelo($db);
		
		$id_factura = $request->getPostGet('id_factura');	
		
		$factura =  $facturacion_modelo->where('IdFacturacion',$id_factura)->findAll();		
		
		$data = ['logo' => 'http://admin.cijuso.org.ar/imagenes/logo-cijuso.svg',
				 'id_factura' => $id_factura,				 
				 'factura' => $factura,				 
		]; 
		
		$pdf = new Pdf_factura();
		$pdf->imprimir($data,0);//0 = descargar y 1 = imprimir
    }	
	function enviar_factura() {
           
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$facturacion_modelo = new Facturacion_modelo($db);
		
       	$id_factura = $request->getPostGet('id_factura_enviar_mail');
		
		$factura =  $facturacion_modelo->where('IdFacturacion',$id_factura)->findAll();		
		
		$data = ['logo' => 'http://admin.cijuso.org.ar/imagenes/logo-cijuso.svg',
				 'id_factura' => $id_factura,				 
				 'factura' => $factura,				 
				 'mail_destino' => $factura[0]['EmailDelPagador'],				 
				 'total_a_pagar' => number_format($factura[0]['ValorProcesamiento'],2,",","."),				 				 
				 'medio_de_pago' => $factura[0]['Franquicia'],				 
				 'numero_de_orden' => $factura[0]['IdOrden'],				 
				 'descripcion' => $factura[0]['Descripcion'],				 
				 'titular' => ucwords(strtolower($factura[0]['NombreEnTarjeta'])),				 
		]; 
				
		$email = new email();
		
		$email->enviar_mail($data);
		
		$this->administrar_lotes();
    }	
	function enviar_factura_original() {
           
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$facturacion_modelo = new Facturacion_modelo($db);
		
       	$id_factura = $request->getPostGet('id_factura_enviar_mail');
		
		$factura =  $facturacion_modelo->where('IdFacturacion',$id_factura)->findAll();		
		
		$data = ['logo' => 'http://admin.cijuso.org.ar/imagenes/logo-cijuso.svg',
				 'id_factura' => $id_factura,				 
				 'factura' => $factura,				 
				 'mail_destino' => $factura[0]['EmailComprador'],				 
		]; 
		
		$pdf = new Pdf_factura();
		$pdf->imprimir_y_enviar($data);//0 = descargar y 1 = imprimir
    }	
	function imprimir_factura_original() {
           
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$facturacion_modelo = new Facturacion_modelo($db);
		
       	$id_factura = $request->getPostGet('id_factura_imprimir');
		
		$factura =  $facturacion_modelo->where('Id',$id_factura)->findAll();		
			
		$logo = 'http://admin.cijuso.org.ar/imagenes/logo-cijuso.svg';
	
		if(!empty($factura)){					
					
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
					
					<title>Factura'.$id_factura.'</title>	  
				  
				</head>
				<body>

				 <table class="table table-responsive">	
					<tbody>
						<tr>							
						  <td style="width:100">
							<img src="'.$logo.'" width="100" height="100"></img><br>												
						  </td>						  
						</tr>				
					</tbody>
				</table>			
				
				<div align="center"><u>CONSULTORIO JURIDICO GRATUITO</u></div>
				<br>
				
				<p>Factura #'.$id_factura.'</p>
				
			
				
			</body>
		</html>';
								
	    }else{
			
            $html = "No se pudo recuperar la información de la consulta";
			
        } 
		
		require_once("application/libraries/vendor/autoload.php");		
		$mpdf = new \Mpdf\Mpdf();		
		$mpdf->setFooter('{DATE j-m-Y}');	
		header("Content-Type: application/pdf");
		$mpdf->WriteHTML($html);		
		$mpdf->Output('Factura #'.$id_factura.'.pdf', "D");
		//$mpdf->Output('Receta.pdf', \Mpdf\Output\Destination::DOWNLOAD);
		
    }	
	function administrar_importaciones($mensaje = null){
		
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$importaciones_modelo = new Importaciones_modelo($db);
		
		if(!empty($mensaje)){
			
			$mensaje_ya_existe = $mensaje;
			
		}else{
			
			$mensaje_ya_existe = false;
			
		}
		
		$data = array('importaciones' => $importaciones_modelo->devolver_importaciones(),	
					  'archivo_subido_ok' => false,
					  'archivo_ya_existe' => $mensaje_ya_existe,
				);
		
		echo view('encabezado');			
		echo view($this->barra_navegacion_por_permiso($session->get('perfil')),$this->armar_datos_desesion());
		echo view('importaciones',$data);	
		
	}	
	function administrar_facturacion(){
		
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$importaciones_modelo = new Importaciones_modelo($db);
		
		$data = array('importaciones' => $importaciones_modelo->devolver_importaciones(),	
					  'archivo_subido_ok' => false,
					  'archivo_ya_existe' => false,
				);
		
		echo view('encabezado');			
		echo view($this->barra_navegacion_por_permiso($session->get('perfil')),$this->armar_datos_desesion());
		echo view('facturacion',$data);	
		
	}		
	function reporte_de_facturacion(){
		
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$importaciones_modelo = new Importaciones_modelo($db);
		$inscriptos_modelo = new Inscriptos_modelo($db);
		$facturacion_modelo = new Facturacion_modelo($db);
		
		$desde = date('Y-m-d', strtotime('-365 day'));
		$hasta = date("Y-m-d 23:59:59");
	
		//sirve si entra por primera vez
		
		if((empty($request->getPostGet('nombre'))) and (empty($request->getPostGet('documento'))) and (empty($request->getPostGet('fechadesde'))) and (empty($request->getPostGet('fechahasta')))){	//entra por primera vez
			
			$desde = date('Y-m-d', strtotime('-365 day'));
			$hasta = date("Y-m-d 23:59:59");
			$nombre = '';
			$documento = '';			
			$facturas = '';			
								
		}else{																							
			
			$desde = date("Y-m-d 00:00:01",strtotime($request->getPostGet('fechadesde')));
			$hasta = date("Y-m-d 23:59:59",strtotime($request->getPostGet('fechahasta')));
			$nombre = $request->getPostGet('nombre');
			$documento = $request->getPostGet('documento');
			$facturas = $facturacion_modelo->devolver_facturas($desde,$hasta,$nombre,$documento);
		
		}	
		
									
		$data = array('reporte_de_facturacion' => $inscriptos_modelo->findAll(),
					  'desde' => date("Y-m-d",strtotime($desde)),
					  'hasta' => date("Y-m-d",strtotime($hasta)),
					  'nombre' => $nombre,
					  'documento' => $documento,
					  'facturas' => $facturas,
		
		);
		
		echo view('encabezado');			
		echo view($this->barra_navegacion_por_permiso($session->get('perfil')),$this->armar_datos_desesion());
		echo view('reporte_de_facturacion',$data);	
		
	}	
	function nueva_facturacion(){
		
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$importaciones_modelo = new Importaciones_modelo($db);
		$inscriptos_modelo = new Inscriptos_modelo($db);
		
		$data = array();
		
		echo view('encabezado');			
		echo view($this->barra_navegacion_por_permiso($session->get('perfil')),$this->armar_datos_desesion());
		echo view('nueva_facturacion',$data);	
		
	}		
	function importar_archivo(){
		
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		
		echo view('encabezado');			
		echo view($this->barra_navegacion_por_permiso($session->get('perfil')),$this->armar_datos_desesion());
		echo view('nueva_importacion');	
		
	}	
	function subir_archivo($arch,$temp){			
		
		$carpeta = realpath("")."/uploads/Archivos_subidos/";	
		
		if (!file_exists($carpeta)) {
			mkdir($carpeta, 0777, true);
		}
    	
		$destino = realpath("")."/uploads/Archivos_subidos/".$arch;
		return move_uploaded_file($temp,$destino);		
		
	}
	function procesar_archivo_facturacion(){
		
		$request = \Config\Services::request();
		$session = \Config\Services::session();
		$facturacion_modelo = new Facturacion_modelo($db);
		$importaciones_modelo = new Importaciones_modelo($db);
				
		$nombre_archivo =( !empty($_FILES['rutaimagen']['name'][0]))? $_FILES['rutaimagen']['name'][0] : " ";
		
		if(empty($importaciones_modelo->verificar_si_existe_archivo($nombre_archivo))){		
	
			if (!$this->subir_archivo($_FILES['rutaimagen']['name'][0],$_FILES['rutaimagen']['tmp_name'][0])){			
				
				$mensaje = "Error en la carga del archivo :".$nombre_archivo.". <br> Verifique que sea una extencion correcta y contenga los datos correctos. ";
			
			}else{
				
				$archivo = realpath("").'/uploads/Archivos_subidos/'.$_FILES['rutaimagen']['name'][0];
				
				$data = ['IdUsuario' => $session->get('id_usuario'),
						 'NombreArchivo' => $_FILES['rutaimagen']['name'][0],											 
						 'Estado' => 2,//PENDIENTE DE FACTURAR																																	
				];
								
				$id_importacion = $importaciones_modelo->insert($data);
						
				// Abrir archivo a procesar
				$fp = fopen($archivo,'r') or die("No se puede abrir el archivo");
			
				//Leer linea por linea
				$csv_line = fgetcsv($fp,0,";");//LEO LA PRIMERA LINEA APROPOSITO PORQUE ES LA DE LOS TITULOS
				while($csv_line = fgetcsv($fp,0,";")) {
											
					$data = ['IdEstadoFactura' => 1,//PENDIENTE
							 'Prueba' => $csv_line[0],
							 'Pais' => $csv_line[1],
							 'IdLote' => $id_importacion,								 
							 'IdOrden' => $csv_line[2],											 
							 'Id' => $csv_line[3],
							 'FechaCreacion' => $csv_line[4],
							 'FechaUltimaActualizacion' => $csv_line[5],
							 'IdComercio' => $csv_line[6],
							 'IdCuenta' => $csv_line[7],
							 'Referencia' => $csv_line[8],
							 'Descripcion' => $csv_line[9],
							 'TipoDeTransacción' => $csv_line[10],
							 'Estado' => $csv_line[11],
							 'CdigoDeRespuesta' => $csv_line[12],
							 'CodigoDeRespuestaBanco' => $csv_line[13],
							 'MensajeDeRespuetaDeError' => $csv_line[14],
							 'MedioPago' => $csv_line[15],
							 'CodigoAutorizacion' => $csv_line[16],
							 'ModeloDePagos' => $csv_line[17],
							 'OrigenDeLaTransacción' => $csv_line[18],
							 'ModeloDeAcreditación' => $csv_line[19],
							 'DiasParaDeposito' => $csv_line[20],
							 'BinBanco' => $csv_line[21],
							 'PaisBinIso' => $csv_line[22],
							 'NumeroVisible' => $csv_line[23],
							 'TipoTarjeta' => $csv_line[24],
							 'Cuotas' => $csv_line[25],
							 'CuotaAbonada' => $csv_line[26],
							 'AccionIdMaf' => $csv_line[27],
							 'MonedaTransaccion' => $csv_line[28],
							 'ValorTransaccion' => $csv_line[29],
							 'IvaTransaccion' => $csv_line[30],
							 'MonedaProcesamiento' => $csv_line[31],
							 'ValorProcesamiento' => $csv_line[32],
							 'ValorDelEnvio' => $csv_line[33],
							 'ValorDeCuota' => $csv_line[34],
							 'DocumentoDelComprador' => $csv_line[35],
							 'NombreEnTarjeta' => $csv_line[36],
							 'TarjetaDocumentoDeIdentificacion' => $csv_line[37],
							 'EmailComprador' => $csv_line[38],
							 'EmailDelPagador' => $csv_line[39],						 
							 'TelefonoPagador' => $csv_line[40],
							 'TelefonoContactoPagador' => $csv_line[41],
							 'ValorInteresComercio' => $csv_line[42],
							 'TasaDeInteresComercio' => $csv_line[43],
							 'DireccionDeFacturacion' => $csv_line[44],
							 'CiudadDeCobro' => $csv_line[45],
							 'DireccionDeEnvio' => $csv_line[46],						
							 'CiudadDeEnvio' => $csv_line[47],
							 'Extra1' => $csv_line[48],
							 'Extra2' => $csv_line[49],
							 'Ciclo' => $csv_line[50],
							 'BancoPse' => $csv_line[51],
							 'PuntoDdePago' => $csv_line[52],
							 'BancoPagoReferenciado' => $csv_line[53],
							 'Hash' => $csv_line[54],
							 'DeviceSessionId' => $csv_line[55],
							 'DireccionIp' => $csv_line[56],
							 'CodigoDeTrazabilidad' => $csv_line[57],
							 'PuntajeRedGeneral' => $csv_line[58],
							 'NombreComprador' => $csv_line[59],
							 'Franquicia' => $csv_line[60],
							 'CodigoPse' => $csv_line[61],
							 'IdentificadorUnicoRed' => $csv_line[62],
							 'IdentificadorPromoción' => $csv_line[63],																																					
					];
									
					$facturacion_modelo->insert($data);
					
				}
				
				fclose($fp) or die("Error al cerrar el archivo");
			
			}
			
			$mensaje = 'El archivo '.$_FILES['rutaimagen']['name'][0].' fue procesado con éxito.';
		
		}else{
		
			$mensaje = 'El archivo '.$_FILES['rutaimagen']['name'][0].' ya fue procesado. Verifique y vuelva a intentar.';
			
		}
		
		$this->administrar_importaciones($mensaje);
		
	}
	function facturar_lote_json() {
		try{						
			$session = \Config\Services::session();	
			$request = \Config\Services::request();			
				
			//INSTANCIA DE MODELOS			
			$facturacion_modelo = new Facturacion_modelo($db);			
									
			$facturas = $facturacion_modelo->where('IdLote',$request->getPostGet('lote'))->findAll();
						
			if(!empty($facturas)){
				$cadena = '';
				
					$cadena .='<table style="font-size:80%" class="table table-striped" id="tabla_facturar_lote">';
						$cadena .='<thead>';
							$cadena .='<tr>';								
								$cadena .='<th style="text-align:center">Orden</th>';																																	 
								$cadena .='<th style="text-align:center">Descripción</th>';																																	 
								$cadena .='<th style="text-align:center">Medio de Pago</th>';																																	 
								$cadena .='<th style="text-align:center">Importe</th>';																																	 
								$cadena .='<th style="text-align:center">Comprador</th>';																																							 
								$cadena .='<th style="text-align:center">Estado</th>';																																							 
								$cadena .='<th>Acción</th>';																																							 
							$cadena .='</tr>';
						$cadena .='</thead>';
						$cadena .='<tbody>';
							
							foreach ($facturas as $factura){
								
								$cadena .='<tr>';
																	
										$cadena .='<td name="calledomicilio'.$factura['Id'].'" id="calledomicilio'.$factura['Id'].'" value="'.$factura['IdOrden'].'" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%">'.$factura['IdOrden'].'</td>';
										$cadena .='<td name="numerodomicilio'.$factura['Id'].'" id="numerodomicilio'.$factura['Id'].'" value="'.$factura['Descripcion'].'" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%">'.$factura['Descripcion'].'</td>';
										$cadena .='<td name="pisodomicilio'.$factura['Id'].'" id="pisodomicilio'.$factura['Id'].'" value="'.$factura['MedioPago'].'" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%">'.$factura['MedioPago'].'</td>';
										$cadena .='<td name="oficinadomicilio'.$factura['Id'].'" id="oficinadomicilio'.$factura['Id'].'" value="'.$factura['ValorTransaccion'].'" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%">'.$factura['ValorTransaccion'].'</td>';
										$cadena .='<td name="oficinadomicilio'.$factura['Id'].'" id="oficinadomicilio'.$factura['Id'].'" value="'.$factura['NombreComprador'].'" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%">'.$factura['NombreComprador'].'</td>';
										
										if($factura['IdEstadoFactura'] == 1){
											$cadena .='<td class="text-danger" name="estadodefactura'.$factura['Id'].'" id="estadodefactura'.$factura['Id'].'" value="'.$factura['IdEstadoFactura'].'" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%">Pendiente</td>';
										}else{
											$cadena .='<td class="text-success" name="estadodefactura'.$factura['Id'].'" id="estadodefactura'.$factura['Id'].'" value="'.$factura['IdEstadoFactura'].'" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%">Facturado</td>';
										}
										if($factura['IdEstadoFactura'] == 1){
											$cadena .='<td>';
											$cadena .='<button type="button" class="btn btn-secondary btn-sm">';
											$cadena .='<img src="'.base_url().'/imagenes/baseline_qr_code_scanner_white_24dp.png" width="20" height="20" title="Facturar">';
											$cadena .='</button>';																																														
											$cadena .='</td>';
										}else{
											$cadena .='<td>';
											$cadena .='<button type="button" class="btn btn-primary btn-sm">';
											$cadena .='<img src="'.base_url().'/imagenes/impresora_blanca.png" width="20" height="20" title="Imprimir Factura">';
											$cadena .='</button>';																																														
											$cadena .='</td>';
										}
								$cadena .='</tr>';
							}
							
						$cadena .='</tbody>';									  
					$cadena .='</table>';					
					echo $cadena;
			}else{
				$cadena = '';
								
				$cadena .='<div class="alert alert-danger" role="alert">';
				$cadena .='<h4>¡Atención!</h4>';
				$cadena .='<div><label><strong style="color:#f0ad4e;font-size:16px"></strong><strong> No es posible cargar el Lote. Verifique y vuelva a intentar.</strong></label></div>';										
				$cadena .='</div>';					
				//$cadena .='<div class="modal-footer">';
				//$cadena .='<button type="button" id="cerrar_modal_agregar_articulo" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>';
				//$cadena .='</div>';
				echo $cadena;
			}					
			
		}
		catch ( Customexception $e ) {
			$e->show_error_vista('Usuarios','');
		}	
	}	
	function devolver_facturas_x_lote_json() {
		try{						
			$session = \Config\Services::session();	
			$request = \Config\Services::request();			
				
			//INSTANCIA DE MODELOS			
			$facturacion_modelo = new Facturacion_modelo($db);			
									
			$facturas = $facturacion_modelo->where('IdLote',$request->getPostGet('lote'))->findAll();
						
			if(!empty($facturas)){
				$cadena = '';
				
					$cadena .='<table style="font-size:80%" class="table table-striped stacktable table-sm" id="tabla_facturas">';
						$cadena .='<thead>';
							$cadena .='<tr>';
								//$cadena .='<th style="text-align:center;width:5%">#</th>';
								$cadena .='<th style="text-align:center">Orden</th>';																																	 
								$cadena .='<th style="text-align:center">Descripción</th>';																																	 
								$cadena .='<th style="text-align:center">Medio de Pago</th>';																																	 
								$cadena .='<th style="text-align:center">Importe</th>';																																	 
								$cadena .='<th style="text-align:center">Comprador</th>';																																	 
								$cadena .='<th style="text-align:center">Acción</th>';																																	 
							$cadena .='</tr>';
						$cadena .='</thead>';
						$cadena .='<tbody>';
							
							foreach ($facturas as $factura){
								
								$cadena .='<tr>';
								   
									//$cadena .='<td style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:1%;padding-right:0.2%">';
									
										//$cadena .='<div class="form-check">';	
										  //$cadena .='<input class="form-check-input" type="checkbox" name="checkDomicilio" id="checkDomicilio" value="'.$factura['Id'].'">';										
										//$cadena .='</div>';	
										
									//$cadena .='</td>';
									
										$cadena .='<td name="calledomicilio'.$factura['Id'].'" id="calledomicilio'.$factura['Id'].'" value="'.$factura['IdOrden'].'" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%">'.$factura['IdOrden'].'</td>';
										$cadena .='<td name="numerodomicilio'.$factura['Id'].'" id="numerodomicilio'.$factura['Id'].'" value="'.$factura['Descripcion'].'" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%">'.$factura['Descripcion'].'</td>';
										$cadena .='<td name="pisodomicilio'.$factura['Id'].'" id="pisodomicilio'.$factura['Id'].'" value="'.$factura['MedioPago'].'" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%">'.$factura['MedioPago'].'</td>';
										$cadena .='<td name="oficinadomicilio'.$factura['Id'].'" id="oficinadomicilio'.$factura['Id'].'" value="'.$factura['ValorTransaccion'].'" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%">'.$factura['ValorTransaccion'].'</td>';
										$cadena .='<td name="oficinadomicilio'.$factura['Id'].'" id="oficinadomicilio'.$factura['Id'].'" value="'.$factura['NombreComprador'].'" style="padding-top: 3px !important;padding-bottom: 3px !important;text-align:center;padding-left:0.2%;padding-right:0.2%">'.$factura['NombreComprador'].'</td>';
										$cadena .='<td>';
										$cadena .='<button style="margin-left:5%" type="button" class="btn btn-secondary btn-sm">';
										$cadena .='<img src="'.base_url().'/imagenes/impresora_blanca.png" width="20" height="20" title="Imprimir Factura">';
										$cadena .='</button>';																																														
										$cadena .='</td>';
								$cadena .='</tr>';
							}
							
						$cadena .='</tbody>';									  
					$cadena .='</table>';					
					echo $cadena;
			}else{
				$cadena = '';
								
				$cadena .='<div class="alert alert-danger" role="alert">';
				$cadena .='<h4>¡Atención!</h4>';
				$cadena .='<div><label><strong style="color:#f0ad4e;font-size:16px"></strong><strong> No es posible cargar el Lote. Verifique y vuelva a intentar.</strong></label></div>';										
				$cadena .='</div>';					
				//$cadena .='<div class="modal-footer">';
				//$cadena .='<button type="button" id="cerrar_modal_agregar_articulo" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>';
				//$cadena .='</div>';
				echo $cadena;
			}					
			
		}
		catch ( Customexception $e ) {
			$e->show_error_vista('Usuarios','');
		}	
	}	
	function guardar_cambiar_contrasenia(){
		
		//INSTANCIA DE MODELOS
		$request = \Config\Services::request();
		$session = \Config\Services::session();	
		
		$usuariosModelo = new Usuario_modelo($db);
		
		$idusuario_session = $session->get('id_usuario');
		$idusuario_solicita = $request->getPostGet('id_usuario');
		$passwordregistro = $request->getPostGet('pass1');
		$confirmarpassword = $request->getPostGet('pass2');
		
		if($passwordregistro == $confirmarpassword ){
			
			if($idusuario_session == $idusuario_solicita){
							
				$usuariosModelo->actualizar_contrasenia($session->get('id_usuario'),$request->getPostGet('pass1'));
				
				echo true;
				
			}else{
				
				echo false;
			
			}			
			
		}else{	
		
			echo false;
			
		}	
	}
	protected function barra_navegacion_por_permiso($permiso){
		
		switch($permiso){	
		
			case 1:
					return ('barra_navegacion_dministrador');
					break;
			case 2:
					return ('barra_navegacion_facturacion');
					break;
					
		}
		
	}
	protected function armar_datos_desesion(){
		
		$session = \Config\Services::session();			
				
		$datosUsuario = array ('nombre_de_usuario' => strtoupper($session->get('apellido_y_nombre')),
							   'perfil' => $session->get('perfil'),
							   'id_usuario' => $session->get('id_usuario'));
		return $datosUsuario;
		
	}
	
}	
?>
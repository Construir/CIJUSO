<?php namespace App\Models;

use CodeIgniter\Model;

class Facturacion_modelo extends Model{
	
        protected $table      = 'facturacion';
        protected $primaryKey = 'IdFacturacion';

        protected $returnType = 'array';
        protected $useSoftDeletes = true;

        protected $allowedFields = ['IdEstadoFactura', 'Cae', 'FechaFacturacion', 'Prueba', 'Pais', 'IdLote', 'IdOrden','Id', 'FechaCreacion', 'FechaUltimaActualizacion', 'IdComercio', 'IdCuenta', 'Referencia', 'Descripcion', 'TipoDeTransaccion', 'Estado', 'CdigoDeRespuesta', 'CodigoDeRespuestaBanco', 'MensajeDeRespuetaDeError', 'MedioPago', 'CodigoAutorizacion', 'ModeloDePagos', 'OrigenDeLaTransaccion', 'ModeloDeAcreditacion', 'DiasParaDeposito', 'BinBanco', 'PaisBinIso', 'NumeroVisible', 'TipoTarjeta', 'Cuotas', 'CuotaAbonada', 'AccionIdMaf', 'MonedaTransaccion', 'ValorTransaccion', 'IvaTransaccion', 'MonedaProcesamiento', 'ValorProcesamiento', 'ValorDelEnvio', 'ValorDeCuota', 'DocumentoDelComprador', 'NombreEnTarjeta', 'TarjetaDocumentoDeIdentificacion', 'EmailComprador', 'EmailDelPagador', 'TelefonoPagador', 'TelefonoContactoPagador', 'ValorInteresComercio', 'TasaDeInteresComercio', 'DireccionDeFacturacion', 'CiudadDeCobro', 'DireccionDeEnvio', 'CiudadDeEnvio', 'Extra1', 'Extra2', 'Ciclo', 'BancoPse', 'PuntoDdePago', 'BancoPagoReferenciado', 'Hash', 'DeviceSessionId', 'DireccionIp', 'CodigoDeTrazabilidad', 'PuntajeRedGeneral', 'NombreComprador', 'Franquicia', 'CodigoPse', 'IdentificadorUnicoRed', 'IdentificadorPromocion'];

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;		
	
		function devolver_facturas($desde,$hasta,$nombre,$documento){
			
			$cadena = '';
			
			if(!empty($nombre)){
				
				$cadena .= " and NombreComprador like '%".$nombre."%'";
			
			}			
			if(!empty($documento)){
				
				$cadena .= ' and TarjetaDocumentoDeIdentificacion = '.$documento;
			
			}
		
			$sql = "select * from facturacion where FechaCreacion between ? and ? ".$cadena;	
		
			$query = $this->db->query($sql, array($desde,$hasta));
			return $query->getResultArray();		

		}
}?>
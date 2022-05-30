<?php namespace App\Models;

use CodeIgniter\Model;

class Importaciones_modelo extends Model{
	
	protected $table      = 'importaciones';
	protected $primaryKey = 'Id';

	protected $returnType = 'array';
	protected $useSoftDeletes = true;

	protected $allowedFields = ['NombreArchivo', 'IdUsuario', 'Estado', 'FechaCierre', 'IdUsuarioCierra'];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = false;
		
		
	function devolver_importaciones(){
		
		$query = $this->query('SELECT count(CASE WHEN f.IdEstadoFactura = 1 then 1 ELSE NULL END) as facturada, 
									  count(CASE WHEN f.IdEstadoFactura = 2 then 1 ELSE NULL END) as pendiente, 
									  count(f.IdEstadoFactura) as total_facturas, 
									  i.Id, i.created_at, i.NombreArchivo, i.IdUsuario, i.Estado, concat(u.Apellido,", ",u.Nombre) as nombre_usuario,i.FechaCierre,
									  el.NombreEstado as nombre_estado
									
									FROM importaciones as i 
									join facturacion as f on f.IdLote = i.Id 
									left join usuarios as u on u.IdUsuario = i.IdUsuario 
									left join estados_lotes as el on el.Id = i.Estado 
									group by i.Id');
								
		return $query->getResultArray();
		
	}
	function verificar_si_existe_archivo($archivo){
		
		$sql = "select * from importaciones where NombreArchivo = ?";				
		$query = $this->db->query($sql, array($archivo));
		return $query->getResultArray();		

	}
}?>
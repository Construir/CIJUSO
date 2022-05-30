<?php namespace App\Models;

use CodeIgniter\Model;

class Usuario_modelo extends Model{
	
        protected $table      = 'usuarios';
        protected $primaryKey = 'IdUsuario';

        protected $returnType = 'array';
        protected $useSoftDeletes = true;

        protected $allowedFields = ['Nombre', 'Apellido', 'Email', 'Cuit', 'Celular', 'Telefono', 'Usuario', 'Contrasenia', 'IdPerfil', 'IdColegio', 'IdEntidad', 'Estado', 'UltimaLogueado', 'ActualizoDatosPersonales'];

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
		
		function actualizar_contrasenia($idusuario,$contrasenia){
			
			$sql = "update usuarios set Contrasenia = ? where IdUsuario = ?";				
			$query = $this->db->query($sql, array($contrasenia,$idusuario));			

		}
		function verifica_si_existe_otro_usuario_igual($idusuario,$nombre_usuario){
			
			$sql = "select * from usuarios where IdUsuario <> ? and Usuario like ?";				
			$query = $this->db->query($sql, array($idusuario,$nombre_usuario));			
			return $query->getResultArray();
			
		}		
		function actualizar_contrasenia_usuarios($idusuario,$nombre_usuario,$contrasenia){
			
			$sql = "update usuarios set Contrasenia = ? where IdUsuario = ? and Usuario = ?";				
			$query = $this->db->query($sql, array($contrasenia,$idusuario,$nombre_usuario));			

		}		
		function actualizar_datos_contacto_usuarios($idusuario,$nombre_usuario_actual,$apellido,$nombre,$email,$nuevo_nombre_usuario,$celular,$telefono){
			
			$sql = "update usuarios set Apellido = ?, Nombre = ?, Email = ?, Usuario = ?, Celular = ?, Telefono = ?, ActualizoDatosPersonales = ? where IdUsuario = ? and Usuario = ?";				
			$query = $this->db->query($sql, array($apellido,$nombre,$email,$nuevo_nombre_usuario,$celular,$telefono,date("Y-m-d h:i:s"),$idusuario,$nombre_usuario_actual));			

		}
		function devolver_cuit_igual_password($cuit){
				
			$sql = "SELECT * FROM abogados where Cuit = ? and Usuario = ? and Contrasenia = ?";
								   
			$query = $this->db->query($sql, array($cuit,$cuit,$cuit));
			return $query->getResultArray();	
					
		}
		function devolver_usuario_x_colegio($idcolegio){
				
			$sql = "SELECT Email FROM usuarios where IdColegio = ?";
								   
			$query = $this->db->query($sql, array($idcolegio));
			return $query->getResultArray();			
					
		}
		function devolver_usuario($cuit){
			
			$sql = "SELECT * FROM usuarios where Cuit = ?";
									
			$query = $this->db->query($sql, array($cuit));
			return $query -> getResultArray();	
					
			//$query   = $this->query('SELECT IdUsuario FROM usuarios where Cuit = 20250626143');
			//return  $query->getResultArray();
		}
		function devolver_usuarios($idUsuario,$idPerfil,$idColegio){
			
			$cadena = '';
			$cadena = '  ';
			
			if($idPerfil == 2){///es un usuario de colegio
				$cadena = ' and IdColegio = '.$idColegio;
			}			
			
			$query = $this->query("SELECT u.*,p.*,d.IdDepartamento,d.NombreDepartamento,d.Acronimo 
								  FROM usuarios as u 
								  join perfiles as p on p.IdPerfil = u.IdPerfil and u.IdPerfil not in (6,1)
								  left join departamentos as d on u.IdColegio = d.IdDepartamento where u.deleted_at is null".$cadena);						
			return $query->getResultArray();					
			
		}

}?>
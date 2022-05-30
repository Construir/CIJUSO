<?php namespace App\Models;

use CodeIgniter\Model;

class Inscriptos_modelo extends Model{
	
	protected $table      = 'inscriptos';
	protected $primaryKey = 'Id';

	protected $returnType = 'array';
	protected $useSoftDeletes = true;

	protected $allowedFields = ['Id', 'Nombre', 'Dno'];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = false;
		
}?>
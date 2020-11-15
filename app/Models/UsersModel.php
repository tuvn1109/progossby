<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'id';
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	protected $allowedFields = [];
	protected $useTimestamps = false;
	protected $protectFields = false;
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';
	protected $validationRules = [];
	protected $validationMessages = [];
	protected $skipValidation = false;
	protected $selectFields = ['*'];


	public function getlist($search = 0)
	{
		$query = $this->select($this->selectFields)
			->where('username', 'tunv');
		return $query->get()->getRowArray();
	}

	public function getUserByUsername($username, $password)
	{
		$query = $this->select($this->selectFields);
		$query = $query->where('username', $username);
		$query = $query->Where('password', $password);
		return $query->get()->getRowArray();
	}

	public function getUserByName($username)
	{
		$query = $this->select($this->selectFields);
		return $query->getWhere(['username' => $username])->getRowArray();
	}
}

?>

<?php

namespace App\Models;

use CodeIgniter\Model;


class AuthModel extends Model
{


	protected $table = 'user_master';
	protected $primaryKey = 'id';
	protected $allowedFields = ['email', 'password'];

	public function getUserByEmail($data)
	{
		$builder = $this->db->table($this->table);
		$builder->where('user_email', $data['email']);
		$builder->where('user_password', $data['password']);
		$query = $builder->get();

		$user = $query->getRow();

		if (!$user) {
			return null;
		}

		return $user;
	}
}

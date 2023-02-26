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
		// $builder->where('user_password', $data['password']);
		$query = $builder->get();

		$user = $query->getRow();

		$password_status = password_verify($data['password'], $user->user_password);

		if ($password_status == true) {
			$builder1 = $this->db->table('user_profile');
			$builder1->where('user_id', $user->id);
			$query1 = $builder1->get();

			$user->profile = $query1->getRow();

			$user->status = true;
			$user->message ="login successfull";
		}else{
			$user->status = false;
			$user->message = "Login Failed ! Please check your email and password";
		}
		return $user;
	}

	public function createClient($data)
	{
		$hashed_password = password_hash($data['password'], PASSWORD_DEFAULT, ['cost' => 10]);

		$data = [
			'email' => $data['email'],
			'password' => $hashed_password
		];

		$this->insert($data);
		return $this->insertID();
	}
}

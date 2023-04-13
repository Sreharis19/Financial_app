<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\Cast\Array_;

class AuthModel extends Model
{


	protected $table = 'user_master';
	protected $primaryKey = 'id';
	protected $allowedFields = ['first_name', 'last_name', 'user_email', 'user_contact', 'user_password', 'user_type', 'user_token', 'user_status'];

	public function getUserByEmail($data)
	{
		$builder = $this->db->table($this->table);
		$builder->where('user_email', $data['email']);
		$builder->where('user_type', $data['type']);
		$query = $builder->get();

		$user = $query->getRow();

		if ($user) {
			$password_status = password_verify($data['password'], $user->user_password);

			if ($password_status == true) {
				$builder1 = $this->db->table('user_profile');
				$builder1->where('user_id', $user->id);
				$query1 = $builder1->get();

				$user->profile = $query1->getRow();

				$user->status = true;
				$user->message = "login successfull";
			} else {
				$user->status = false;
				$user->message = "Login Failed ! Please check your email and password";
			}
		} else {
			$user = (object)[];
			$user->status = false;
			$user->message = "Sorry ! No account associated with the given credentials or user type ";
		}
		return $user;
	}

	public function createClient($data, $data1)
	{
		$result = (object)[];
		$builder = $this->db->table($this->table);
		$builder->where('user_email', $data['user_email']);
		$query = $builder->get();
		$user = $query->getRow();
		if (!($user)) {
			$db = db_connect();
			$this->insert($data);
			$lastId = $this->insertID();

			if ($lastId) {
				$data1['user_id'] = $lastId;
				$builder = $db->table('user_profile');
				$builder->insert($data1);
				$db->insertID();
			}
			$result->status = true;
			$result->message = "Account created successfully";
		} else {
			$result->status = false;
			$result->message = "Account already exists with the provided email id";
		}

		return $result;
	}

	public function getCountryAndPostList()
	{

		$query = $this->db->table('products')
			->select('product_id, product_name')
			->get();
		$result['category'] = $query->getResult();

		$query = $this->db->table('countries')
			->select('id, name')
			->get();
		$result['country'] = $query->getResult();
		return $result;
	}
}

<?php namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    function userLogin($data) {
        $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "' AND " . "user_type =" . "'".$data['type']." '";
	$this->db->select('*');
	$this->db->from('user_master');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

		if ($query->num_rows() == 1) 
		{
		return true;
		} 
		else {
		return false;
		}
    }
}
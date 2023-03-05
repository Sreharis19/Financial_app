<?php

namespace App\Models;

use CodeIgniter\Model;


class Client_SupportModel extends Model
{
    protected $table = 'contact_us';

    protected $allowedFields = ['id', 'user_id', 'comments', 'admin_reply', 'created_on', 'replied_on'];

    public function getList($user_id)
    {
    $query = $this->db->table('contact_us')
            ->select('id, user_id, comments, admin_reply, created_on, replied_on')
            ->where('user_id', $user_id)
            ->get();

        $result = $query->getResult();
        return $result;
    }

    public function CreateTicket($client_id, $message){
        $data = [
			'user_id' => $client_id,
			'comments' => $message,
		];

		$this->insert($data);
		$this->insertID();

        $result['message'] = "ticket raised successfully";
        $result['status'] = true;
        return $result;
    }

    public function DeleteTicket($id){
        
        $this->delete($id);

        $result['message'] = "ticket deleted successfully";
        $result['status'] = true;
        return $result;
    }
}
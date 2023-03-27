<?php

namespace App\Models;

use CodeIgniter\Model;
class Client_Support_Model extends Model
{
    protected $table = 'contact_us';

    protected $allowedFields = ['id', 'user_id', 'comments', 'admin_reply', 'created_on', 'replied_on'];

    public function getQueryList($client_id)
    {
    $getQueryList_query = $this->db->table('contact_us')
            ->select('id, user_id, comments, admin_reply, created_on, replied_on')
            ->where('user_id', $client_id)
            ->get();

        $userId = $getQueryList_query->getResult();
        return $userId;
    }

    public function CreateTicket($client_id, $requiredMessage){
        $data = [
			'user_id' => $client_id,
			'comments' => $requiredMessage,
		];

		$this->insert($data);
		$this->insertID();

        $queryResult['message'] = "Your query is registered successfully. Our team will look into this shortly";
        $queryResult['status'] = true;
        return $queryResult;
    }

    public function DeleteTicket($client_id){
        
        $this->delete($client_id);

        $queryResult['message'] = "Your query is deleted successfully";
        $queryResult['status'] = true;
        return $queryResult;
    }
}
<?php

namespace App\Models;

use CodeIgniter\Model;


class Client_Support_Model extends Model
{
    protected $table = 'contact_us';

    protected $allowedFields = ['id', 'user_id', 'comments', 'admin_reply', 'created_on', 'replied_on'];

    public function getList($client_id)
    {
    $getUser_query = $this->db->table('contact_us')
            ->select('id, user_id, comments, admin_reply, created_on, replied_on')
            ->where('user_id', $client_id)
            ->get();

        $userId = $getUser_query->getResult();
        return $userId;
    }

    public function CreateTicket($client_id, $requiredMessage){
        $data = [
			'user_id' => $client_id,
			'comments' => $requiredMessage,
		];

		$this->insert($data);
		$this->insertID();

        $createTicketResult['message'] = "ticket raised successfully";
        $createTicketResult['status'] = true;
        return $createTicketResult;
    }

    public function DeleteQuery($client_id){
        
        $this->delete($client_id);

        $deleteTicketResult['message'] = "ticket deleted successfully";
        $deleteTicketResult['status'] = true;
        return $deleteTicketResult;
    }
}
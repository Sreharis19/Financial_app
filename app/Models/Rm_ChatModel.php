<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class Rm_ChatModel extends Model
{
    protected $table = 'chat';
    protected $primaryKey = '_id';
    protected $allowedFields = ['cw_post_id', 'send_by', 'send_to', 'message', 'created_date'];

    public function getChatHistory($rm_id, $user_id, $post_id)
    {

        // $db = db_connect();

        // $query = $db->query("SELECT * FROM chat WHERE cw_post_id = $post_id AND send_by = $rm_id OR send_to = $user_id");
        // $result = $query->getRowArray();
        $builder = $this->db->table('chat');
        $builder->select('*');
        $builder->where('cw_post_id', $post_id);
        $builder->where('send_by', $rm_id);
        $builder->orWhere('send_by', $user_id);
        $results = $builder->get()->getResult();
        return $results;
    }

    public function saveMessage($data)
    {
        $data = [
			'cw_post_id' => $data['postid'],
			'send_by' => $data['rmid'],
			'send_to' => $data['clientid'],
			'message' => $data['message']
		];

		$this->insert($data);
		return $this->insertID();
    }
}

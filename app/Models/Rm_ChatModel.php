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
        $builder = $this->db->table('chat');
        $builder->select('cw_post_id, send_by, send_to, message, created_date');
        $builder->where('cw_post_id', $post_id);
        $builder->groupStart();
        $builder->where('send_by', $rm_id);
        $builder->orWhere('send_by', $user_id);
        $builder->orWhere('send_to', $rm_id);
        $builder->orWhere('send_to', $user_id);
        $builder->groupEnd();
        $query = $builder->get();
        $results = $query->getResult();

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

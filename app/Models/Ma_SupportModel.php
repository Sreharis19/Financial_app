<?php

namespace App\Models;

use CodeIgniter\Model;


class Ma_SupportModel extends Model
{
    protected $table = 'contact_us';

    protected $allowedFields = ['id', 'user_id', 'comments', 'admin_reply', 'created_on', 'replied_on'];

    public function getList()
    {
        $query = $this->db->table('contact_us')
            ->select('id, user_id, comments, admin_reply, created_on, replied_on')
            ->get();

        $result = $query->getResult();
        return $result;
    }

    public function ReplySupport($post_id, $message)
    {
        $db      = \Config\Database::connect();
        $this->builder = $db->table('contact_us');
        $this->builder->set('admin_reply', $message)
            ->where('id', $post_id)
            ->update();

        $result['message'] = "Reply Sent successfully";
        $result['status'] = true;
        return $result;
    }
}

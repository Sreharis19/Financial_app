<?php

namespace App\Models;

use CodeIgniter\Model;


class RelationManager_Dashboard extends Model
{

    public function getStats($data)
    {
        $db = db_connect();

        $query1 = $db->query("SELECT COUNT(*) as total_clients FROM user_master WHERE user_type = 4");
        $result1 = $query1->getRowArray();

        $query2 = $db->query("SELECT COUNT(*) as total_posts FROM cw_posts WHERE product_id = 1");
        $result2 = $query2->getRowArray();

        $query3 = $db->query("SELECT COUNT(*) as total_chats FROM chat WHERE send_by = 1");
        $result3 = $query3->getRowArray();

        $data = [
            'total_clients' => $result1['total_clients'],
            'total_posts' => $result2['total_posts'],
            'total_chats' => $result3['total_chats'],
        ];

        return $data;
    }
}

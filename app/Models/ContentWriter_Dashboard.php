<?php

namespace App\Models;

use CodeIgniter\Model;


class ContentWriter_Dashboard extends Model
{

    public function getStats($data)
    {
        
        $db = db_connect();

        $query1 = $db->query("SELECT COUNT(*) as total_posts FROM cw_posts");
        $result1 = $query1->getRowArray();

        $query2 = $db->query("SELECT COUNT(*) as archived_posts FROM cw_posts WHERE post_status = 0");
        $result2 = $query2->getRowArray();

        $data = [
            'total_posts' => $result1['total_posts'],
            'archived_posts' => $result2['archived_posts'],
        ];
        return $data;
    }
}

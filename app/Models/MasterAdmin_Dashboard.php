<?php

namespace App\Models;

use CodeIgniter\Model;


class MasterAdmin_Dashboard extends Model
{

    public function getStats($data)
    {
        $productId_query = "";
        $AndQueryBuild = " OR product_id =";
        $userType = $data['user_type'];
        $userId = $data['masteradmin_id'];
		

        $product_ids = explode('#', $data['product_id']);

        foreach ($product_ids as $key => $product_id) {

            if($key == 0){
                $productId_query .= $product_id;
            }else{
                $productId_query .=  $AndQueryBuild.$product_id;
            }

        }
        
        $db = db_connect();

        $query1 = $db->query("SELECT COUNT(*) as total_clients FROM user_master WHERE user_type = $userType");
        $result1 = $query1->getRowArray();

        $query2 = $db->query("SELECT COUNT(*) as total_posts FROM cw_posts WHERE product_id = $productId_query");
        $result2 = $query2->getRowArray();

        //$query3 = $db->query("SELECT COUNT(*) as total_Products FROM chat WHERE send_by = $userId");
        //$result3 = $query3->getRowArray();

        $query3 = $db->query("SELECT COUNT(*) as active_posts FROM cw_posts WHERE post_status = 1");
        $result3 = $query3->getRowArray();


        $query4 = $db->query("SELECT COUNT(*) as archived_posts FROM cw_posts WHERE post_status = 0");
        $result4 = $query4->getRowArray();

		$query5 = $db->query("SELECT COUNT(*) as total_rm FROM user_master WHERE user_type = $userType");
        $result5 = $query5->getRowArray();

        $query6 = $db->query("SELECT COUNT(*) as total_cw FROM user_master WHERE user_type = $userType");
        $result6 = $query6->getRowArray();


        $data = [
            'total_clients' => $result1['total_clients'],
            'total_posts' => $result2['total_posts'],
            'active_posts' => $result3['active_posts'],

            'archived_posts' => $result4['archived_posts'],
            'total_rm' => $result5['total_rm'],
            'total_cw' => $result6['total_cw'],
        ];
        return $data;
    }
}

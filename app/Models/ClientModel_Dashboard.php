<?php

namespace App\Models;

use CodeIgniter\Model;


class ClientModel_Dashboard extends Model
{

    public function getStats($data)
    {
        $productId_query = "";
        $AndQueryBuild = " OR product_id =";
        $userType = $data['user_type'];
        $userId = $data['client_id'];
        $userEmail = $data['user_email'];
        $separator = "#";

        $product_ids = explode('#', $data['product_id']);

        foreach ($product_ids as $key => $product_id) {

            if($key == 0){
                $productId_query .= $product_id;
            }else{
                $productId_query .=  $AndQueryBuild.$product_id;
            }

        }
        
        $db = db_connect();

        $query1 = $db->query("SELECT (CHAR_LENGTH(user_products_ids) - CHAR_LENGTH( REPLACE ( user_products_ids,  $separator, "")) + 1) as total_optProducts 
        FROM user_profile
        WHERE user_products_ids =
        (
        SELECT user_profile.user_products_ids
        FROM user_profile
        LEFT JOIN user_master ON user_profile._id = user_master.id
        WHERE user_master.user_type = $userType AND user_master.user_email = $userEmail)");

        $result1 = $query1->getRowArray();

        // $query1 = $db->query("SELECT COUNT(*) as total_clients FROM user_master WHERE user_type = $userType");
        // $result1 = $query1->getRowArray();

        $query2 = $db->query("SELECT COUNT(*) as total_posts FROM cw_posts WHERE product_id = $productId_query");
        $result2 = $query2->getRowArray();

        $query3 = $db->query("SELECT COUNT(*) as total_chats FROM chat WHERE send_by = $userId");
        $result3 = $query3->getRowArray();

        $data = [
            'total_optProducts' => $result1['total_optProducts'],
            'total_posts' => $result2['total_posts'],
            'total_chats' => $result3['total_chats'],
        ];
        return $data;
    }
}

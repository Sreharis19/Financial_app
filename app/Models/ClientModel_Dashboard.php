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

        $builder = $db->table('user_profile');
        $builder->select('user_profile.user_products_ids');
        $builder->join('user_master', 'user_profile._id = user_master.id', 'left');
        $builder->where('user_email', $userEmail);
        $query = $builder->get();
        $opted_products_array = $query->getRowArray();
        
        $separated_products = explode('#', $opted_products_array['user_products_ids']);

        $query2 = $db->query("SELECT COUNT(*) as total_posts FROM cw_posts WHERE product_id = $productId_query");
        $post_count_result = $query2->getRowArray();

        $query3 = $db->query("SELECT COUNT(*) as total_chats FROM chat WHERE send_by = $userId");
        $chat_count_result = $query3->getRowArray();

        $data = [
            'total_optedProducts' => count($separated_products),
            'total_posts' => $post_count_result['total_posts'],
            'total_chats' => $chat_count_result['total_chats'],
        ];

        return $data;

    }
}

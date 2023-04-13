<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class Client_ChatModel extends Model
{
    protected $table = 'chat';
    protected $primaryKey = '_id';
    protected $allowedFields = ['cw_post_id', 'send_by', 'send_to', 'message', 'created_date'];

    public function getChatHistory($client_id, $user_id, $post_id)
    {
        $builder = $this->db->table('chat');
        $builder->select('cw_post_id, send_by, send_to, message, created_date');
        $builder->where('cw_post_id', $post_id);
        $builder->groupStart();
        $builder->where('send_by', $client_id);
        $builder->orWhere('send_by', $user_id);
        $builder->orWhere('send_to', $client_id);
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
            'send_to' => $data['RmdataId'],
            'send_by' => $data['clientid'],
            'message' => $data['message']
        ];

        $this->insert($data);
        return $this->insertID();
    }

    public function getProductRmList($data)
    {
        $userType = $data['user_type'];
        $postId = $data['post_id'];

        $rmUsers = '';

        // Fetch the product ID for the given post ID
        $getProductIdQuery = $this->db->table('cw_posts')
            ->select('product_id')
            ->where('_id', $postId)
            ->get();
        $productIdResult = $getProductIdQuery->getResult();

        if (!empty($productIdResult)) {
            // Extract the actual product ID value from the query result
            $productId = $productIdResult[0]->product_id;

            // Fetch user profile data for users who have the product ID in their user_products_ids column
            $getUserProfileQuery = $this->db->table('user_profile')
                ->select('user_id', 'user_products_ids')
                ->like('user_products_ids', $productId . '#')
                ->orWhere('user_products_ids', 'LIKE', '%#' . $productId)
                ->orWhere('user_products_ids', 'LIKE', '%#' . $productId . '#%')
                ->orWhere('user_products_ids', $productId)
                ->orWhere('user_products_ids', 'NOT LIKE', '%#%' . $productId . '%#%')
                ->get();
            $userProfileResults = $getUserProfileQuery->getResult();

            // Extract user IDs from user_profile results
            $userIds = array_map(function ($row) {
                return $row->user_id;
            }, $userProfileResults);

            // Fetch user data for the user IDs found in the previous query     

            if (!empty($userIds)) {
                $query = $this->db->table('user_master')
                    ->whereIn('id', $userIds)
                    ->where('user_type', $userType);

                $rmUsers = $query->get()->getResult();
            } else {
                $rmUsers = array();
            }
        }
        // echo "<pre>";
        // print_r($rmUsers);
        // echo "</pre>";
        // exit;
        return $rmUsers;
    }
}

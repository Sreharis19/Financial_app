<?php

namespace App\Models;

use CodeIgniter\Model;


class Client_RM_Model extends Model
{
    protected $table = 'user_master';

    protected $requiredFields = ['name', 'email', 'phone', 'address'];

    public function getRmList($data)
    {
        $userType = $data['user_type'];

        $requiredArray = [];

        $productIds_list = explode('#', $data['product_id']);

        $query = $this->db->table('user_master')
            ->select('id, first_name, user_email, user_status')
            ->where('user_type', $userType)
            ->get();

        $users = $query->getResult();

        foreach ($users as $user) {
            $user_allProductIds_query = $this->db->table('user_profile')
                ->select('user_products_ids')
                ->where('user_id', $user->id)
                ->get();

            $user_allProductIds = $user_allProductIds_query->getResult();
            
            $productIds_list = explode('#', $user_allProductIds[0]->user_products_ids);

            foreach ($productIds_list as $productId) {
                $getProducts_query = $this->db->table('products')
                    ->select('product_name')
                    ->where('product_id', $productId)
                    ->get();

                $data[] = $getProducts_query->getResult();
                $user->products = array_column($data, 0, 'product_name');

                foreach ($productIds_list as $item1) {
                    if ($item1 == $productIds_list) {
                        if (!in_array($users, $requiredArray)) array_push($requiredArray, $users);
                    }
                }
            }
        }
        return $users;
    }


    public function searchRequiredRm($id)
    {

        $query = $this->db->table('user_master')
            ->select('id, first_name, last_name, user_email, user_status')
            ->where('id', $id)
            ->get();

        $users = $query->getResult();

        foreach ($users as $user) {
            $user_allProductIds_query = $this->db->table('user_profile')
                ->select('user_products_ids')
                ->where('user_id', $user->id)
                ->get();

            $user_allProductIds = $user_allProductIds_query->getResult();

            $productIds_list = explode('#', $user_allProductIds[0]->user_products_ids);

            foreach ($productIds_list as $key => $productId) {
                $getProducts_query = $this->db->table('products')
                    ->select('product_id, product_name')
                    ->where('product_id', $productId)
                    ->get();

                $user->product[$key] = $getProducts_query->getResult();
            }
        }

        return $user;
    }
}

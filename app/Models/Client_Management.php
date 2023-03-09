<?php

namespace App\Models;

use CodeIgniter\Model;


class Client_Management extends Model
{
    protected $table = 'user_master';

    protected $allowedFields = ['name', 'email', 'phone', 'address'];

    public function getClients($data)
    {
        $productId_query = "";
        $AndQueryBuild = " OR product_id =";
        $userType = $data['user_type'];

        $matchingArray = [];

        $product_ids = explode('#', $data['product_id']);

        $query = $this->db->table('user_master')
            ->select('id, first_name, user_email, user_status')
            ->where('user_type', $userType)
            ->get();

        $users = $query->getResult();

        foreach ($users as $user) {
            $allproducts_query = $this->db->table('user_profile')
                ->select('user_products_ids')
                ->where('user_id', $user->id)
                ->get();

            $all_products = $allproducts_query->getResult();

            $product_ids = explode('#', $all_products[0]->user_products_ids);
                foreach ($product_ids as $product_id) {
                    $products_query = $this->db->table('products')
                        ->select('product_name')
                        ->where('product_id', $product_id)
                        ->get();

                    $data[] = $products_query->getResult();
                    $user->products = array_column($data, 0, 'product_name');
                    foreach ($product_ids as $item1) {
                    if($item1 == $product_id){
                        if( !in_array($users,$matchingArray)) array_push($matchingArray,$users);
                    }
                }
            }
        }
        return $users;
    }

    public function getClientById($id)
    {


        $query = $this->db->table('user_master')
            ->select('id, first_name, last_name, user_email, user_status, user_contact')
            ->where('id', $id)
            ->get();

        $users = $query->getResult();

            $allproducts_query = $this->db->table('user_profile')
                ->select('user_products_ids')
                ->where('user_id', $users[0]->id)
                ->get();

            $all_products = $allproducts_query->getResult();

            $product_ids = explode('#', $all_products[0]->user_products_ids);
            foreach ($product_ids as $key => $product_id) {
                $products_query = $this->db->table('products')
                    ->select('product_id, product_name')
                    ->where('product_id', $product_id)
                    ->get();

                $users[0]->product[$key] = $products_query->getResult();
            }

        return $users[0];
    }

    public function addClient($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function updateClient($id, $data)
    {
        $this->update($id, $data);
        return $this->affectedRows();
    }

    public function deleteClient($id)
    {
        $this->delete($id);
        return $this->affectedRows();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;


class Ma_CwManagement extends Model
{
    protected $table = 'user_master';

    protected $allowedFields = ['first_name', 'last_name', 'user_email', 'user_contact', 'user_password', 'user_type', 'user_token', 'user_status'];

    public function getCws($data)
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

    public function getCwById($id)
    {


        $query = $this->db->table('user_master')
            ->select('id, first_name, last_name, user_email, user_status, user_contact')
            ->where('id', $id) 
            ->get();

        $users = $query->getResult();

      //  foreach ($users as $user) {
            $allproducts_query = $this->db->table('user_profile')
                ->select('*')
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
      //  }

        return $users[0];
    }

    
    public function createAccount($data, $data1){
        // $this->insert($data);
        // $lastId = $this->insertID();

        $db = db_connect(); 
        // $builder = $db->table('user_master');
        // $builder->insert($data);
        // $lastId = $db->insertID();

        $this->insert($data);
        $lastId = $this->insertID();

        if($lastId){
            $data1['user_id']= $lastId;
            $builder = $db->table('user_profile');
            $builder->insert($data1);
            $db->insertID();
        }
        
        return true;
    }


    public function updateAccount($data, $data1, $id)
    {
        // print_r($id);
        // exit;

        $db      = \Config\Database::connect();
        $this->builder = $db->table('user_master');
        $this->builder->set('first_name', $data['first_name'])
            ->set('last_name', $data['last_name'])
            ->set('user_email', $data['user_email'])
            ->set('user_contact', $data['user_contact'])
            ->where('id', $id)
            ->update();

        $this->builder = $db->table('user_profile');
        $this->builder->set('user_products_ids', $data1['user_products_ids'])
            ->set('user_country', $data1['user_country'])
            ->where('user_id', $id)
            ->update();
        return true;
    }
    public function BlockUnblockAccount($data)
    {

        $db      = \Config\Database::connect();
        $this->builder = $db->table('user_master');
        $this->builder->set('user_status', $data['type'])
            ->where('id', $data['id'])
            ->update();
        return true;
    }
}
?>


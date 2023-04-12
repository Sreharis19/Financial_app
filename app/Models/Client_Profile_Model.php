<?php

namespace App\Models;

use CodeIgniter\Model;


class Client_Profile_Model extends Model
{

    public function getUserInfo($data)

    {
        $userId = $data['userId'];

        //Get all products from Products table
        $db = db_connect();

        $builder = $db->table('user_master');
        $builder->select('user_master.first_name, user_master.last_name, user_master.user_email, user_master.user_contact, user_profile.user_products_ids, user_profile.user_min_purchase_power, user_profile.user_max_purchase_power, user_profile.bio, user_profile.user_country');
        $builder->join('user_profile', 'user_master.id = user_profile.user_id');
        $builder->where('user_master.id', $userId);

        $query = $builder->get();
        $userDetails = $query->getResult();

        $getCountryName_query = $this->db->table('countries')
        ->select('name as country_name')
        ->where('id', $userDetails[0]->user_country)
        ->get();
        
        $countryName[] = $getCountryName_query->getResult();

        $userDetails[0]->user_country = $countryName[0][0]->country_name;

          // Set the product ID from your $data parameter

          $product_ids = explode('#', $data['product_id']);

          foreach ($product_ids as $key => $productId) {
              $getProductNames_query = $this->db->table('products')
                  ->select('product_name as selected_products')
                  ->where('product_id', $productId)
                  ->get();
  
              $userDetails[] = $getProductNames_query->getResult();
          }

        // echo("<pre>");
        // print_r($userDetails);
        // exit;

        return $userDetails;
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;


class Client_Product_Model extends Model
{


    public function getProductList($id)
    {
        $pattern = '/#(?!$)(?<!^)/';

        //Get Product IDs list for the signed in User

        $get_UserProductIds_query = $this->db->table('user_profile')
            ->select('user_products_ids')
            ->where('user_id', $id)
            ->get();

        $user_allProductIds = $get_UserProductIds_query->getResult();
       
        //Split the IDs by # and get Product Names

        $individual_productIds_list = preg_split($pattern, $user_allProductIds[0]->user_products_ids);

          //Get all products from Products table
          $db = db_connect();
    
          $builder = $db->table('products');
          $builder->select('products.product_name, product_category.category_name, products.product_image, products.product_status');
          $builder->join('product_category', 'products.product_category_id = product_category.category_id', 'left');
  
          $query = $builder->get();
          $allProducts = $query->getResult();


        //foreach ($allproducts_array as &$subarray) {
        foreach ($individual_productIds_list as  $productId) {
            $getProductNames_query = $this->db->table('products')
                ->select('product_name as selected_products')
                ->where('product_id', $productId)
                ->get();

            $product_names[] = $getProductNames_query->getResult();

        }

            //Check if the user has selected any product from the list of all products and then add selected products in the array
          
            foreach ($product_names as $key => $products ) {
                foreach ($allProducts as $row) {
                    
                    if ($row->product_name == $products[0]->selected_products) {
                        $row->selected_products = 'Matched';
                        $row->current_product = $products[0]->selected_products;
                    } else {
                        $row->selected_products = 'Not Matched';
                        $row->current_product = $products[0]->selected_products;
                    }
                }
            }

            echo "<pre>";
            print_r($allProducts);
        exit;
        return $allProducts;
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;


class Client_Product_Model extends Model
{

  protected $table = 'user_profile';

  protected $allowedFields = ['user_products_ids', '_id'];

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
    $builder->select('products.product_id, products.product_name, product_category.category_name, products.product_image, products.product_status');
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
    foreach ($allProducts as $key => $row) {
      $matched = false;
      foreach ($product_names as $products) {
        if ($row->product_name == $products[0]->selected_products) {
          $matched = true;
          break;
        }
      }
      $allProducts[$key]->selected_products = ($matched ? "matched" : "not matched");
    }
    return $allProducts;
  }

  public function changeUserSelected($data)
  {
    $pattern = '/#(?!$)(?<!^)/';

    $get_UserProductIds_query = $this->db->table('user_profile')
      ->select('_id, user_products_ids')
      ->where('user_id', $data['user_id'])
      ->get();
    $user_allProductIds = $get_UserProductIds_query->getResult();

    //Split the IDs by # and get Product Names

    $individual_productIds_list = preg_split($pattern, $user_allProductIds[0]->user_products_ids);

    if (($key = array_search($data['product_id'], $individual_productIds_list)) !== false) {
      unset($individual_productIds_list[$key]);
    } else {
      array_push($individual_productIds_list, $data['product_id']);
    }
    $str = implode("#", $individual_productIds_list);


    $get_UserProfile_query = $this->db->table('user_profile')
      ->select('_id')
      ->where('user_id', $data['user_id'])
      ->get();
    $profile = $get_UserProfile_query->getResult();

    $value = [
      'user_products_ids' => $str,
    ];

    $id = $user_allProductIds[0]->_id;



    $db      = \Config\Database::connect();
    $this->builder = $db->table('user_profile');
    $this->builder->set('user_products_ids', $str)
      ->where('_id', $id)
      ->update();
    return true;
  }
}

<?php

namespace App\Controllers;

use App\Models\Client_Product_Model;

class Client_Product extends BaseController
{
    public function index()
    {
        $session = session();

        $data = $session->get('user');

        $id = $data->id;      

        $ProductModelObject = new Client_Product_Model();
        $result['productList'] = $ProductModelObject->getProductList($id);

        $stringItem = $result['product_name'];
        print_r($stringItem);
        exit;

        $arr = (array) $result;
        
       // print_r($arr);

        

        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar');

        // Load the dashboard view
        echo view('client/Client_Product_List', $arr);

        // Load the footer view
        echo view('client/footer');
    }

}

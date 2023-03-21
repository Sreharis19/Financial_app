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
        $productListResult['productList'] = $ProductModelObject->getProductList($id);

        $productArray = (array) $productListResult;

        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar');

        // Load the dashboard view
        echo view('client/Client_Product_List', $productArray);

        // Load the footer view
        echo view('client/footer');
    }

}

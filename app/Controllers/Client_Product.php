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
        $productListResult['user'] = $id;
        $productArray = (array) $productListResult;

        // echo("<pre>");
        // print_r($productArray);
        // exit;

        $headParam = [
        'heading' => 'PRODUCT LIST',
        'username'=> $data->first_name,
        'user_type'=> $data->user_type,
        'user_image'=> $data->profile->image,
        ];

        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar', $headParam);

        // Load the dashboard view
        echo view('client/Client_Product_List', $productArray);

        // Load the footer view
        echo view('client/footer');
    }

    public function changeSelect()
    {
        $data = $this->request->getPost();

        $ProductModelObject = new Client_Product_Model();
        $result = $ProductModelObject->changeUserSelected($data);
        echo json_encode(array($result));
		exit(0);
        
    }
}

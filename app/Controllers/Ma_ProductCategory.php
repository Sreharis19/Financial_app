<?php

namespace App\Controllers;

use App\Models\Ma_pcManagement;

class Ma_ProductCategory extends BaseController
{
    public function index()
    {
        $session = session();

        $data = $session->get('user');

        $params = [
            'user_type' => 2,
            'product_id' => $data->profile->user_products_ids,
        ];

        $data = [
            'heading' => 'Product Category List',
            ];
    

        $MaModel = new Ma_pcManagement();
        $result['productcategory'] = $MaModel->getProductCategory($params);

        $arr = (array) $result;

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $data);

        // Load the dashboard view
        echo view('ma/Ma_pc_List', $arr);

        // Load the footer view
        echo view('ma/footer');
    }

    // public function view()
    // {
    //     $session = session();
    //     $data = $session->get('user');

    //     $request = \Config\Services::request();
    //     $id = $request->getGet('id');

    //     $MaModel = new Ma_RmManagement();
    //     $result['client'] = $MaModel->getRmById($id);

    //     $data = [
    //         'heading' => 'RM Management',
    //         ];
    

    //     // Load the header view
    //     echo view('ma/header');

    //     // Load the sidebar view
    //     echo view('ma/sidebar', $data);

    //     // Load the dashboard view
    //     echo view('ma/Ma_Rm_View', $result);

    //     // Load the footer view
    //     echo view('ma/footer');
    // }
	
	 public function edit()
     {
         $session = session();
         $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $MaModel = new Ma_pcManagement();
        $result['productcategory'] = $MaModel->getProductCategory($id);


         $data = [
           'heading' => 'Product Category Management',
             ];
    
    //     // Load the header view
      echo view('ma/header');

    //     // Load the sidebar view
        echo view('ma/sidebar', $data);

    //     // Load the dashboard view
         echo view('ma/Ma_pc_Edit', $result);

    //     // Load the footer view
        echo view('ma/footer');
     }
	
	 public function Add()
     {
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();
         $id = $request->getGet('id');

         $MaModel = new Ma_pcManagement();
         $result['productcategory'] = $MaModel->getProductCategory($id);

         $data = [
            'heading' => 'Product Category Management',
            ];
    

       // Load the header view
        echo view('ma/header');

       //Load the sidebar view
       echo view('ma/sidebar', $data);

       // Load the dashboard view
        echo view('ma/Ma_pc_Add', $result);

     // Load the footer view
        echo view('ma/footer');
     }
}



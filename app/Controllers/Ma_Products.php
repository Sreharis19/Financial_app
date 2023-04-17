<?php

namespace App\Controllers;

use App\Models\Ma_ProductsManagement;

class Ma_Products extends BaseController
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
            'heading' => 'Products List',
        ];


        $MaModel = new Ma_ProductsManagement();
        $result['products'] = $MaModel->getProducts($params);

        $arr = (array) $result;

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $data);

        // Load the dashboard view
        echo view('ma/Ma_Products_List', $arr);

        // Load the footer view
        echo view('ma/footer');
    }

    public function view()
    {
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $MaModel = new Ma_ProductsManagement();
        $result = $MaModel->getProductById($id);

        $data1['product'] = $result[0];

        // echo"<pre>";
        // print_r($data1);
        // exit();
        $data = [
            'heading' => 'Product Management',
            ];


        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $data);

        // Load the dashboard view
        echo view('ma/Ma_Product_View', $data1);

        // Load the footer view
        echo view('ma/footer');
    }

    public function edit()
    {
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $MaModel = new Ma_ProductsManagement();
        $data1 = $MaModel->getCategory();
       
        $result = $MaModel->getProductById($id);

      
        $data1['product'] = $result[0];
        // echo"<pre>";
        // print_r($data1);
        // exit();
        $data = [
            'heading' => 'RM Management',
            ];

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $data);

        // Load the dashboard view
        echo view('ma/Ma_Product_Edit', $data1);

        // Load the footer view
        echo view('ma/footer');
    }

    public function Add()
    {
        $session = session();
        $data = $session->get('user');

        $data = [
            'heading' => 'RM Management',
        ];
        $MaModel = new Ma_ProductsManagement();
        $result = $MaModel->getCategory();

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $data);

        // Load the dashboard view
        echo view('ma/Ma_Product_Add', $result);

        // Load the footer view
        echo view('ma/footer');
    }

    public function AddData()
    {

        $session = session();
        $user = $session->get('user');

        $data = $this->request->getPost();
        $image = $this->request->getFile('image');

        // echo '<pre>';
        // print_r($data);
        // exit();
        // Check if image exists
        if ($image) {
            // Set image name and path
            $imageName = $image->getName();
            $imageExt = $image->getExtension();
            $imageNewName = date('YmdHis') . '.' . $imageExt;

            // Move image to destination folder
            $image->move(ROOTPATH . 'public/assets/uploads/product_cat', $imageNewName);

            // Return success response
            $response = [
                'success' => true,
                'message' => 'Image uploaded successfully'
            ];
        }

        $params = [
            'product_category_id' => $data['category'],
            'product_name' => $data['product_name'],
            'product_amount' => $data['product_amount'],
            'product_max_quantity' => $data['product_max_quantity'],
            'product_description' => $data['product_description'],
            'product_benefits' => $data['product_benefits'],
            'post_status' => '1',
        ];
        if($response['success'] == true){
            $params['product_image'] = $imageNewName;
        }

        $ProductModel = new Ma_ProductsManagement();
        $result = $ProductModel->createProduct($params);

        return redirect()->to('/public/Ma_Product_List')->with('status', 1);

    }

    public function EditData()
    {

        $session = session();
        $user = $session->get('user');

        $data = $this->request->getPost();
        $image = $this->request->getFile('image');

        // echo '<pre>';
        // print_r($data);
        // exit();
        // Check if image exists
        if ($image) {
            // Set image name and path
            $imageName = $image->getName();
            $imageExt = $image->getExtension();
            $imageNewName = date('YmdHis') . '.' . $imageExt;

            // Move image to destination folder
            $image->move(ROOTPATH . 'public/assets/uploads/product_cat', $imageNewName);

            // Return success response
            $response = [
                'success' => true,
                'message' => 'Image uploaded successfully'
            ];
        }

        $params = [
            'product_category_id' => $data['category'],
            'product_name' => $data['product_name'],
            'product_amount' => $data['product_amount'],
            'product_max_quantity' => $data['product_max_quantity'],
            'product_description' => $data['product_description'],
            'product_benefits' => $data['product_benefits'],
        ];
        if($response['success'] == true){
            $params['product_image'] = $imageNewName;
        }

        $ProductModel = new Ma_ProductsManagement();
        $result = $ProductModel->createProduct($params, $data['id']);

        return redirect()->to('/public/Ma_Product_List')->with('status', 1);

    }
}

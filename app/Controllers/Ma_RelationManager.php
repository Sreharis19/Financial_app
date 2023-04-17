<?php

namespace App\Controllers;

use App\Models\Ma_RmManagement;
use App\Models\Posts_Management;

class Ma_RelationManager extends BaseController
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
            'heading' => 'Relationship Manager List',
        ];


        $MaModel = new Ma_RmManagement();
        $result['rms'] = $MaModel->getRms($params);

        $arr = (array) $result;

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $data);

        // Load the dashboard view
        echo view('ma/Ma_Rm_List', $arr);

        // Load the footer view
        echo view('ma/footer');
    }

    public function view()
    {
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $MaModel = new Ma_RmManagement();
        $result['client'] = $MaModel->getRmById($id);

        $data = [
            'heading' => 'RM Management',
        ];


        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $data);

        // Load the dashboard view
        echo view('ma/Ma_Rm_View', $result);

        // Load the footer view
        echo view('ma/footer');
    }

    public function edit()
    {
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $MaModel = new Ma_RmManagement();
        $result['rm'] = $MaModel->getRmById($id);

        
        $PostModel = new Posts_Management();
        $result['select'] = $PostModel->getCountryAndPostList();

        // echo "<pre>";
        // print_r($result['rm']->product[0]);
        // exit();
        
        $data = [
            'heading' => 'RM Management',
        ];

       
        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $data);

        // Load the dashboard view
        echo view('ma/Ma_Rm_Edit', $result);

        // Load the footer view
        echo view('ma/footer');
    }

    public function Add()
    {
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();

        $data = [
            'heading' => 'RM Management',
        ];

        $PostModel = new Posts_Management();
        $result = $PostModel->getCountryAndPostList();

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $data);

        // Load the dashboard view
        echo view('ma/Ma_Rm_Add', $result);

        // Load the footer view
        echo view('ma/footer');
    }

    public function CreateAccount()
    {


        $data = $this->request->getPost();
        $array = (array) $data['product'];

        $pro = $array;
        $products = implode('#', $pro);

        $params = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'user_email' => $data['email'],
            'user_contact' => $data['ContactNumber'],
            'user_password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'user_type' => 2,
            'user_token' => date('YmdHis'),
            'user_status' => 2,

        ];

        $params1 = [
            'user_country' => $data['country'],
            'bio' => '',
            'user_products_ids' => $products,
        ];

        $MaModel = new Ma_RmManagement();
        $result = $MaModel->CreateAccount($params, $params1);

        echo json_encode(array($result));
        exit(0);
    }

    public function Rm_BlockUnblockAccount()
    {
        $data = $this->request->getPost();

        $MaModel = new Ma_RmManagement();
        $result = $MaModel->BlockUnblockAccount($data);

        echo json_encode(array($result));
        exit(0);
    }

    public function UpdateAccount()
    {


        $data = $this->request->getPost();
        $array = (array) $data['product'];

        $pro = $array;
        $products = implode('#', $pro);

        $params = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'user_email' => $data['email'],
            'user_contact' => $data['ContactNumber'],

        ];

        $params1 = [
            'user_country' => $data['country'],
            'user_products_ids' => $products,
        ];

        $MaModel = new Ma_RmManagement();
        $result = $MaModel->updateAccount($params, $params1, $data['id']);

        echo json_encode(array($result));
        exit(0);
    }

}

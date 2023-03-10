<?php

namespace App\Controllers;

use App\Models\Ma_Management;

class Ma_Client extends BaseController
{
    public function index()
    {
        $session = session();

        $data = $session->get('user');

        $params = [
            'user_type' => 4,
            'product_id' => $data->profile->user_products_ids,
        ];

        $MaModel = new Ma_Management();
        $result['clients'] = $MaModel->getClients($params);

        $arr = (array) $result;
        // echo "<pre>";
        // print_r($arr);
        // exit();

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/clientsidebar');

        // Load the dashboard view
        echo view('ma/Ma_Client_List', $arr);

        // Load the footer view
        echo view('ma/footer');
    }

    public function view()
    {
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $MaModel = new Ma_Management();
        $result['client'] = $MaModel->getClientById($id);

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/clientsidebar');

        // Load the dashboard view
        echo view('ma/Ma_Client_View', $result);

        // Load the footer view
        echo view('ma/footer');
    }
	
	public function edit()
    {
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $MaModel = new Ma_Management();
        $result['client'] = $MaModel->getClientById($id);

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/clientsidebar');

        // Load the dashboard view
        echo view('ma/Ma_Client_Edit', $result);

        // Load the footer view
        echo view('ma/footer');
    }
	
	public function Add()
    {
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $MaModel = new Ma_Management();
        $result['client'] = $MaModel->getClientById($id);

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/clientsidebar');

        // Load the dashboard view
        echo view('ma/Ma_Client_Add', $result);

        // Load the footer view
        echo view('ma/footer');
    }
}



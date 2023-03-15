<?php

namespace App\Controllers;

use App\Models\Ma_RmManagement;

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
        $result['clients'] = $MaModel->getRms($params);

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
        $result['client'] = $MaModel->getRmById($id);


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
        echo view('ma/Ma_Rm_Add', $result);

        // Load the footer view
        echo view('ma/footer');
    }
}



<?php

namespace App\Controllers;

use App\Models\Ma_CwManagement;

class Ma_ContentWriter extends BaseController
{
    public function index()
    {
        $session = session();

        $data = $session->get('user');
      

        $params = [
            'user_type' => 4,
            'product_id' => $data->profile->user_products_ids,
        ];

              
       $data = [
        'heading' => 'Content Writer List',
        ];

        $MaModel = new Ma_CwManagement();
        $result['clients'] = $MaModel->getCws($params);

        $arr = (array) $result;
        // echo "<pre>";
        // print_r($arr);
        // exit();

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $data);
       // echo view('ma/sidebar?head='+$header);

        // Load the dashboard view
        echo view('ma/Ma_Cw_List', $arr);

        // Load the footer view
        echo view('ma/footer');
    }

    public function view()
    {
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $data = [
            'heading' => 'Content Writer Management',
            ];
    

        $MaModel = new Ma_CwManagement();
        $result['client'] = $MaModel->getCwById($id);

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $data);

        // Load the dashboard view
        echo view('ma/Ma_Cw_View', $result);

        // Load the footer view
        echo view('ma/footer');
    }
	
	public function edit()
    {
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $MaModel = new Ma_CwManagement();
        $result['client'] = $MaModel->getCwById($id);

        $data = [
            'heading' => 'Content Writer Management',
            ];
    

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $data);

        // Load the dashboard view
        echo view('ma/Ma_Cw_Edit', $result);

        // Load the footer view
        echo view('ma/footer');
    }
	
	public function Add()
    {
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $MaModel = new Ma_CwManagement();
        $result['client'] = $MaModel->getCwById($id);

        $data = [
            'heading' => 'Content Writer Management',
            ];
    

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar',$data);

        // Load the dashboard view
        echo view('ma/Ma_Cw_Add', $result);

        // Load the footer view
        echo view('ma/footer');
    }
}
?>


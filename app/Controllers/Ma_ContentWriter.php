<?php

namespace App\Controllers;

use App\Models\Ma_CwManagement;
use App\Models\Posts_Management;	


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
        $result['cws'] = $MaModel->getCws($params);

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
        $result['cw'] = $MaModel->getCwById($id);

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
        $result['cw'] = $MaModel->getCwById($id);

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
     //   $id = $request->getGet('id');

       // $MaModel = new Ma_CwManagement();
        //$result['cw'] = $MaModel->getCwById($id);

       $PostModel = new Posts_Management();	
       $result = $PostModel->getCountryAndPostList();	


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
                'user_contact' =>$data['ContactNumber'],
                'user_password' => password_hash($data['password'], PASSWORD_DEFAULT),
                'user_type' => 4,
                'user_token'=> date('YmdHis'),
                'user_status'=>1,
               
            ];

            $params1 = [
               // 'user_max_purchase_power' => $data['maximum'],
                //'user_min_purchase_power' => $data['minimum'],
               // 'user_country' => $data['country'],
                'bio' =>'',
                'user_products_ids' => $products,
            ];

            $MaModel = new Ma_CwManagement();
            $result = $MaModel->CreateAccount($params, $params1);

            echo json_encode(array($result));
		    exit(0);
    }
    public function Cw_BlockUnblockAccount()
    {
        $data = $this->request->getPost();

        $MaModel = new Ma_CwManagement();
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

       
        $MaModel = new Ma_CwManagement();
        $result = $MaModel->updateAccount($params, $params1, $data['id']);
        // $MaModel = new Ma_Management();
        // $result = $MaModel->updateAccount($params, $params1, $data['id']);

        echo json_encode(array($result));
        exit(0);
    }


}
?>


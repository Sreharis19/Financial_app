<?php

namespace App\Controllers;

use App\Models\Ma_Management;
use App\Models\Posts_Management;


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

              
       $data = [
        'heading' => 'Client List',
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
        echo view('ma/sidebar', $data);
       // echo view('ma/sidebar?head='+$header);

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

        $data = [
            'heading' => 'Client Management',
            ];
    

        $PostModel = new Posts_Management();
        $result = $PostModel->getCountryAndPostList();
        $MaModel = new Ma_Management();
        $result['client'] = $MaModel->getClientById($id);

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $data);

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

        $PostModel = new Posts_Management();
        $result = $PostModel->getCountryAndPostList();
        $MaModel = new Ma_Management();
        $result['client'] = $MaModel->getClientById($id);


        $data = [
            'heading' => 'Client Management',
            ];
    

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $data);

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

        $PostModel = new Posts_Management();
        $result = $PostModel->getCountryAndPostList();

        $data = [
            'heading' => 'Client Management',
            ];

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar',$data);

        // Load the dashboard view
        echo view('ma/Ma_Client_Add', $result);

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
                'user_max_purchase_power' => $data['maximum'],
                'user_min_purchase_power' => $data['minimum'],
                'user_country' => $data['country'],
                'bio' =>'',
                'user_products_ids' => $products,
            ];

            $MaModel = new Ma_Management();
            $result = $MaModel->CreateAccount($params, $params1);

            echo json_encode(array($result));
		    exit(0);
    }
}
?>


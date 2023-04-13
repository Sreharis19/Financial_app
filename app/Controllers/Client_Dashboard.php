<?php

namespace App\Controllers;

use App\Models\ClientModel_Dashboard;



class Client_Dashboard extends BaseController
{

    public function index()
    {
        $HomeController = new \App\Controllers\Home();
        $HomeController->checkSession();
        // Load the session library
        $session = session();

        // Check if user is not logged in
        if (!$session->get('user')) {
            // Redirect user to login controller
            return redirect()->to('../../public/login');
        }else{
            $data = $session->get('user');

            if($data->id !== 2 ){
                if($data->user_type == 1){
                    return redirect()->to('../../public/Rm_dashboard');
    
                }else if($data->user_type == 3){
                    return redirect()->to('../../public/Rm_dashboard');
    
                }
            }
        }

        // echo("<pre>");
        // print_r($data);
        // exit;

        $params = [
            'user_type' => $data->user_type,
            'product_id' => $data->profile->user_products_ids,
            'client_id' => $data->id,
            'user_email' => $data->user_email,
        ];

        $ClientModel = new ClientModel_Dashboard();
        $resultArray = $ClientModel->getStats($params);

        $headParam = [
            'heading' => 'CLIENT DASHBOARD',
            'username'=> $data->first_name,
            'user_type'=> $data->user_type,
            'user_image'=> $data->profile->image,
        ];

        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar', $headParam);

        // Load the dashboard view
        echo view('client/dashboard', $resultArray);

        // Load the footer view
        echo view('client/footer');
    }
}

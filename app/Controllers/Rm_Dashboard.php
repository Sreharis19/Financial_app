<?php

namespace App\Controllers;

use App\Models\RelationManager_Dashboard;



class Rm_Dashboard extends BaseController
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
                    return redirect()->to('../../public/Admin_dashboard');
    
                }else if($data->user_type == 3){
                    return redirect()->to('../../public/Cw_dashboard');
    
                }else if($data->user_type == 4){
                    return redirect()->to('../../public/Client_dashboard');
    
                }
            }
        }

        $params = [
            'user_type' => $data->user_type,
            'product_id' => $data->profile->user_products_ids,
            'rm_id' => $data->id,
        ];

        $RmModel = new RelationManager_Dashboard();
        $result = $RmModel->getStats($params);

        // Load the header view
        echo view('rm/header');

        // Load the sidebar view
        echo view('rm/sidebar');

        // Load the dashboard view
        echo view('rm/dashboard', $result);

        // Load the footer view
        echo view('rm/footer');
    }
}

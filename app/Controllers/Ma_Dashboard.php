<?php

namespace App\Controllers;

use App\Models\MasterAdmin_Dashboard;



class Ma_Dashboard extends BaseController
{
    public function index()
    {
        // Load the session library
        $session = session();

           // Check if user is not logged in
       if (!$session->get('user')) {
        // Redirect user to login controller
        return redirect()->to('../../public/login');
    }
        $data = $session->get('user');

    
        $params = [
            'user_type' => $data->user_type,
            'product_id' => $data->profile->user_products_ids,
            'masteradmin_id' => $data->id,
        ];

        $MasterAdminModel = new MasterAdmin_Dashboard();
        $result = $MasterAdminModel->getStats($params);
        $data = [
            'heading' => 'ADMIN DASHBOARD',
            ];
    

        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $data);

        // Load the dashboard view
        echo view('ma/Ma_Dashboard', $result);

        // Load the footer view
        echo view('ma/footer');
    }
}

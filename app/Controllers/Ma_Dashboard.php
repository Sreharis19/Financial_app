<?php

namespace App\Controllers;

use App\Models\MasterAdmin_Dashboard;
use App\Controllers\Home;


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

        // Load the header view
        echo view('masteradmin/header');

        // Load the sidebar view
        echo view('masteradmin/sidebar');

        // Load the dashboard view
        echo view('masteradmin/dashboard', $result);

        // Load the footer view
        echo view('masteradmin/footer');
    }
}

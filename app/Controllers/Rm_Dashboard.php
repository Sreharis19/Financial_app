<?php

namespace App\Controllers;

use App\Models\RelationManager_Dashboard;
use App\Controllers\Home;


class Rm_Dashboard extends BaseController
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

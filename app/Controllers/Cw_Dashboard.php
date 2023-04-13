<?php

namespace App\Controllers;

use App\Models\ContentWriter_Dashboard;
use App\Controllers\Home;


class Cw_Dashboard extends BaseController
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

        $header = [
            'heading' => 'Content Writer Dashboard',
            'username'=> $data->first_name,
            'user_type'=> $data->user_type,
            'user_image'=> $data->profile->image,
        ];

        $params = [
            'user_type' => $data->user_type,
            'product_id' => $data->profile->user_products_ids,
            'cw_id' => $data->id,
        ];

        $CwModel = new ContentWriter_Dashboard();
        $result = $CwModel->getStats($params);

        // Load the header view
        echo view('cw/header');

        // Load the sidebar view
        echo view('cw/sidebar', $header);

        // Load the dashboard view
        echo view('cw/dashboard', $result);

        // Load the footer view
        echo view('cw/footer');
    }
}

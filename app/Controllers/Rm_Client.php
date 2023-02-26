<?php

namespace App\Controllers;

use App\Models\Client_Management;

class Rm_Client extends BaseController
{
    public function index()
    {
        $Active =
            $data = [
                'user_type' => 0,
                'product_id' => 0,
                'rm_id' => 0,
            ];
        $ClientModel = new Client_Management();
        $result['clients'] = $ClientModel->getClients();

        $arr = (array) $result;
        
        // Load the header view
        echo view('rm/header');

        // Load the sidebar view
        echo view('rm/sidebar');

        // Load the dashboard view
        echo view('rm/Rm_Client_List', $arr);

        // Load the footer view
        echo view('rm/footer');
    }
}

<?php

namespace App\Controllers;

use App\Models\Client_Management;

class Rm_Client extends BaseController
{
    public function index()
    {
        $session = session();

        $data = $session->get('user');

        $params = [
            'user_type' => 4,
            'product_id' => $data->profile->user_products_ids,
        ];

        $ClientModel = new Client_Management();
        $result['clients'] = $ClientModel->getClients($params);

        $arr = (array) $result;
        $header = [
            'heading' => 'Client List',
            'username'=> $data->first_name,
            'user_type'=> $data->user_type,
            'user_image'=> $data->profile->image,
        ];

        // Load the header view
        echo view('rm/header');

        // Load the sidebar view
        echo view('rm/sidebar', $header);

        // Load the dashboard view
        echo view('rm/Rm_Client_List', $arr);

        // Load the footer view
        echo view('rm/footer');
    }

    /* detailed view of a client for rm */
    public function view()
    {
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $ClientModel = new Client_Management();
        $result['client'] = $ClientModel->getClientById($id);

        $header = [
            'heading' => 'Client Details - View',
            'username'=> $data->first_name,
            'user_type'=> $data->user_type,
            'user_image'=> $data->profile->image,
        ];


        // Load the header view
        echo view('rm/header');

        // Load the sidebar view
        echo view('rm/sidebar', $header);

        // Load the dashboard view
        echo view('rm/Rm_Client_View', $result);

        // Load the footer view
        echo view('rm/footer');
    }
}

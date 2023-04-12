<?php

namespace App\Controllers;

use App\Models\Client_Profile_Model;

class Client_Profile extends BaseController
{
    public function index()
    {
        $session = session();

        $data = $session->get('user');

        $params = [
            'userId' => $data->id,
            'product_id' => $data->profile->user_products_ids,
        ];    

        $ProfileModelObject = new Client_Profile_Model();
        $profileResult['userInfo'] = $ProfileModelObject->getUserInfo($params);

        $profileArray = (array) $profileResult;

        // echo("<pre>");
        // print_r($profileArray);
        // exit;

        $headParam = ['heading' => 'CLIENT PROFILE MANAGEMENT',];

        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar', $headParam);

        // Load the dashboard view
        echo view('client/Client_Profile_View', $profileArray);

        // Load the footer view
        echo view('client/footer');
    }
}

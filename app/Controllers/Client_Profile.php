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

        $headParam = [
            'heading' => 'MY PROFILE',
            'username'=> $data->first_name,
            'user_type'=> $data->user_type,
            'user_image'=> $data->profile->image,];

        // Check if user is not logged in
        if ($session->get('user')) {

            if ($data->user_type == 1) {
                
                // Load the header view
                echo view('ma/header');

                // Load the sidebar view
                echo view('ma/sidebar', $headParam);

                // Load the dashboard view
                echo view('client/Client_Profile_View', $profileArray);

                // Load the footer view
                echo view('ma/footer');
            } else if ($data->user_type == 2) {
                $header = [
                    'heading' => 'My Profile',
                    'username' => $data->first_name,
                    'user_type' => $data->user_type,
                    'user_image' => $data->profile->image,
                ];
                // Load the header view
                echo view('rm/header');

                // Load the sidebar view
                echo view('rm/sidebar', $header);

                // Load the dashboard view
                echo view('client/Client_Profile_View', $profileArray);

                // Load the footer view
                echo view('rm/footer');
            } else if ($data->user_type == 3) {
                $header = [
                    'heading' => 'My Profile',
                    'username' => $data->first_name,
                    'user_type' => $data->user_type,
                    'user_image' => $data->profile->image,
                ];
                // Load the header view
                echo view('cw/header');

                // Load the sidebar view
                echo view('cw/sidebar', $header);

                // Load the dashboard view
                echo view('client/Client_Profile_View', $profileArray);

                // Load the footer view
                echo view('cw/footer');
            } else if ($data->user_type == 4) {
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
    }
}

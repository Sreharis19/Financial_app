<?php

namespace App\Controllers;

use App\Models\Client_Post_Model;

class Client_Post extends BaseController
{
    public function index()
    {
        $session = session();

        $data = $session->get('user');

        $params = [
            'user_type' => 2,
            'product_id' => $data->profile->user_products_ids,
        ];

        $PostModel = new Client_Post_Model();
        $postsListResult['postsList'] = $PostModel->getPosts($params);

        $headParam = [
        'heading' => 'POST LIST',
        'username'=> $data->first_name,
        'user_type'=> $data->user_type,
        'user_image'=> $data->profile->image,
        ];

        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar', $headParam);

        // Load the dashboard view
        echo view('client/Client_Post_List', $postsListResult);

        // Load the footer view
        echo view('Client/footer');
    }

    public function view()
    {
        $session = session();

        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $PostModel = new Client_Post_Model();
        $postResult['post'] = $PostModel->getPostBySlug($id);

        $headParam = 
        ['heading' => 'POST DETAILS',
        'username'=> $data->first_name,
        'user_type'=> $data->user_type,
        'user_image'=> $data->profile->image,];

        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar', $headParam);

        // Load the dashboard view
        echo view('client/Client_Post_View', $postResult);

        // Load the footer view
        echo view('client/footer');
    }

}

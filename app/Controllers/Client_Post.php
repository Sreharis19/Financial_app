<?php

namespace App\Controllers;

use App\Models\Posts_Management;
use App\Models\Client_Management;
use App\Models\Rm_SendPost;

class Rm_Post extends BaseController
{
    public function index()
    {
        $session = session();

        $data = $session->get('user');

        $params = [
            'user_type' => 4,
            'product_id' => $data->profile->user_products_ids,
        ];

        $PostModel = new Posts_Management();
        $result['posts'] = $PostModel->getPosts($params);

        $arr = (array) $result;

        // Load the header view
        echo view('rm/header');

        // Load the sidebar view
        echo view('rm/sidebar');

        // Load the dashboard view
        echo view('rm/Rm_Post_List', $arr);

        // Load the footer view
        echo view('rm/footer');
    }

    public function view()
    {

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $PostModel = new Posts_Management();
        $result['post'] = $PostModel->getPostBySlug($id);

         // echo"<pre>";
        // print_r($post[0]);exit();
        // Load the header view
        echo view('rm/header');

        // Load the sidebar view
        echo view('rm/sidebar');

        // Load the dashboard view
        echo view('rm/Rm_Post_View', $result);

        // Load the footer view
        echo view('rm/footer');
    }

    public function SendTo()
    {
        $session = session();

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $data = $session->get('user');

        $params = [
            'user_type' => 4,
            'product_id' => $data->profile->user_products_ids,
        ];

        $ClientModel = new Client_Management();
        $result['clients'] = $ClientModel->getClients($params);

        $PostModel = new Posts_Management();
        $result['post'] = $PostModel->getPostBySlug($id);

        $arr = (array) $result;

        //  echo"<pre>";
        // print_r($arr);exit();
        // Load the header view
        echo view('rm/header');

        // Load the sidebar view
        echo view('rm/sidebar');

        // Load the dashboard view
        echo view('rm/Rm_Post_SendTo', $result);

        // Load the footer view
        echo view('rm/footer');
    }

    public function Rm_SendPost(){
        $data = $this->request->getPost();
        $PostModel = new Rm_SendPost();
        $result= $PostModel->sendPost($data);
        echo json_encode(array($result));
		exit(0);
    }
}

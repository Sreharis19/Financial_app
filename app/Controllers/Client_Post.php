<?php

namespace App\Controllers;

use App\Models\Posts_Management;
use App\Models\Client_RM_Model;
use App\Models\Rm_SendPost;

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

        $PostModel = new Posts_Management();
        $result['postsList'] = $PostModel->getPosts($params);

        $arr = (array) $result;

        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar');

        // Load the dashboard view
        echo view('client/Client_Post_List', $arr);

        // Load the footer view
        echo view('Client/footer');
    }

    public function view()
    {

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $PostModel = new Posts_Management();
        $result['post'] = $PostModel->getPostBySlug($id);

        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar');

        // Load the dashboard view
        echo view('client/Client_Post_View', $result);

        // Load the footer view
        echo view('client/footer');
    }

    public function sendTo()
    {
        $session = session();

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $data = $session->get('user');

        $params = [
            'user_type' => 2,
            'product_id' => $data->profile->user_products_ids,
        ];

        //Updated for Client

        $RmModel = new Client_RM_Model();
        $result['rmList'] = $RmModel->getClients($params);

        $PostModel = new Posts_Management();
        $result['post'] = $PostModel->getPostBySlug($id);

        $arr = (array) $result;

       
        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar');

        // Load the dashboard view
        echo view('client/Client_Chat', $result);

        // Load the footer view
        echo view('client/footer');
    }

    public function Rm_SendPost(){
        $data = $this->request->getPost();
        $PostModel = new Rm_SendPost();
        $result= $PostModel->sendPost($data);
        echo json_encode(array($result));
		exit(0);
    }
}

<?php

namespace App\Controllers;

use App\Models\Posts_Management;
use App\Models\Client_Management;
use App\Models\Rm_SendPost;
use App\Models\Rm_ChatModel;

class Client_Chat extends BaseController
{
    public function step1()
    {
        $session = session();

        $data = $session->get('user');

        $params = [
            'product_id' => $data->profile->user_products_ids,
        ];
        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $PostModel = new Posts_Management();
        $result['posts'] = $PostModel->getPosts($params);
        $result['userId'] = $id;

        $arr = (array) $result;

        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar');

        // Load the dashboard view
        echo view('client/Client_DirectChat_Step1', $arr);

        // Load the footer view
        echo view('client/footer');
    }

    public function directChat()
    {

        $request = \Config\Services::request();
        $pid = $request->getGet('pid');
        $user = $request->getGet('user');


        $session = session();

        // Check if user is not logged in
        if (!$session->get('user')) {
            // Redirect user to login controller
            return redirect()->to('../../public/login');
        }

        $data = $session->get('user');

        $ChatModel = new Rm_ChatModel();
        $result['chats'] = $ChatModel->getChatHistory($data->id, $user, $pid);

        $ClientModel = new Client_Management();
        $result['client'] = $ClientModel->getClientById($user);

        $result['client_id'] = $data->id;
        $result['cw_post_id'] = $pid;
        //  echo"<pre>";
        // print_r($result);exit();
        // Load the header view
        echo view('rm/header');

        // Load the sidebar view
        echo view('rm/sidebar');

        // Load the dashboard view
        echo view('rm/Rm_DirectChat', $result);

        // Load the footer view
        echo view('rm/footer');
    }

    public function Save_ChatMessage()
    {
        $data = $this->request->getPost();

        $ChatModel = new Rm_ChatModel();
        $result = $ChatModel->saveMessage($data);
        echo json_encode(array($result));
		exit(0);
       
    }

    public function Rm_SendPost(){
        $data = $this->request->getPost();
        $PostModel = new Rm_SendPost();
        $result= $PostModel->sendPost($data);
        echo json_encode(array($result));
		exit(0);
    }
}

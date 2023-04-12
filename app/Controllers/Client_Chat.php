<?php

namespace App\Controllers;

use App\Models\Client_RM_Model;
use App\Models\Client_Management;
use App\Models\Client_ChatModel;

class Client_Chat extends BaseController
{
    public function selectRm()
    {
        $session = session();

        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $params = [
            'user_type' => 2,
            'post_id' =>  $id,
        ];

        $chatModel = new Client_ChatModel();
        $result['rmUsers'] = $chatModel->getProductRmList($params);
        $result['postId'] = $id;

        $arr = (array) $result;

        // echo"<pre>";
        // print_r($arr);
        // exit();

        $headParam = ['heading' => 'CLIENT RELATIONSHIP MANAGER LIST',];

        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar', $headParam);

        // Load the dashboard view
        echo view('client/Client_Chat_SelectRm', $arr);

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

        // echo"<pre>";
        // print_r($pid);
        // exit();


        $data = $session->get('user');

        $ChatModel = new Client_ChatModel();
        $result['chats'] = $ChatModel->getChatHistory($data->id, $user, $pid);

        $ClientRmModel = new Client_RM_Model();
        $result['rm'] = $ClientRmModel->getRmDetails($user);

        $result['client_id'] = $data->id;
        $result['cw_post_id'] = $pid;


        // echo"<pre>";
        // print_r($result);
        // exit();

        $headParam = ['heading' => 'CLIENT RELATIONSHIP MANAGER LIST',];
        
        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar', $headParam);

        // Load the dashboard view
        echo view('client/Client_ChatView', $result);

        // Load the footer view
        echo view('client/footer');
    }

    public function Save_ChatMessage()
    {
        $data = $this->request->getPost();

        $ChatModel = new Client_ChatModel();
        $result = $ChatModel->saveMessage($data);
        echo json_encode(array($result));
		exit(0);
       
    }
}

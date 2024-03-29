<?php

namespace App\Controllers;

use App\Models\Client_Support_Model;

class Client_Support extends BaseController
{
    public function index()
    {
        $session = session();

        $data = $session->get('user');

        $clientSupportModel = new Client_Support_Model();
        $getUser['userDetails'] = $clientSupportModel->getList($data->id);

        $getUserArray = (array) $getUser;
    
        $headParam = [
            'heading' => 'SUPPORT',
            'username'=> $data->first_name,
            'user_type'=> $data->user_type,
            'user_image'=> $data->profile->image,];
    
        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar', $headParam);

        // Load the dashboard view
        echo view('client/Client_Support_View', $getUserArray);

        // Load the footer view
        echo view('client/footer');
    }

    public function Save_Ticket()
    {
        $session = session();

        $data = $session->get('user');
        $params = $this->request->getPost();

        $clientSupportModel = new Client_Support_Model();
        $result = $clientSupportModel->CreateTicket($data->id, $params['message']);

        echo json_encode(array($result));
		exit(0);
    
        
    }

    public function Delete_Query()
    {
        $session = session();

        $params = $this->request->getPost();

        $clientSupportModel = new Client_Support_Model();
        $client_deleteTicket = $clientSupportModel->DeleteQuery($params['id']);

        echo json_encode(array($client_deleteTicket));
		exit(0);
    
        
    }
}
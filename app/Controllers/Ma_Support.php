<?php

namespace App\Controllers;

use App\Models\Ma_SupportModel;

class Ma_Support extends BaseController
{
    public function index()
    {
        $session = session();

        $data = $session->get('user');

        $header = [
            'heading' => 'AdminSupport',
        ];

        $SupportModel = new Ma_SupportModel();
        $result['lists'] = $SupportModel->getList();

        $arr = (array) $result;
    
        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $header);

        // Load the dashboard view
        echo view('ma/ma_support', $arr);

        // Load the footer view
        echo view('ma/footer');
    }

    public function reply()
    {
        $session = session();

        $data = $session->get('user');
        $params = $this->request->getPost();

        $SupportModel = new Ma_SupportModel();
        $result = $SupportModel->ReplySupport($params['id'], $params['reply']);

        echo json_encode(array($result));
		exit(0);
    
        
    }
}
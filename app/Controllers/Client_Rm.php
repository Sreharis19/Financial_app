<?php

namespace App\Controllers;

use App\Models\Client_RM_Model;

class Client_Rm extends BaseController
{
    public function index()
    {
        $session = session();

        $data = $session->get('user');
        $params = [
            'user_type' => 2,
            'product_id' => $data->profile->user_products_ids,
        ];

        $RmModelObject = new Client_RM_Model();
        $result['rmList'] = $RmModelObject->getRmList($params);

        $arr = (array) $result;

        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar');

        // Load the dashboard view
        echo view('client/Client_Rm_List', $arr);

        // Load the footer view
        echo view('client/footer');
    }

    public function view()
    {
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $RmModelObject = new Client_RM_Model();
        $result['viewRm'] = $RmModelObject->searchRequiredRm($id);

        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar');

        // Load the dashboard view
        echo view('client/Client_Rm_View', $result);

        // Load the footer view
        echo view('client/footer');
    }
}

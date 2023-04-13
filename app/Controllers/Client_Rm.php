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
        $rmListResult['rmList'] = $RmModelObject->getRmList($params);

        $resultArray = (array) $rmListResult;

        $headParam = [
        'heading' => 'RELATIONSHIP MANAGER LIST',
        'username'=> $data->first_name,
        'user_type'=> $data->user_type,
        'user_image'=> $data->profile->image,];

        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar', $headParam);

        // Load the dashboard view
        echo view('client/Client_Rm_List', $resultArray);

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
        $viewRmResult['viewRm'] = $RmModelObject->getRmDetails($id);

        $headParam = [
            'heading' => 'RELATIONSHIP MANAGER DETAILS',
            'username'=> $data->first_name,
            'user_type'=> $data->user_type,
            'user_image'=> $data->profile->image,];

        // Load the header view
        echo view('client/header');

        // Load the sidebar view
        echo view('client/sidebar', $headParam);

        // Load the dashboard view
        echo view('client/Client_Rm_View', $viewRmResult);

        // Load the footer view
        echo view('client/footer');
    }
}

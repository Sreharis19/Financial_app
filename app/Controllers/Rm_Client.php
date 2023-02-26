<?php

namespace App\Controllers;

use App\Models\Client_Management;

class Rm_Client extends BaseController
{
    public function index()
    {
        $ClientModel = new Client_Management();
        $result['clients'] = $ClientModel->getClients();

        $arr = (array) $result;

        // Load the header view
        echo view('rm/header');

        // Load the sidebar view
        echo view('rm/sidebar');

        // Load the dashboard view
        echo view('rm/Rm_Client_List', $arr);

        // Load the footer view
        echo view('rm/footer');
    }

    public function view()
    {
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        $ClientModel = new Client_Management();
        $result['client'] = $ClientModel->getClientById($id);

        // Load the header view
        echo view('rm/header');

        // Load the sidebar view
        echo view('rm/sidebar');

        // Load the dashboard view
        echo view('rm/Rm_Client_View', $result);

        // Load the footer view
        echo view('rm/footer');
    }
}

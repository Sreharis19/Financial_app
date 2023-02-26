<?php

namespace App\Controllers;

use App\Models\Posts_Management;

class Rm_Post extends BaseController
{
    public function index()
    {
        $PostModel = new Posts_Management();
        $result['posts'] = $PostModel->getPosts();

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
        $session = session();
        $data = $session->get('user');

        $request = \Config\Services::request();
        $id = $request->getGet('id');

        


        $ClientModel = new Client_Management();
        $result['client'] = $ClientModel->getClientById($id);

        // echo"<pre>";
        // print_r($result['client']);
        // exit();

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

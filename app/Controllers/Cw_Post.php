<?php

namespace App\Controllers;

use App\Models\Posts_Management;
use App\Models\Client_Management;

class Cw_Post extends BaseController
{
    public function index()
    {
        $session = session();

        $data = $session->get('user');

        $PostModel = new Posts_Management();
        $result['posts'] = $PostModel->getPostsForCw($data->id);

        $arr = (array) $result;

        // Load the header view
        echo view('cw/header');

        // Load the sidebar view
        echo view('cw/sidebar');

        // Load the dashboard view
        echo view('cw/Cw_Post_List', $arr);

        // Load the footer view
        echo view('cw/footer');
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
        echo view('cw/header');

        // Load the sidebar view
        echo view('cw/sidebar');

        // Load the dashboard view
        echo view('cw/Cw_Post_View', $result);

        // Load the footer view
        echo view('cw/footer');
    }

    public function Create_Post_view()
    {
        echo view('cw/header');

        // Load the sidebar view
        echo view('cw/sidebar');

        // Load the dashboard view
        echo view('cw/Cw_Post_Add');

        // Load the footer view
        echo view('cw/footer');
    }

    public function Update_Post_view()
    {
        echo view('cw/header');

        // Load the sidebar view
        echo view('cw/sidebar');

        // Load the dashboard view
        echo view('cw/Cw_Post_Edit');

        // Load the footer view
        echo view('cw/footer');
    }

}

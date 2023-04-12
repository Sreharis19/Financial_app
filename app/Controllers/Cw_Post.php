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
        $status = $session->get('status');

        $PostModel = new Posts_Management();
        $result['posts'] = $PostModel->getPostsForCw($data->id);
        $result['status'] = $status;

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


        $PostModel = new Posts_Management();
        $result = $PostModel->getCountryAndPostList();

        echo view('cw/header');

        // Load the sidebar view
        echo view('cw/sidebar');

        // Load the dashboard view
        echo view('cw/Cw_Post_Add', $result);

        // Load the footer view
        echo view('cw/footer');
    }

    public function Add_Post()
    {
        $image = $this->request->getFile('image');

        $data = $this->request->getPost();

        $session = session();

        $user = $session->get('user');

        // Check if image exists
        if ($image) {
            // Set image name and path
            $imageName = $image->getName();
            $imageExt = $image->getExtension();
            $imageNewName = date('YmdHis') . '.' . $imageExt;

            // Move image to destination folder
            $image->move(ROOTPATH.'public/assets/uploads/post', $imageNewName);

            // Return success response
            $response = [
                'success' => true,
                'message' => 'Image uploaded successfully'
            ];

            $params = [
                'product_id' => $data['category'],
                'post_title' => $data['post_title'],
                'post_region' => $data['region'],
                'post_image' => $imageNewName,
                'post_content' => $data['content'],
                'min_purchase_amount' => $data['min'],
                'max_purchase_amount' => $data['max'],
                'created_by' => $user->id,
                'post_slug' => date('YmdHis'),
                'post_status' => 0,
            ];

            $PostModel = new Posts_Management();
            $result = $PostModel->createPost($params);

            return redirect()->to('/public/Cw_Post_List')->with('status', 1);
        } 
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

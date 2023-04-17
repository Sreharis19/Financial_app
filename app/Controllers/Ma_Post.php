<?php

namespace App\Controllers;

use App\Models\Ma_PostManagement;

class Ma_Post extends BaseController
{
    public function index()
    {
        $session = session();

        $data = $session->get('user');

        $params = [
            'user_type' => 4,
            'product_id' => $data->profile->user_products_ids,
        ];

        $PostModel = new Ma_PostManagement();
        $result['posts'] = $PostModel->getPosts($params);

        $arr = (array) $result;

        $header = [
            'heading' => 'Post List',
        ];


        // Load the header view
        echo view('ma/header');

        // Load the sidebar view
        echo view('ma/sidebar', $header);

        // Load the dashboard view
        echo view('ma/Ma_Post_List', $arr);

        // Load the footer view
        echo view('ma/footer');
    }


    public function archive()
    {
        $data = $this->request->getPost();
        $PostModel = new Ma_PostManagement();
        $result = $PostModel->archivePostModel($data['id']);
        $data['status']=true;
        echo json_encode(array($data));
        exit(0);
    }

    public function unarchive()
    {
        $data = $this->request->getPost();
        $PostModel = new Ma_PostManagement();
        $result = $PostModel->unarchivePostModel($data['id']);
        $data['status']=true;
        echo json_encode(array($data));
        exit(0);
    }
}

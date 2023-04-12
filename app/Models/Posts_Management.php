<?php

namespace App\Models;

use CodeIgniter\Model;


class Posts_Management extends Model
{
    protected $table = 'cw_posts';
    protected $allowedFields = ['product_id', 'post_title', 'post_image', 'post_content', 'post_region', 'min_purchase_amount', 'max_purchase_amount', 'created_by', 'post_slug', 'post_status'];

    public function getPosts($data)
    {
        $productId_query = "";
        $AndQueryBuild = " OR product_id =";

        $product_ids = explode('#', $data['product_id']);

        foreach ($product_ids as $key => $product_id) {

            if ($key == 0) {
                $productId_query .= $product_id;
            } else {
                $productId_query .=  $AndQueryBuild . $product_id;
            }
        }
        $query = $this->db->table('cw_posts')
            ->select('_id, post_title, post_content, post_slug, post_status')
            ->where('product_id', $productId_query)
            ->get();

        $posts = $query->getResult();

        return $posts;
    }

    public function getPostsForCw($userId)
    {
        $query = $this->db->table('cw_posts')
            ->select('_id, post_title, post_content, post_slug, post_status')
            ->where('created_by', $userId)
            ->get();

        $posts = $query->getResult();

        return $posts;
    }

    public function getPostBySlug($id)
    {


        $query = $this->db->table('cw_posts')
            ->select('_id, product_id, post_title, post_content, post_slug, post_status, post_image')
            ->where('post_slug', $id)
            ->get();

        $post = $query->getResult();

        $products_query = $this->db->table('products')
            ->select('product_name')
            ->where('product_id', $post[0]->product_id)
            ->get();

        $data = $products_query->getResult();
        $post[0]->product_name = array_column($data, 'product_name');
        $post[0]->product_name = $post[0]->product_name[0];

        return $post[0];
    }

    public function getCountryAndPostList()
    {

        $query = $this->db->table('products')
            ->select('product_id, product_name')
            ->get();
        $result['category'] = $query->getResult();

        $query = $this->db->table('countries')
            ->select('id, name')
            ->get();
        $result['country'] = $query->getResult();
        return $result;
    }

    public function createPost($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function updatePost()
    {
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;


class Client_Post_Model extends Model
{
    protected $table = 'cw_posts';
    protected $primaryKey = 'id';
	protected $allowedFields = ['post_id', 'user_id'];

    public function getPosts($data)

    {
       // Set the product ID from your $data parameter
        
       $product_ids = explode('#', $data['product_id']);

       // Create an array to store the matching data
       $matching_data = array();
       
        // Get all data from the cw_post table

        $query = $this->db->table('cw_posts')
            ->select('_id, product_id, post_title, post_content, post_slug, post_status')
            ->where('post_status', '1')
            ->get();

        $activePosts = $query->getResult();

        // Iterate through the results and find the matching data

        foreach ($activePosts as $activePost) {
            foreach ($product_ids as $productID) {
                if ($activePost->product_id == $productID) {

                    // Add the matching data to the array
                    $matching_data[] = $activePost;
                }
            }
        }

        return $matching_data;
        // echo("<pre>");
        // print_r($matching_data);
        // exit;
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

            $data= $products_query->getResult();
            $post[0]->product_name = array_column($data, 'product_name');
            $post[0]->product_name = $post[0]->product_name[0];
       
        return $post[0];
    }

}

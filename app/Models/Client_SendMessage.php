<?php

namespace App\Models;

use CodeIgniter\Model;


class Client_SendMessage extends Model
{
    protected $table = 'rm_sentpost';
    protected $primaryKey = 'id';
	protected $allowedFields = ['post_id', 'user_id'];

    public function getPosts()

    {
        $query = $this->db->table('cw_posts')
            ->select('_id, post_title, post_content, post_slug, post_status')
            ->where('product_id', 1)
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

            $data= $products_query->getResult();
            $post[0]->product_name = array_column($data, 'product_name');
            $post[0]->product_name = $post[0]->product_name[0];
       
        return $post[0];
    }

    public function rm_sentpost($data){

    }

    public function sendPost($data)
	{
        $query = $this->db->table('cw_posts')
            ->select('_id')
            ->where('post_slug', $data['product_id'])
            ->get();

        $post = $query->getResult();

        foreach ($data['users'] as $value) {
            $data = [
                'post_id' => $post[0]->_id,
                'user_id' => $value
            ];
            $this->insert($data);
	        $this->insertID();
        }
        $result['message'] = "post sent successfully";
        $result['status'] = true;
        return $result;
	}
}

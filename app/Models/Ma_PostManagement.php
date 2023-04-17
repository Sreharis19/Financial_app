<?php

namespace App\Models;

use CodeIgniter\Model;


class Ma_PostManagement extends Model
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
            ->orderBy('_id', 'DESC')
            ->get();

        $posts = $query->getResult();

        return $posts;
    }

    public function archivePostModel($id)
    {
        $db      = \Config\Database::connect();
        $this->builder = $db->table('cw_posts');
        $this->builder->set('post_status', '2')
            ->where('_id', $id)
            ->update();
        return ;
    }

    public function unarchivePostModel($id)
    {
        $db      = \Config\Database::connect();
        $this->builder = $db->table('cw_posts');
        $this->builder->set('post_status', '1')
            ->where('_id', $id)
            ->update();
        return true;
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;


class Ma_PostManagement extends Model
{
    protected $table = 'cw_posts';
    protected $allowedFields = ['product_id', 'post_title', 'post_image', 'post_content', 'post_region', 'min_purchase_amount', 'max_purchase_amount', 'created_by', 'post_slug', 'post_status'];

    public function getPosts($data)
    {
    
        $query = $this->db->table('cw_posts')
            ->select('_id, post_title, post_content, post_slug, post_status')
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

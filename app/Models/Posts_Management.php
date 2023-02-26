<?php

namespace App\Models;

use CodeIgniter\Model;


class Posts_Management extends Model
{
    protected $table = 'cw_posts';

    public function getPosts()

    {
        $query = $this->db->table('cw_posts')
            ->select('post_title, post_content, post_slug, post_status')
            ->where('product_id', 1)
            ->get();

        $posts = $query->getResult();

        return $posts;
    }

    public function getClientById($id)
    {


        $query = $this->db->table('user_master')
            ->select('id, first_name, last_name, user_email, user_status, user_contact')
            ->where('user_type', 4)
            ->get();

        $users = $query->getResult();

        foreach ($users as $user) {
            $allproducts_query = $this->db->table('user_profile')
                ->select('user_products_ids')
                ->where('user_id', $user->id)
                ->get();

            $all_products = $allproducts_query->getResult();

            $product_ids = explode('#', $all_products[0]->user_products_ids);
            foreach ($product_ids as $key => $product_id) {
                $products_query = $this->db->table('products')
                    ->select('product_id, product_name')
                    ->where('product_id', $product_id)
                    ->get();

                $user->product[$key] = $products_query->getResult();
            }
            
        }

        return $user;
    }
}

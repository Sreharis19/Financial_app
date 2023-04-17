<?php

namespace App\Models;

use CodeIgniter\Model;


class Ma_ProductsManagement extends Model
{
    protected $table = 'products';

    protected $allowedFields = ['product_category_id', 'product_name', 'product_image', 'product_amount', 'product_max_quantity', 'product_description', 'product_benefits', 'product_status'];

    public function getProducts()
    {

        $db = db_connect();

        $builder = $db->table('products');
        $builder->select('*');
        $builder->join('product_category', 'products.product_category_id = product_category.category_id', 'left');
        $query = $builder->get();
        $products = $query->getResult();

        return $products;
    }

    public function getProductById($id)
    {

        $db = db_connect();

        $builder = $db->table('products');
        $builder->select('*');
        $builder->where('product_id', $id);
        $builder->join('product_category', 'products.product_category_id = product_category.category_id', 'left');
        $query = $builder->get();
        $products = $query->getResult();

        return $products;
    }

    public function getCategory()
    {

        $query = $this->db->table('product_category')
            ->select('category_id, category_name')
            ->get();
        $result['category'] = $query->getResult();
        return $result;
    }

    public function createProduct($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function updateClient($data, $id)
    {
        $db      = \Config\Database::connect();
        $this->builder = $db->table('products');
        if ($data['product_image']) {
            $this->builder->set('product_category_id', $data['category'])
                ->set('product_name', $data['product_name'])
                ->set('product_amount', $data['product_amount'])
                ->set('product_image', $data['product_image'])
                ->set('product_max_quantity', $data['product_max_quantity'])
                ->set('product_description', $data['product_description'])
                ->set('product_benefits', $data['product_benefits'])
                ->where('product_id', $id)
                ->update();
        } else {
            $this->builder->set('product_category_id', $data['category'])
                ->set('product_name', $data['product_name'])
                ->set('product_amount', $data['product_amount'])
                ->set('product_max_quantity', $data['product_max_quantity'])
                ->set('product_description', $data['product_description'])
                ->set('product_benefits', $data['product_benefits'])
                ->where('product_id', $id)
                ->update();
        }

        return true;
    }
}

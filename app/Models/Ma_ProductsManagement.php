<?php

namespace App\Models;

use CodeIgniter\Model;


class Ma_ProductsManagement extends Model
{
    protected $table = 'user_master';

    protected $allowedFields = ['name', 'email', 'phone', 'address'];

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

}


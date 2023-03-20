<?php

namespace App\Models;

use CodeIgniter\Model;


class Ma_pcManagement extends Model
{
    protected $table = 'user_master';

    protected $allowedFields = ['name', 'email', 'phone', 'address'];

    public function getProductCategory()
    {

        $db = db_connect();

        $builder = $db->table('product_category');
        $builder->select('*');
        $builder->join('products', ' product_category.category_id = products.product_category_id ', 'left');
        $query = $builder->get();
        $productcategory = $query->getResult();

        return $productcategory;

    }

}


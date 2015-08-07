<?php
require_once 'Database.php';
require_once 'Model.php';
/**
 * Created by PhpStorm.
 * User: Trang
 * Date: 8/3/2015
 * Time: 1:01 PM
 */
class ProductModel extends Model {

    public function __construct($table)
    {
        parent::__construct($table);
    }

    public function filter($category_id)
    {
        $query = "SELECT * FROM products WHERE category_id = $category_id";
        $result = $this->cont->query($query);
        return $result;
    }
    public function getCount($category_id){
        $query = "SELECT COUNT(productname) FROM products WHERE category_id = $category_id";
        $result = $this->cont->query($query);
        return $result;
    }
}
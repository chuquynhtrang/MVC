<?php
require_once 'Database.php';
require_once 'Model.php';
/**
 * Created by PhpStorm.
 * User: Trang
 * Date: 8/3/2015
 * Time: 1:01 PM
 */
class CategoryModel extends Model{
    public function __construct($table)
    {
        parent::__construct($table);
    }
}
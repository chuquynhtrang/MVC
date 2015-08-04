<?php
require_once 'Model/ProductModel.php';
class ProductController extends BaseController
{
    public function index()
    {
        $this->indexBase('products','ProductModel','productname','products','index.php?controller=ProductController&action=index&page=');
    }

    public function viewAddProduct()
    {
        $this->viewAdd('product');
    }
    //controller add user
    public function addProduct()
    {
        var_dump($_POST);
        $productname = $_POST['productname'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $activate = $_POST['activate'];
        $image = $_POST['productname'];
        $this->add('products','ProductModel',['productname'=>$productname,'price'=>$price,'description'=>$description,'activate'=>$activate,'image'=>$image]);
        header('Location: index.php?controller=ProductController&action=index&page=1');
    }

    public function handle()
    {
        $this->handleBase('products','ProductModel');
        header('Location:index.php?controller=ProductController&action=index&page=1');
    }

    public function viewEditProduct()
    {
        $this->viewEdit('products','ProductModel','product');
    }

    public function editProduct()
    {
        $productname = $_POST['productname'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $activate = $_POST['activate'];
        date_default_timezone_set('Asia/BangKok');
        $time_updated = date('y-m-d H:i:s');
        $image = $_POST['productname'];

        $this->edit('products','ProductModel',['productname'=>$productname,'price'=>$price,'description'=>$description,'activate'=>$activate,'time_updated'=>$time_updated,'image'=>$image]);
        header('Location:index.php?controller=ProductController&action=index&page=1');
    }
}

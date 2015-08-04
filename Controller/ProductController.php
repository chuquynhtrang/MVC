<?php
require_once 'Model/ProductModel.php';
class ProductController extends BaseController
{
    public function index()
    {
        if(isset($_GET['search']))
            $this->indexBase('products','ProductModel','productname','products','index.php?controller=ProductController&action=index&search='.$_GET['search'].'&page=');
        else
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

    public function sortId()
    {
        if($_GET['order']=='asc')
            $this->sort('products','ProductModel','products','id','index.php?controller=ProductController&action=sortId&order=asc&page=');
        else
            $this->sort('products','ProductModel','products','id','index.php?controller=ProductController&action=sortId&order=desc&page=');
    }

    public function sortProductname()
    {
        if($_GET['order']=='asc')
            $this->sort('products','ProductModel','products','productname','index.php?controller=ProductController&action=sortProductname&order=asc&page=');
        else
            $this->sort('products','ProductModel','products','productname','index.php?controller=ProductController&action=sortProductname&order=desc&page=');
    }

    public function sortActivate()
    {
        if($_GET['order']=='asc')
            $this->sort('products','ProductModel','products','activate','index.php?controller=ProductController&action=sortActivate&order=asc&page=');
        else
            $this->sort('products','ProductModel','products','activate','index.php?controller=ProductController&action=sortActivate&order=desc&page=');
    }

    public function sortTimeCreated()
    {
        if($_GET['order']=='asc')
            $this->sort('products','ProductModel','products','time_created','index.php?controller=ProductController&action=sortTimeCreated&order=asc&page=');
        else
            $this->sort('products','ProductModel','products','time_created','index.php?controller=ProductController&action=sortTimeCreated&order=desc&page=');
    }

    public function sortTimeUpdated()
    {
        if($_GET['order']=='asc')
            $this->sort('products','ProductModel','products','time_updated','index.php?controller=ProductController&action=sortTimeUpdated&order=asc&page=');
        else
            $this->sort('products','ProductModel','products','time_updated','index.php?controller=ProductController&action=sortTimeUpdated&order=desc&page=');
    }
}

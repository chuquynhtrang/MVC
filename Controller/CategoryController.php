<?php
require_once 'Model/CategoryModel.php';
class CategoryController extends BaseController
{
    public function index()
    {
        if(isset($_GET['search'])) {
            $this->indexBase('categories', 'CategoryModel', 'categoryname', 'categories', 'index.php?controller=CategoryController&action=index&search=' . $_GET['search'] . '&page=');
        }
        else {
            $this->indexBase('categories', 'CategoryModel', 'categoryname', 'categories', 'index.php?controller=CategoryController&action=index&page=');
        }
    }

    public function viewAddCategory()
    {
        $this->viewAdd('category');
    }

    public function checkCategoryname($categoryname){
        if(empty($categoryname) || (!preg_match('/^[a-zA-Z0-9 @#$]*$/',$categoryname))){
            return false;
        } else {
            return true;
        }
    }

    //controller add user
    public function addCategory()
    {
        $categoryname = $_POST['categoryname'];
        $activate = $_POST['activate'];
        if(checkCategoryname($categoryname))
            $err = "Wrong name";
        else
            $err = "";
        $this->add('categories','CategoryModel',['categoryname'=>$categoryname,'activate'=>$activate,'err'=>$err]);
        header('Location: index.php?controller=CategoryController&action=index&page=1');
    }

    public function handle()
    {
        $this->handleBase('categories','CategoryModel');
        header('Location:index.php?controller=CategoryController&action=index&page=1');
    }

    public function viewEditCategory()
    {
        $this->viewEdit('categories','CategoryModel','category');
    }

    public function editCategory()
    {
        $categoryname = $_POST['categoryname'];
        $activate = $_POST['activate'];
        date_default_timezone_set('Asia/BangKok');
        $time_updated = date('y-m-d H:i:s');

        $this->edit('categories','CategoryModel',['categoryname'=>$categoryname,'activate'=>$activate,'time_updated'=>$time_updated]);
        header('Location:index.php?controller=CategoryController&action=index&page=1');
    }

    public function sortId()
    {
        if($_GET['order']=='asc')
            $this->sort('categories','CategoryModel','categories','id','index.php?controller=CategoryController&action=sortId&order=asc&page=');
        else
            $this->sort('categories','CategoryModel','categories','id','index.php?controller=CategoryController&action=sortId&order=desc&page=');
    }

    public function sortCategoryname()
    {
        if($_GET['order']=='asc')
            $this->sort('categories','CategoryModel','categories','categoryname','index.php?controller=CategoryController&action=sortCategoryname&order=asc&page=');
        else
            $this->sort('categories','CategoryModel','categories','Categoryname','index.php?controller=CategoryController&action=sortCategoryname&order=desc&page=');
    }

    public function sortActivate()
    {
        if($_GET['order']=='asc')
            $this->sort('categories','CategoryModel','categories','activate','index.php?controller=CategoryController&action=sortActivate&order=asc&page=');
        else
            $this->sort('categories','CategoryModel','categories','activate','index.php?controller=CategoryController&action=sortActivate&order=desc&page=');
    }

    public function sortTimeCreated()
    {
        if($_GET['order']=='asc')
            $this->sort('categories','CategoryModel','categories','time_created','index.php?controller=CategoryController&action=sortTimeCreated&order=asc&page=');
        else
            $this->sort('categories','CategoryModel','categories','time_created','index.php?controller=CategoryController&action=sortTimeCreated&order=desc&page=');
    }

    public function sortTimeUpdated()
    {
        if($_GET['order']=='asc')
            $this->sort('categories','CategoryModel','categories','time_updated','index.php?controller=CategoryController&action=sortTimeUpdated&order=asc&page=');
        else
            $this->sort('categories','CategoryModel','categories','time_updated','index.php?controller=CategoryController&action=sortTimeUpdated&order=desc&page=');
    }
}

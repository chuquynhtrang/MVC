<?php
require_once 'Model/CategoryModel.php';
class CategoryController extends BaseController
{
    public function index()
    {
<<<<<<< HEAD
        if(isset($_GET['search']))
            $this->indexBase('categories','CategoryModel','categoryname','categories',HREFCATEGORY.'&search='.$_GET['search'].'&page=');
        else if(isset($_GET['sort']))
            $this->indexBase('categories','CategoryModel','categoryname','categories',HREFCATEGORY.'&sort='.$_GET['sort'].'&order='.$_GET['order'].'&page=');
        else
            $this->indexBase('categories','CategoryModel','categoryname','categories',HREFCATEGORY.'&page=');
=======
        $this->indexBase('categories', 'CategoryModel', 'categoryname', 'categories', 'index.php?controller=CategoryController&action=index&page=');
>>>>>>> origin/master
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
        $dt['categoryname'] = $_POST['categoryname'];
        $dt['activate'] = $_POST['activate'];
        $this->add('categories','CategoryModel',$dt);
        $md = new CategoryModel('categories');
        $dt = $md->getAll('*');
        $totalRecord = $dt->num_rows;
        $totalPage = ceil($totalRecord/NUMBER_RECORD);
        header('Location:'. HREFCATEGORY.'&page='.$totalPage);
    }

    public function viewEditCategory()
    {
        $this->viewEdit('categories','CategoryModel','category');
    }

    public function editCategory()
    {
<<<<<<< HEAD
        $data = $this->getOldEdit('categories','CategoryModel');
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $dt['categoryname'] = $_POST['categoryname'];
            $dt['activate'] = $_POST['activate'];
            date_default_timezone_set('Asia/BangKok');
            $dt['time_updated'] = date('y-m-d H:i:s');

            $this->edit('categories', 'CategoryModel', $dt);
            header('Location:' . HREFCATEGORY . '&page='.$_SESSION['page']);
        }
        $this->view('edit-category',$data);
=======
        $categoryname = $_POST['categoryname'];
        $activate = $_POST['activate'];
        date_default_timezone_set('Asia/BangKok');
        $time_updated = date('y-m-d H:i:s');

        $this->edit('categories','CategoryModel',['categoryname'=>$categoryname,'activate'=>$activate,'time_updated'=>$time_updated]);
        header('Location:index.php?controller=CategoryController&action=index&page=1');
>>>>>>> origin/master
    }
}

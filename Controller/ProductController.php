<?php
require_once 'Model/ProductModel.php';
require_once 'Model/CategoryModel.php';
class ProductController extends BaseController
{
    public function index()
    {
        if(isset($_GET['category_id'])){
            $category_id = $_GET['category_id'];
            $model = new ProductModel('products');
            $result = $model->filter($category_id);
            $list = array();
            while($row = $result->fetch_assoc()){
                $list[] = $row;
            }
            $this->view('groupby-categories',['list'=>$list]);
        }
        else if(isset($_GET['search']))
            $this->indexBase('products','ProductModel','productname','products',HREFPRODUCT.'&search='.$_GET['search'].'&page=');
        else if(isset($_GET['sort']))
            $this->indexBase('products','ProductModel','productname','products',HREFPRODUCT.'&sort='.$_GET['sort'].'&order='.$_GET['order'].'&page=');
        else {
            $md = new ProductModel('products');
            $dt = $md->getAll('*');
            $page = $_GET['page'];
            $totalRecord = $dt->num_rows;
            $pagination = new Pagination($totalRecord,NUMBER_RECORD,$page);
            $link = $pagination->paginationPanel(HREFPRODUCT.'&page=');
            $offset = $pagination->getOffset();
            $model = new CategoryModel('categories');
            $data = $model->getAll('id,categoryname');
            $list = array();
            while($row = $data->fetch_assoc()){
                $list[] = $row;
            }
            $dt2 = $md->getAllLimit($offset,NUMBER_RECORD);
            $this->view('list-products',['list_products' => $dt2,'link'=>$link,'list'=>$list]);
        }
//        $this->indexBase('products','ProductModel','productname','products',HREFPRODUCT.'&page=');
    }

    public function viewAddProduct()
    {
        $model = new CategoryModel('categories');
        $data = $model->getAll('*');
        $list  = array();
        while($row=$data->fetch_assoc()){
            $list[] = $row;
        }
        $this->viewAdd('product',['list' => $list]);
    }
    //controller add user
    public function addProduct()
    {
        $dt['productname'] = $_POST['productname'];
        $dt['price'] = $_POST['price'];
        $dt['description'] = $_POST['description'];
        $dt['activate'] = $_POST['activate'];
        $dt['image'] = $_POST['productname'];
        $dt['category_id'] = $_POST['category'];
        $this->add('products','ProductModel',$dt);
        $md = new ProductModel('products');
        $dt = $md->getAll('*');
        $totalRecord = $dt->num_rows;
        $totalPage = ceil($totalRecord/NUMBER_RECORD);
        header('Location:'. HREFPRODUCT.'&page='.$totalPage);
    }

    public function editProduct()
    {
        $data = $this->getOldEdit('products','ProductModel');
        $md = new CategoryModel('categories');
        $result = $md->getAll('id,categoryname');
        $list  = array();
        while($row=$result->fetch_assoc()) {
            $list[] = $row;
        }
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $dt['productname'] = $_POST['productname'];
            $dt['price'] = $_POST['price'];
            $dt['description'] = $_POST['description'];
            $dt['activate'] = $_POST['activate'];
            date_default_timezone_set('Asia/BangKok');
            $dt['time_updated'] = date('y-m-d H:i:s');
            $dt['image'] = $_POST['productname'];
            $dt['category_id'] = $_POST['category'];
            $this->edit('products', 'ProductModel', $dt);
            header('Location:' . HREFPRODUCT . '&page='.$_SESSION['page']);
        }
        $this->view('edit-product',['data'=>$data,'list'=>$list]);
    }
}

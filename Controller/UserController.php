<?php
require_once 'Model/UserModel.php';
class UserController extends BaseController
{
    public function index()
    {
        if(isset($_GET['search']))
            $this->indexBase('users','UserModel','username','users','index.php?controller=UserController&action=index&search='.$_GET['search'].'&page=');
        else
            $this->indexBase('users','UserModel','username','users','index.php?controller=UserController&action=index&page=');
    }

    public function viewAddUser()
    {
        $this->viewAdd('user');
    }
    //controller add user
    public function addUser()
    {
        var_dump($_POST);
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $activate = $_POST['activate'];
        $image = $_POST['username'];
        $this->add('users','UserModel',['username'=>$username,'email'=>$email,'password'=>$password,'activate'=>$activate,'image'=>$image]);
        header('Location: index.php?controller=UserController&action=index&page=1');
    }

    public function handle()
    {
        $this->handleBase('users','UserModel');
        header('Location:index.php?controller=UserController&action=index&page=1');
    }

    public function viewEditUser()
    {
        $this->viewEdit('users','UserModel','user');
    }

    public function editUser()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $activate = $_POST['activate'];
        date_default_timezone_set('Asia/BangKok');
        $time_updated = date('y-m-d H:i:s');
        $image = $_POST['username'];

        $this->edit('users','UserModel',['username'=>$username,'email'=>$email,'password'=>$password,'activate'=>$activate,'time_updated'=>$time_updated,'image'=>$image]);
        header('Location:index.php?controller=UserController&action=index&page=1');
    }

    public function sortId()
    {
        if($_GET['order']=='asc')
            $this->sort('users','UserModel','users','id','index.php?controller=UserController&action=sortId&order=asc&page=');
        else
            $this->sort('users','UserModel','users','id','index.php?controller=UserController&action=sortId&order=desc&page=');
    }

    public function sortUsername()
    {
        if($_GET['order']=='asc')
            $this->sort('users','UserModel','users','username','index.php?controller=UserController&action=sortUsername&order=asc&page=');
        else
            $this->sort('users','UserModel','users','username','index.php?controller=UserController&action=sortUsername&order=desc&page=');
    }

    public function sortActivate()
    {
        if($_GET['order']=='asc')
            $this->sort('users','UserModel','users','activate','index.php?controller=UserController&action=sortActivate&order=asc&page=');
        else
            $this->sort('users','UserModel','users','activate','index.php?controller=UserController&action=sortActivate&order=desc&page=');
    }

    public function sortTimeCreated()
    {
        if($_GET['order']=='asc')
            $this->sort('users','UserModel','users','time_created','index.php?controller=UserController&action=sortTimeCreated&order=asc&page=');
        else
            $this->sort('users','UserModel','users','time_created','index.php?controller=UserController&action=sortTimeCreated&order=desc&page=');
    }

    public function sortTimeUpdated()
    {
        if($_GET['order']=='asc')
            $this->sort('users','UserModel','users','time_updated','index.php?controller=UserController&action=sortTimeUpdated&order=asc&page=');
        else
            $this->sort('users','UserModel','users','time_updated','index.php?controller=UserController&action=sortTimeUpdated&order=desc&page=');
    }
}

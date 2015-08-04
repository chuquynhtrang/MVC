<?php
require_once 'Model/UserModel.php';
class UserController extends BaseController
{
    public function index()
    {
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
}

<?php
require_once 'Model/UserModel.php';
class UserController extends BaseController
{
    private $rule = array('username' => array('required','username'),
        'password' => array('required','min','max','password'),
        'email' => array('email'));

    public function index()
    {
<<<<<<< HEAD
        if(isset($_GET['search']))
            $this->indexBase('users','UserModel','username','users',HREFUSER.'&search='.$_GET['search'].'&page=');
        else if(isset($_GET['sort']))
            $this->indexBase('users','UserModel','username','users',HREFUSER.'&sort='.$_GET['sort'].'&order='.$_GET['order'].'&page=');
        else
            $this->indexBase('users','UserModel','username','users',HREFUSER.'&page=');
=======
        $this->indexBase('users','UserModel','username','users','index.php?controller=UserController&action=index&page=');
>>>>>>> origin/master
    }

    public function viewAddUser()
    {
        $this->viewAdd('user');
    }
    //controller add user
    public function addUser()
    {
        $validate = new Validate($this->rule);
        $error = $validate->execute($_POST);
        if(!$error) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $activate = $_POST['activate'];
            $image = $_POST['username'];
            $this->add('users', 'UserModel', ['username' => $username, 'email' => $email, 'password' => $password, 'activate' => $activate, 'image' => $image]);
            $md = new UserModel('users');
            $dt = $md->getAll('*');
            $totalRecord = $dt->num_rows;
            $totalPage = ceil($totalRecord/NUMBER_RECORD);
        header('Location:'. HREFUSER.'&page='.$totalPage);
        } else {
            $this->view('add-user',['error'=>$error]);
        }
    }

    public function editUser()
    {
        $data=$this->getOldEdit('users','UserModel');
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $validate = new Validate($this->rule);
            $error = $validate->execute($_REQUEST);
            if (!$error) {
                $dt['username'] = $_POST['username'];
                $dt['email'] = $_POST['email'];
                $dt['password'] = $_POST['password'];
                $dt['activate'] = $_POST['activate'];
                date_default_timezone_set('Asia/BangKok');
                $dt['time_updated'] = date('y-m-d H:i:s');
                $dt['image'] = $_POST['username'];
                $this->edit('users', 'UserModel', $dt);
                header('Location:' . HREFUSER . '&page='.$_SESSION['page']);
            } else {
                $this->view('edit-user', ['data' => $data, 'error' => $error]);
            }
        } else
            $this->view('edit-user', ['data' => $data]);
    }
<<<<<<< HEAD

=======
>>>>>>> origin/master
}

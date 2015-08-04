<?php
require_once "Model/UserModel.php";
class LoginController extends BaseController
{
    public function __construct()
    {
        $this->checkLogin();
    }

    public function checkLogin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST['submit'])) {
                //var_dump($_POST);
                $username = $_POST['username'];
                $password = $_POST['password'];
                $usermodel = new UserModel('users');
                if ($usermodel->checkLogin($username, $password)) {
                    $_SESSION['username'] = $username;
                    $result = $usermodel->getBy('id', 'username', $username);
                    //var_dump($result);
                    $row = $result->fetch_assoc();
                    $_SESSION['id'] = $row['id'];
                    $this->home();
                } else {
                    $this->login();
                }
            }
        }
    }
    public function home(){
        header('Location: index.php?controller=CategoryController&action=index&page=1');
    }
    public function login()
    {
        $this->view('login');
    }
}
$a = new LoginController();

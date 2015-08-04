<?php
class Bootstrap extends BaseController
{
    private $controller;
    private $action;
    private $parameter=array();
    function __construct()
    {
        if(isset($_GET['controller']) && isset($_GET['action'])){
            $this->controller = $_GET['controller'];
            $this->action = $_GET['action'];
            $this->loadExistingController();
        }else {
            $this->loadDefaultController();
        }
    }

    public function loadDefaultController()
    {
        $this->view('login');
    }

    public function loadExistingController()
    {
        $file = PATHCONTROLLER .$this->controller.'.php';
        require $file;
        $this->controller = new $this->controller;
        $action = $this->action;
        $parameter = $this->parameter;
        $this->controller->$action($parameter);
    }
}
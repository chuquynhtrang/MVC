<?php
class HomeController extends BaseController{
    public function index(){
        $this->view('list-categories');
    }
}
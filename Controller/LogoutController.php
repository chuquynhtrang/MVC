<?php
/**
 * Created by PhpStorm.
 * User: Trang
 * Date: 7/24/2015
 * Time: 1:26 PM
 */
class LogoutController extends BaseController{
    public function logout(){
        $this->view('login');
    }
}
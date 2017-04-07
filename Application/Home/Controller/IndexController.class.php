<?php
namespace Home\Controller;

use Home\Controller\HomeController;



class IndexController extends HomeController {
    // 首页
    public function index(){
        echo login_password_encode('admin');
    }

}
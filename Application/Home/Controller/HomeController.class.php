<?php
namespace Home\Controller;

use Think\Controller;

class HomeController extends Controller{
    // 控制器初始化
    public function _initialize(){
        // 检查用户是否登录
        define('UID',is_login());
        if(!UID){
            // 如果没有登录，则返回登录页面
            $this->redirect('Public/login');
        }
        // 检查是否是系统超级管理员
        define('IS_ROOT',is_administrator(UID));

        // TODO:检查用户权限
    }
}
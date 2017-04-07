<?php
namespace Home\Controller;

use Home\Controller\HomeController;
use User\Api\UserApi;


class IndexController extends HomeController {
    // 首页
    public function index(){
        echo login_password_encode('admin');
    }
    // 用户登录
    public function login(){
        // TODO:测试数据
        $userName = 'admin';
        $passWord = 'admin';
        // TODO:检测用户名类型,邮箱或手机或用户名
        $type = chk_username_type($userName);
        // TODO:检测验证码

        // 调用 User API 接口登录
        $userApi = new UserApi();
        $userApiLoginResult = $userApi->login($userName,$passWord,$type);

    }
}
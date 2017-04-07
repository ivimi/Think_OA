<?php
namespace Home\Controller;

use Think\Controller;
use User\Api\UserApi;

class PublicController extends Controller{

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
        if($userApiLoginResult){
            $this->success('登录成功!',U('Index/index'));
        }else{
            $this->error('登录失败!',U('Index/login'));
        }
    }
}
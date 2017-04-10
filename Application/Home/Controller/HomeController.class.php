<?php
namespace Home\Controller;

use Think\Controller;

class HomeController extends Controller{
    // 控制器初始化
    public function _initialize(){
        // 检查是否为POST请求
        difine('IS_POST',is_post());
        // 检查用户是否登录
        define('UID',is_login());
        if(!UID){
            // 如果没有登录，则返回登录页面
            $this->error('您尚未登录!','',0);
        }
        // 检查是否是系统超级管理员
        define('IS_ROOT',is_administrator(UID));

        // TODO:检查用户权限
        $adminAllowIp = C('ADMIN_ALLOW_IP');
        if(!IS_ROOT && isset($adminAllowIp)){
            // TODO: 开发期间注释，方便测试
/*            if(!in_array(get_client_ip(),$adminAllowIp)){
                $this->error('您所在IP不在允许范围之内');
            }*/
        }
        // 检测访问权限
        $isActionAccess = $this->accessControl();
        if($isActionAccess === FALSE){

        }else if($isActionAccess === NULL){

        }else{
            // ROOT 用户，什么也不做
        }
    }
    /*
     * Action 访问控制
     * @return Boolean|NULL
     *  - return TRUE,允许任何管理员访问
     *  - rerurn FALSE,不允许除了超级管理员以外的人访问
     *  - return NULL,一般用户，仍需检测具体访问节点的权限
     */
    final protected function accessControl(){
        if(IS_ROOT){
            return TRUE;        // 管理员允许访问所有页面
        }
        // TODO: 检测是否禁止或允许访问的模块方法
        return NULL;
    }
}
<?php
namespace User\Api;

use User\Api\Api;
use User\Model\UserModel;

class UserApi extends Api{

    // 构造方法,实例化模型
    protected function _init(){
        $this->model = new UserModel();
    }


    /**
     *  用户登录认证
     *  @param String $userName 用户名
     *  @param String $passWord 用户密码
     *  @param String $type 用户名类型(USERNAME-用户名,EMAIL-邮箱,TELPHONE-联系电话)
     *  @return Integer 登录成功-用户ID，登录失败-错误编码
     */
    public function login($userName,$passWord,$type = 'USERNAME'){
        return $this->model->login($userName,$passWord,$type);
    }

}
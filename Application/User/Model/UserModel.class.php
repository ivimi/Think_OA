<?php
namespace User\Model;

use Think\Model;

class UserModel extends Model{
    // 检测用户名是否被注册或者禁止注册

    // 检测手机号是否被注册或者禁止注册

    // 检测邮箱是否被注册或者禁止注册

    /**
     *  用户登录认证
     *  @param String $userName 用户名
     *  @param String $passWord 用户密码
     *  @param String $type 用户名类型(USERNAME-用户名,EMAIL-邮箱,TELEPHONE-联系电话)
     *  @return Integer 登录成功-用户ID，登录失败-错误编码
     */
    public function login($userName,$passWord,$type = 'USERNAME'){
        $map = array();
        // 检查类型,匹配查询条件
        switch ($type){
            case 'USERNAME':
                $map['username'] = $userName;
                break;
            case 'EMAIL':
                $map['mobile'] = $userName;
                break;
            case 'TELEPHONE':
                $map['email'] = $userName;
                break;
            default:
        }
        // 获取用户数据
        $userResult = $this->where($map)->find();
        if($userResult === TRUE){
            // 校验密码
            if(login_password_encode($passWord) === $userResult['password']){
                return TRUE;
            }
        }
        return FALSE;
    }
}
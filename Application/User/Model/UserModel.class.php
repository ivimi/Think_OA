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
        if(!is_null($userResult)){
            // 校验密码
            if(login_password_encode($passWord) === $userResult['password']){
                // 更新用户登录信息
                $this->updateLogin($userResult);
                return TRUE;
            }
        }
        return FALSE;
    }

    /**
     * 更新用户登录信息
     * @param Integer $userInfo 用户信息
     */
    protected function updateLogin($userInfo){
        // 更新用户登录信息
        $saveData = array(
            'id'                    =>  $userInfo['uid'],
            'last_login_time'      =>   time(),
            'last_login_ip'         =>  get_client_ip(1),
        );
        $this->save();
        // TODO:记录用户登录日志

        // 通过 Session 保存用户状态
        $curLoginUserInfo = array(
            'uid'       =>  $userInfo['uid'],
            'username'  =>  $userInfo['username'],
            'last_login_time'   =>  $userInfo['last_login_time'],
        );
        session('user_auth',$curLoginUserInfo);
    }
}
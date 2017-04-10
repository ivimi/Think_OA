<?php
/**
 * 通用函数库
 * @author 近之<admin@ivim.vip>
 */

/**
 * 检测用户名类型
 * @param $userName 用户名
 * @return String USERNAME-用户名,TELEPHONE-联系电话,EMAIL-邮箱
 */
function chk_username_type($userName){
    $typeList = array('USERNAME','TELEPHONE','EMAIL');      // 用户名类型
    // 使用正则验证用户名类型
    return $typeList[0];
}

/**
 * 登录密码加密
 * @param $passWord 登录密码
 * @return String|Boolean 如果成功,返回加密过后的密码，否则返回 FALSE
 */
function login_password_encode($passWord){
    return md5(md5($passWord));
}

/**
 * 获取当前登录用户ID
 * @return Integer|Boolean 如果登录成功则返回用户ID,否则返回 FALSE
 */
function is_login(){
    $userInfo = session('user_auth');
    if(empty($user)){
        return FALSE;
    }else{
        return $userInfo['uid'];
    }
}

/**
 * 检查是否为 POST 请求'
 * @return Boolean 如果为 POST 请求,返回 TRUE,否则返回FALSE
 */
function is_post(){
    if(I('post.')) {
        return TRUE;
    }
    return FALSE;
}

/**
 * 检查是否是超级管理员
 * @param Integer $uid 用户ID
 * @return Boolean TRUE/FALSE
 */
function is_administrator($uid = NULL){
    if(is_null($uid)){
        $uid = is_login();
    }
    return $uid && (intval($uid) === C('USER_ADMINISTRATOR'));
}
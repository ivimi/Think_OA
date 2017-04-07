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
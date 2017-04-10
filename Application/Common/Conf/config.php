<?php
return array(
    // 数据库配置

    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'oa',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'oa_',    // 数据库表前缀
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号
    'DB_SQL_BUILD_CACHE'    =>  false, // 数据库查询的SQL创建缓存 3.2.3版本废弃
    'DB_SQL_BUILD_QUEUE'    =>  'file',   // SQL缓存队列的缓存方式 支持 file xcache和apc 3.2.3版本废弃
    'DB_BIND_PARAM'         =>  false, // 数据库写入数据自动参数绑定
    'DB_DEBUG'              =>  false,  // 数据库调试模式 3.2.3新增
    'DB_LITE'               =>  false,  // 数据库Lite模式 3.2.3新增

    // 业务配置

    'USER_ADMINISTRATOR'    =>  1,          // 系统超级管理员用户ID
    // 允许登录后台的IP
    'ADMIN_ALLOW_IP'        =>  array(),
    // 禁止登录后台的IP
    'ADMIN_DENY_IP'         => array(),
    // 允许登录后台的用户
    'ADMIN_ALLOW_USER'      => array(),
    // 禁止登录后台的用户
    'ADMIN_ALLOW_USER'      => array(),
);
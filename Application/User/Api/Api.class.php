<?php
namespace User\Api;
// 定义目录
// 载入配置文件
// 载入函数库文件

abstract class Api{
    protected $model;           // Api 调用模型实例

    // 构造方法
    public function __construct(){
        // 检测相关配置

        $this->_init();
    }
    // 抽象方法，用于设置模型实例
    abstract protected function _init();
}
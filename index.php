<?php
/**
 * Created by PhpStorm.
 * User: a1056
 * Date: 2016/5/18
 * Time: 12:56
 */
//开启调试模式
define ('APP_DEBUG', true);
define ('SHOW_PAGE_TRACE', true);

//定义运行时目录
define('APP_PATH', './Apps/');
//定义运行时目录
define('RUNTIME_PATH', './Runtime/');

//载入框架文件
require './ThinkPHP/ThinkPHP.php';
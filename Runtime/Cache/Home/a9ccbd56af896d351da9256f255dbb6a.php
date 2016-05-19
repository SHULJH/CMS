<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/CMS/Public/css/bootstrap.min.css">
    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <link rel="stylesheet" href="/CMS/Public/css/bootstrap-theme.min.css">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="/CMS/Public/js/jquery-1.12.3.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="/CMS/Public/js/bootstrap.min.js"></script>
</head>
<body>
<div>
    <p>个人信息显示</p>
    <p>学号:<?php echo ($person_info['xh']); ?></p>
    <p>姓名:<?php echo ($person_info['xm']); ?></p>
    <p>性别:<?php echo ($person_info['xb']); ?></p>
    <p>出生日期:<?php echo ($person_info['csrq']); ?></p>
    <p>籍贯:<?php echo ($person_info['jg']); ?></p>
    <p>联系方式:<?php echo ($person_info['sjhm']); ?></p>
    <p>院系号:<?php echo ($person_info['yxh']); ?></p>
    <p>绩点:<?php echo ($person_info['score']); ?></p>
    <p>院名:<?php echo ($person_info['mc']); ?></p>
</div>
</body>
</html>
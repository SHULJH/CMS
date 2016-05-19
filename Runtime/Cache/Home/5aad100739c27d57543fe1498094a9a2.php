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
    <p>课程信息显示</p>
    <p>课号:<?php echo ($course_info['kh']); ?></p>
    <p>课程名称:<?php echo ($course_info['km']); ?></p>
    <p>学期:<?php echo ($course_info['xq']); ?></p>
    <p>上课时间:<?php echo ($course_info['sksj']); ?></p>
    <p>平时成绩:<?php echo ($course_info['pscj']); ?></p>
    <p>考试成绩:<?php echo ($course_info['kscj']); ?></p>
    <p>总评成绩:<?php echo ($course_info['zpcj']); ?></p>
</div>
</body>
</html>
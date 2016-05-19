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
<table class="table">
    <caption>选择该课程的学生有:</caption>
    <p>课程容量为<?php echo ($container); ?>, 超过选课容量将红色标识, 学生按照绩点排序</p>
    <thead>
    <tr>
        <th>学号</th>
        <th>姓名</th>
        <th>学生绩点</th>
    </tr>
    </thead>
    <tbody>
    <?php
 for($i=0; $i<$count; $i++){ $active = ($i >= $container)?'danger':'success'; ?>
    <tr class=<?php echo ($active); ?>>
        <td><?php echo ($result[$i]['xh']); ?></td>
        <td><?php echo ($result[$i]['xm']); ?></td>
        <td><?php echo ($result[$i]['score']); ?></td>
    </tr>
    <?php
 } ?>
    </tbody>
</table>
</body>
</html>
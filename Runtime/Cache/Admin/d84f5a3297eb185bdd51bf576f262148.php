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
    <caption>现有学生列表</caption>
    <thead>
    <tr>
        <th>学号</th>
        <th>学生姓名</th>
        <th>学生性别</th>
        <th>学生出生日期</th>
        <th>学生籍贯</th>
        <th>学生联系方式</th>
        <th>学生绩点</th>
    </tr>
    </thead>
    <tbody>
    <?php
 for($i=0; $i<$count; $i++){ ?>
    <tr>
        <td><?php echo ($result[$i]['xh']); ?></td>
        <td><?php echo ($result[$i]['xm']); ?></td>
        <td><?php echo ($result[$i]['xb']); ?></td>
        <td><?php echo ($result[$i]['csrq']); ?></td>
        <td><?php echo ($result[$i]['jg']); ?></td>
        <td><?php echo ($result[$i]['sjhm']); ?></td>
        <td><?php echo ($result[$i]['score']); ?></td>
        <td><a href="<?php echo U('Index/stu_edit', array('m_xh'=>$result[$i]['xh']));?>">修改</a></td>
        <td><a href="<?php echo U('Index/stu_delete', array('m_xh'=>$result[$i]['xh']));?>">删除</a></td>
    </tr>
    <?php
 } ?>
    </tbody>
</table>
</body>
</html>
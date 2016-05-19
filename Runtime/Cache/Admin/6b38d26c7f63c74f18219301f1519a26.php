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
    <caption>现有教师列表</caption>
    <thead>
        <tr>
            <th>教师号</th>
            <th>教师姓名</th>
            <th>教师性别</th>
            <th>教师出生日期</th>
            <th>教师学历</th>
            <th>教师所在院系</th>
        </tr>
    </thead>
    <tbody>
        <?php
 for($i=0; $i<$count; $i++){ ?>
            <tr>
                <td><?php echo ($result[$i]['gh']); ?></td>
                <td><?php echo ($result[$i]['xm']); ?></td>
                <td><?php echo ($result[$i]['xb']); ?></td>
                <td><?php echo ($result[$i]['csrq']); ?></td>
                <td><?php echo ($result[$i]['xl']); ?></td>
                <td><?php echo ($result[$i]['mc']); ?></td>
                <td><a href="<?php echo U('Index/tea_edit', array('m_gh'=>$result[$i]['gh']));?>">修改</a></td>
                <td><a href="<?php echo U('Index/tea_delete', array('m_gh'=>$result[$i]['gh']));?>">删除</a></td>
            </tr>
        <?php
 } ?>
    </tbody>
</table>
</body>
</html>
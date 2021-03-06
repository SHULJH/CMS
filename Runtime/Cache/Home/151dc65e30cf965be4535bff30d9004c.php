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
        <caption>选择您<?php echo ($km); ?>课程的学生有:</caption>
        <p>课程容量为<?php echo ($container); ?>, 超过选课容量将红色标识, 学生按照绩点排序</p>
        <thead>
        <tr>
            <th>学号</th>
            <th>姓名</th>
            <th>平时成绩</th>
            <th>考试成绩</th>
            <th>总评成绩</th>
            <th>学生绩点</th>
        </tr>
        </thead>
        <tbody>
        <?php
 for($i=0; $i<$count; $i++){ $active = ($i >= $container)?'danger':'success'; ?>
        <tr class=<?php echo ($active); ?>>
            <td><?php echo ($result[$i]['xh']); ?></td>
            <td><?php echo ($result[$i]['xm']); ?></td>
            <td><?php echo ($result[$i]['pscj']); ?></td>
            <td><?php echo ($result[$i]['kscj']); ?></td>
            <td><?php echo ($result[$i]['zpcj']); ?></td>
            <td><?php echo ($result[$i]['score']); ?></td>
            <td><a href="<?php echo U('Tea/course_stu_edit', array('m_xh'=>$result[$i]['xh'], 'm_xm'=>$result[$i]['xm'], 'm_pscj'=>$result[$i]['pscj'], 'm_kscj'=>$result[$i]['kscj'], 'm_zpcj'=>$result[$i]['zpcj'], 'm_score'=>$result[$i]['score'], 'm_xq'=>$result[$i]['xq'], 'm_kh'=>$result[$i]['kh']));?>">修改</a></td>
            <td><a href="<?php echo U('Tea/course_stu_delete', array('m_xq'=>$result[$i]['xq'], 'm_kh'=>$result[$i]['kh'], 'm_xh'=>$result[$i]['xh']));?>">删除</a></td>
        </tr>
        <?php
 } ?>
        </tbody>
    </table>
</body>
</html>
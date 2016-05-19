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
<form action="/CMS/index.php/Home/Stu/select_course" method="post">
    <select name="m_date" id="m_date">
        <option>2012-2013冬季</option>
        <option>2012-2013秋季</option>
        <option>2013-2014冬季</option>
        <option>2013-2014秋季</option>
        <option>查看全部</option>
    </select>
    <button type="submit" class="btn">选择</button>
</form>

<h3>当前选择学期为:<?php echo ($select_date); ?></h3>

<table class="table">
    <caption>选课列表，点开进入详细选课信息</caption>
    <thead>
    <tr>
        <th>开课学期</th>
        <th>开课编号</th>
        <th>开课名称</th>
        <th>开课时间</th>
        <th>开课学分</th>
    </tr>
    </thead>
    <tbody>
    <?php
 for($i=0; $i<$count; $i++){ ?>
    <tr>
        <td><?php echo ($result[$i]['xq']); ?></td>
        <td><?php echo ($result[$i]['kh']); ?></td>
        <td><?php echo ($result[$i]['km']); ?></td>
        <td><?php echo ($result[$i]['sksj']); ?></td>
        <td><?php echo ($result[$i]['xf']); ?></td>
        <td><a href="<?php echo U('course_info', array('m_xq'=>$result[$i]['xq'], 'm_kh'=>$result[$i]['kh'], 'm_gh'=>$result[$i]['gh']));?>">课程详细</a></td>
    </tr>
    <?php
 } ?>
    </tbody>
</table>

</body>
</html>
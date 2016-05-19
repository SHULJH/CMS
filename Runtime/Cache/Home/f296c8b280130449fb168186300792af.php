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
    <p>您已选学分<?php echo ($xuefen); ?></p>
    <caption>本学期为2013-2014冬季学期,每人限选10学分，超出将选课失败</caption>
    <thead>
    <tr>
        <th>学期</th>
        <th>课号</th>
        <th>课程名称</th>
        <th>上课时间</th>
        <th>容量</th>
        <th>学分</th>
    </tr>
    </thead>
    <tbody>
    <?php
 for($i=0; $i<$count; $i++){ $bool = false; for($t=0; $t<$already_count; $t++){ if($result[$i]['xq'] == $already_select[$t]['xq'] && $result[$i]['kh'] == $already_select[$t]['kh'] && $result[$i]['gh'] == $already_select[$t]['gh']){ $bool = true; break; } } $danger = ($bool)? 'danger': 'success'; ?>
    <tr class=<?php echo ($danger); ?>>
        <td><?php echo ($result[$i]['xq']); ?></td>
        <td><?php echo ($result[$i]['kh']); ?></td>
        <td><?php echo ($result[$i]['km']); ?></td>
        <td><?php echo ($result[$i]['sksj']); ?></td>
        <td><?php echo ($result[$i]['container']); ?></td>
        <td><?php echo ($result[$i]['xf']); ?></td>
        <td><a class=<?php echo ($danger); ?> href="<?php echo U('get_course_check', array('m_xq'=>$result[$i]['xq'], 'm_kh'=>$result[$i]['kh'], 'm_gh'=>$result[$i]['gh'], 'm_xf'=>$result[$i]['xf'], 'm_sksj'=>$result[$i]['sksj']));?>">选课</a></td>
        <td><a href="<?php echo U('get_course_stu', array('m_xq'=>$result[$i]['xq'], 'm_kh'=>$result[$i]['kh'], 'm_gh'=>$result[$i]['gh']));?>">查看</a></td>
    </tr>
    <?php
 } ?>
    </tbody>
</table>

<table class="table">
    <caption>2013-2014冬季学期已选课程</caption>
    <thead>
    <tr>
        <th>学期</th>
        <th>课号</th>
        <th>课程名称</th>
        <th>上课时间</th>
        <th>容量</th>
        <th>学分</th>
    </tr>
    </thead>
    <tbody>
    <?php
 for($i=0; $i<$already_count; $i++){ ?>
    <tr>
        <td><?php echo ($already_select[$i]['xq']); ?></td>
        <td><?php echo ($already_select[$i]['kh']); ?></td>
        <td><?php echo ($already_select[$i]['km']); ?></td>
        <td><?php echo ($already_select[$i]['sksj']); ?></td>
        <td><?php echo ($already_select[$i]['container']); ?></td>
        <td><?php echo ($already_select[$i]['xf']); ?></td>
        <td><a href="<?php echo U('delete_course', array('m_xq'=>$already_select[$i]['xq'], 'm_kh'=>$already_select[$i]['kh'], 'm_gh'=>$already_select[$i]['gh']));?>">退课</a></td>
    </tr>
    <?php
 } ?>
    </tbody>
</table>

<table class="table">
    <caption>2013-2014年度冬季学期课程表</caption>
    <thead>
    <tr>
        <th>星期一</th>
        <th>星期二</th>
        <th>星期三</th>
        <th>星期四</th>
        <th>星期五</th>
    </tr>
    </thead>
    <tbody>
    <?php
 for($i=0; $i<13; $i++){ ?>
    <tr>
        <?php
 for($j=0; $j<5; $j++){ $string = ($map[$j][$i]=='')? '\\': $map[$j][$i]; ?>
             <td><?php echo ($string); ?></td>
        <?php
 } ?>
    </tr>
    <?php
 } ?>
    </tbody>
</table>
<script>
    $(function(){
        $("a.danger").removeAttr("href");
        $("a.danger").css("color", "#fff");
    })
</script>
</body>
</html>
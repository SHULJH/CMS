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
    <!--checkForm可以写表单验证，对输入的成绩进行验证匹配-->


</head>
<body>
    <form role="form" action="/CMS/index.php/Home/Tea/course_stu_update" method="post" class="login-form" onsubmit="return checkForm();">
        <div class="form-group">
            <!--sr-only仅供屏幕阅读器-->
            <label class="" for="xh">(学号：<?php echo ($m_xh); ?>)</label>
            <input type="hidden" name="xh" id="xh" value=<?php echo ($m_xh); ?>>
        </div>
        <div class="form-group">
            <!--sr-only仅供屏幕阅读器-->
            <label class="" for="xm">(姓名：<?php echo ($m_xm); ?>)</label>
            <input type="hidden" name="xm" id="xm" value=<?php echo ($m_xm); ?>>
        </div>
        <div class="form-group">
            <!--sr-only仅供屏幕阅读器-->
            <label class="" for="score">(绩点：<?php echo ($m_score); ?>)</label>
            <input type="hidden" name="score" id="score" value=<?php echo ($m_score); ?>>
        </div>
        <div class="form-group">
            <!--sr-only仅供屏幕阅读器-->
            <label class="" for="xq">(学期：<?php echo ($m_xq); ?>)</label>
            <input type="hidden" name="xq" id="xq" value=<?php echo ($m_xq); ?>>
        </div>
        <div class="form-group">
            <!--sr-only仅供屏幕阅读器-->
            <label class="" for="kh">(课号：<?php echo ($m_kh); ?>)</label>
            <input type="hidden" name="kh" id="kh" value=<?php echo ($m_kh); ?>>
        </div>
        <div class="form-group">
            <!--sr-only仅供屏幕阅读器-->
            <label class="" for="pscj">平时成绩(原平时成绩为：<?php echo ($m_pscj); ?>)</label>
            <input type="text" name="pscj" placeholder="请输入平时成绩" class="form-username form-control" id="pscj">
        </div>
        <div class="form-group">
            <!--sr-only仅供屏幕阅读器-->
            <label class="" for="kscj">考试成绩(原考试成绩为：<?php echo ($m_kscj); ?>)</label>
            <input type="password" name="kscj" placeholder="请输入考试成绩" class="form-password form-control" id="kscj">
        </div>
        <div class="form-group">
            <!--sr-only仅供屏幕阅读器-->
            <label class="" for="zpcj">总评成绩(原总评成绩为：<?php echo ($m_zpcj); ?>)</label>
            <input type="password" name="zpcj" placeholder="请输入总评成绩" class="form-password form-control" id="zpcj">
        </div>
        <button type="submit" class="btn">确认修改</button>
    </form>
</body>
</html>
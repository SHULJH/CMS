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
    <!--checkForm可以写表单验证，对输入的各项数据进行验证匹配-->


</head>
<body>
<form role="form" action="/CMS/index.php/Admin/Index/stu_update" method="post" class="login-form" onsubmit="return checkForm();">
    <div class="form-group">
        <!--sr-only仅供屏幕阅读器-->
        <label class="" for="xh">(学号：<?php echo ($result['xh']); ?>)</label>
        <input type="hidden" name="xh" id="xh" value=<?php echo ($result['xh']); ?>>
    </div>
    <div class="form-group">
        <!--sr-only仅供屏幕阅读器-->
        <label class="" for="xm">(姓名：<?php echo ($result['xm']); ?>)</label>
        <input type="hidden" name="xm" id="xm" value=<?php echo ($result['xm']); ?>>
    </div>
    <div class="form-group">
        <!--sr-only仅供屏幕阅读器-->
        <label class="" for="jg">籍贯(原籍贯为：<?php echo ($result['jg']); ?>)</label>
        <input type="text" name="jg" placeholder="请输入籍贯" class="form-username form-control" id="jg">
    </div>
    <div class="form-group">
        <!--sr-only仅供屏幕阅读器-->
        <label class="" for="sjhm">联系电话(原联系电话为：<?php echo ($result['sjhm']); ?>)</label>
        <input type="text" name="sjhm" placeholder="请输入联系电话" class="form-password form-control" id="sjhm">
    </div>
    <div class="form-group">
        <!--sr-only仅供屏幕阅读器-->
        <label class="" for="score">绩点(原绩点为：<?php echo ($result['score']); ?>)</label>
        <input type="text" name="score" placeholder="请输入绩点" class="form-password form-control" id="score">
    </div>

    <button type="submit" class="btn">确认修改</button>
</form>
</body>
</html>
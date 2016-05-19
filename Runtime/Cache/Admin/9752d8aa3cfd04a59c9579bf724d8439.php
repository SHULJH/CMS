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
<form role="form" action="/CMS/index.php/Admin/Index/tea_update" method="post" class="login-form" onsubmit="return checkForm();">
    <div class="form-group">
        <!--sr-only仅供屏幕阅读器-->
        <label class="" for="gh">(工号：<?php echo ($result['gh']); ?>)</label>
        <input type="hidden" name="gh" id="gh" value=<?php echo ($result['gh']); ?>>
    </div>
    <div class="form-group">
        <!--sr-only仅供屏幕阅读器-->
        <label class="" for="xm">(姓名：<?php echo ($result['xm']); ?>)</label>
        <input type="hidden" name="xm" id="xm" value=<?php echo ($result['xm']); ?>>
    </div>
    <div class="form-group">
        <!--sr-only仅供屏幕阅读器-->
        <label class="" for="jbgz">基本工资(原基本工资为：<?php echo ($result['jbgz']); ?>)</label>
        <input type="text" name="jbgz" placeholder="请输入基本工资" class="form-username form-control" id="jbgz">
    </div>
    <div class="form-group">
        <!--sr-only仅供屏幕阅读器-->
        <label class="" for="xl">学历(原学历为：<?php echo ($result['xl']); ?>)</label>
        <input type="text" name="xl" placeholder="请输入学历" class="form-password form-control" id="xl">
    </div>
    <div class="form-group">
        <!--sr-only仅供屏幕阅读器-->
        <label class="" for="dz">地址(原地址为：<?php echo ($result['dz']); ?>)</label>
        <input type="text" name="dz" placeholder="请输入地址" class="form-password form-control" id="dz">
    </div>
    <!--<div class="form-group">-->
        <!--&lt;!&ndash;sr-only仅供屏幕阅读器&ndash;&gt;-->
        <!--<label class="" for="lxdh">联系电话(原联系电话为：<?php echo ($result['lxdh']); ?>)</label>-->
        <!--<input type="password" name="lxdh" placeholder="请输入联系电话" class="form-password form-control" id="lxdh">-->
    <!--</div>-->
    <button type="submit" class="btn">确认修改</button>
</form>
</body>
</html>
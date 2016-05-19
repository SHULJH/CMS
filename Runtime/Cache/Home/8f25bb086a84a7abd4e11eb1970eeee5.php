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

    <script type="text/javascript">
        window.onload=function(){
            $("#old_password").focus();
        }
        function checkForm(){
            if($("#old_password").val() == ""){
                alert('原密码不能为空！！');
                $("#old_password").focus();
                return false;
            }
            if($("#new_password").val() == ""){
                alert('新密码不能为空！！');
                $("#new_password").focus();
                return false;
            }
            if($("#new_password_check").val() == ""){
                alert('请确认填写确认密码！！');
                $("#new_password_check").focus();
                return false;
            }
            if($("#new_password_check").val() != $("#new_password").val()){
                alert('新密码两次输入不一致，请确认');
                return false;
            }
        }
    </script>

</head>
<body>
<form role="form" action="/CMS/index.php/Home/Stu/update_password" method="post" class="login-form" onsubmit="return checkForm();">
    <div class="form-group">
        <!--sr-only仅供屏幕阅读器-->
        <label class="" for="old_password">原密码</label>
        <input type="text" name="old_password" placeholder="请输入原密码" class="form-username form-control" id="old_password">
    </div>
    <div class="form-group">
        <!--sr-only仅供屏幕阅读器-->
        <label class="" for="new_password">新密码</label>
        <input type="password" name="new_password" placeholder="请输入新密码" class="form-password form-control" id="new_password">
    </div>
    <div class="form-group">
        <!--sr-only仅供屏幕阅读器-->
        <label class="" for="new_password_check">确认新密码</label>
        <input type="password" name="new_password_check" placeholder="请再次输入新密码" class="form-password form-control" id="new_password_check">
    </div>
    <button type="submit" class="btn">确认修改</button>
</form>
</body>
</html>
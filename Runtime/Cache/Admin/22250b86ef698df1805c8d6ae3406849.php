<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录界面</title>

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
            $("#username").focus();
        }
        function checkForm(){
            if($("#username").val() == ""){
                alert('用户名不能为空！！');
                $("#username").focus();
                return false;
            }
            if($("#password").val() == ""){
                alert('密码不能为空！！');
                $("#username").focus();
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="top-content">

        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>后台登录</h3>
                                <p>请输入管理员账户密码：</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-key"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="/CMS/index.php/Admin/Index/check_login" method="post" class="login-form" onsubmit="return checkForm();">
                                <div class="form-group">
                                    <!--sr-only仅供屏幕阅读器-->
                                    <label class="" for="username">用户名</label>
                                    <input type="text" name="username" placeholder="请输入用户名" class="form-username form-control" id="username">
                                </div>
                                <div class="form-group">
                                    <!--sr-only仅供屏幕阅读器-->
                                    <label class="" for="password">密码</label>
                                    <input type="password" name="password" placeholder="请输入密码" class="form-password form-control" id="password">
                                </div>
                                <button type="submit" class="btn">登录</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理CMS</title>

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
<nav class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">后台管理平台</a>
    </div>
    <div>
        <p class="navbar-text navbar-left">管理员：
            <a href="#" class="navbar-link"><?php echo ($manager['username']); ?></a>
        </p>
        <p class="navbar-text navbar-left">
            <a href="/CMS/index.php/Admin/Index/logout" class="navbar-link">注销</a>
        </p>
    </div>
</nav>

<div class="row">
    <div class="col-xs-2">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion"
                           href="#collapseOne">
                            教师信息
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <a href="/CMS/index.php/Admin/Index/tea_info" target="frameBord">教师查看</a>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion"
                           href="#collapseTwo">
                            学生信息
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <a href="/CMS/index.php/Admin/Index/stu_info" target="frameBord">学生查看</a>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion"
                           href="#collapseThree">
                            设置
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        <a href="/CMS/index.php/Admin/Index/edit_password" target="frameBord">修改密码</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-9" style="height:600px">
        <iframe id="frameBord" name="frameBord" frameborder="0" width="100%" height="100%" src="">
        </iframe>
    </div>
</div>

</body>
</html>
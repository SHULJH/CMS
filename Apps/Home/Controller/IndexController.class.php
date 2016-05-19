<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    //跳转到login
    public function index(){
        $url = U('login');
        header("Location:$url");
    }

    //渲染
    public function login(){
        $this->display();
    }
    
    //判断登录以及教师和学生
    public function check_login(){
        $type = $_POST['type'];
        if($type == 'stu'){
            //获取数据表
            $user=M("S");
           // var_dump($_POST);
            $where['xh'] = $_POST['username'];
            $us=$user->where($where)->find();

            //没有结果说明用户名错误
            if(!$us){
                $this->error("用户名或者密码错误！！");
            }
            //判断密码是否正确
            if($us['stu_pwd']!=$_POST['password']){
                $this->error("用户名或者密码错误！！");
            }

            //保存到session中
            session('username', $us['xh']);

            //定向到Stu中的index这个action
           $this->redirect("Stu/index");
        }else{
            //获取数据表
            $user=M("T");
            // var_dump($_POST);
            $where['gh'] = $_POST['username'];
            $us=$user->where($where)->find();

            //没有结果说明用户名错误
            if(!$us){
                $this->error("用户名或者密码错误！！");
            }
            //判断密码是否正确
            if($us['tea_pwd']!=$_POST['password']){
                $this->error("用户名或者密码错误！！");
            }

            //保存到session中
            session('username', $us['gh']);

            $this->redirect('Tea/index');
        }
    }
}
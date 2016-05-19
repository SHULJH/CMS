<?php
namespace Admin\Controller;
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

    //判断session是否过期，直接访问可以通过单入口解决
    function check_logined(){
        $user=M('Admin');
        $now_user = session('username');
        $where['username']=$now_user;
        $us=$user->where($where)->find();
        if(!$us){
            $this->error("请登录", 'login');
        }
    }

    //判断登录
    public function check_login(){
        //获取数据表
        $user=M("Admin");
        //var_dump($_POST);

        //根据表的属性，通过_POST传的值生成对象
        if(!$data=$user->create()){
            $this->error("登录失败");
        }

        /*
         * SQL查询，查询语句类似select * from cms_admin where username=$data['username']
         *find 仅仅返回一条语句
         */
        $where['username']=$data['username'];
        $us=$user->where($where)->find();

        //没有结果说明用户名错误
        if(!$us){ $this->error("用户名或者密码错误！！");}
        //判断密码是否正确
        if($us['password']!=$data['password']){
            $this->error("用户名或者密码错误！！");
        }

        //保存到session中
        session('username', $data['username']);

        $this->success("登录成功", 'entry_index');
    }

    //进入后台首页
    public function entry_index(){
        $this->check_logined();
        $user = M('Admin');
        $where['username'] = session('username');
        $result = $user->where($where)->find();
        $this->assign('manager', $result);
        $this->display('index');
    }

    //注销
    public function logout(){
        $this->check_logined();
        session(null);
        $this->success("注销成功", "login", 3);
    }

    //-----------------------------------教师查看模块--------------------------
    public function tea_info(){
        $this->check_logined();

        $user = M('T');
        $result = $user->join('cms_d on cms_t.yxh = cms_d.yxh')->select();
        $this->assign('result', $result);
        //var_dump($result);
        $count = sizeof($result);
        $this->assign('count', $count);

        $this->display();
    }

    public function tea_edit(){
        $this->check_logined();

        $m_gh = I('m_gh');
        $user = M('T');
        $where['gh'] = $m_gh;
        $result = $user->where($where)->join('cms_d on cms_t.yxh = cms_d.yxh')->find();
//        var_dump($result);
        $this->assign('result', $result);

        $this->display();
    }

    public function tea_update(){
        $this->check_logined();
        $m_gh = $_POST['gh'];
        $where['gh'] = $m_gh;
        if($_POST['jbgz'] != ''){
            $data['jbgz'] = $_POST['jbgz'];
        }
        if($_POST['xl'] != ''){
            $data['xl'] = $_POST['xl'];
        }
        if($_POST['dz'] != '') {
            $data['dz'] = $_POST['dz'];
        }
        //echo $_POST['gh'];
        //if($_POST['lxdh'] != '') $data['lxdh'] = $_POST['lxdh'];
        
        $user = M('T');
        if(!$user->where($where)->save($data)) $this->error("修改失败");
        $this->success("修改成功");
    }

    public function tea_delete(){
        $this->check_logined();

        $m_gh = I('m_gh');

        $cms_e = M('E');
        $cms_o = M('O');
        $cms_t = M('T');
        $where['gh'] = $m_gh;
        if(!$cms_e->where($where)->delete()) $this->error('删除失败');
        if(!$cms_o->where($where)->delete()) $this->error('删除失败');
        if(!$cms_t->where($where)->delete()) $this->error('删除失败');
        $this->success('删除成功');
    }

    //-----------------------------------教师查看模块----------------------------

    //-----------------------------------学生查看模块---------------------------
    public function stu_info(){
        $this->check_logined();

        $user = M('S');
        $result = $user->select();
        $this->assign('result', $result);
        //var_dump($result);
        $count = sizeof($result);
        $this->assign('count', $count);

        $this->display();
    }

    public function stu_edit(){
        $this->check_logined();

        $m_xh = I('m_xh');
        $user = M('S');
        $where['xh'] = $m_xh;
        $result = $user->where($where)->find();
       // var_dump($result);
        $this->assign('result', $result);

        $this->display();
    }

    public function stu_update(){
        $this->check_logined();
        $m_xh = $_POST['xh'];
        $where['xh'] = $m_xh;
        if($_POST['jg'] != ''){
            $data['jg'] = $_POST['jg'];
        }
        if($_POST['sjhm'] != ''){
            $data['sjhm'] = $_POST['sjhm'];
        }
        if($_POST['score'] != '') {
            $data['score'] = $_POST['score'];
        }
        //echo $_POST['gh'];
        //if($_POST['lxdh'] != '') $data['lxdh'] = $_POST['lxdh'];

        $user = M('S');
        if(!$user->where($where)->save($data)) $this->error("修改失败");
        $this->success("修改成功");
    }

    public function stu_delete(){
        $this->check_logined();

        $m_xh = I('m_xh');

        $cms_e = M('E');
        $cms_s = M('S');
        $where['xh'] = $m_xh;
        if(!$cms_e->where($where)->delete()) $this->error('删除失败');
        if(!$cms_s->where($where)->delete()) $this->error('删除失败');
        $this->success('删除成功');
    }
    //-----------------------------------学生查看模块---------------------------

    //-----------------------------------设置模块---------------------------
    public function edit_password(){
        $this->check_logined();
        $this->display();
    }

    public function update_password(){
        $this->check_logined();
        $user = M('Admin');
        $where['username'] = session('username');
        $result = $user->where($where)->find();
        if($result['password'] != $_POST['old_password']){
            $this->error("原密码错误");
        }else{
            $data['password'] = $_POST['new_password'];
            if(!$user->where($where)->save($data)) $this->error("修改失败");
            $this->success("密码修改成功");
        }
    }

    //-----------------------------------设置模块----------------------------
}
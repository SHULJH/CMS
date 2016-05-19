<?php
/**
 * Created by PhpStorm.
 * User: a1056
 * Date: 2016/5/18
 * Time: 21:14
 */

namespace Home\Controller;


use Think\Controller;

class TeaController extends Controller
{
    //判断session是否过期，直接访问可以通过单入口解决
    public function check_logined(){
        $user=M('T');
        $now_user = session('username');
        $where['gh']=$now_user;
        $us=$user->where($where)->find();
        if(!$us){
            $this->redirect('Index/login');
        }
    }

    //教师管理首页
    public function index(){
        $this->check_logined();
        $user = M('T');
        $where['gh'] = session('username');
        $result = $user->where($where)->find();
        $this->assign('tea', $result);
        $this->display('index');
    }

    //---------------------------修改密码操作---------------------------------
    //注销
    public function logout(){
        $this->check_logined();
        session(null);
        $this->success("注销成功", "Index/login", 3);
    }

    //修改登录密码界面
    public function edit_password(){
        $this->check_logined();
        $this->display();
    }
    
    //修改登录密码操作
    public function update_password(){
        $this->check_logined();
        $user = M('T');
        $where['gh'] = session('username');
        $result = $user->where($where)->find();
        if($result['tea_pwd'] != $_POST['old_password']){
            $this->error("原密码错误");
        }else{
            $data['tea_pwd'] = $_POST['new_password'];
            if(!$user->where($where)->save($data)) $this->error("修改失败");
            $this->success("密码修改成功");
        }
       // $this->display();
    }

    //-----------------------------修改密码操作-----------------------------------


    //-----------------------------个人信息操作-----------------------------------
    public function person_info(){
        $this->check_logined();

        $user = M('T');
        $where['gh'] = session('username');
        $result = $user->where($where)->join('cms_d on cms_t.yxh = cms_d.yxh')->find();
        //var_dump($result);

        $this->assign('person_info', $result);
        $this->display();
    }
    //-----------------------------个人信息操作-----------------------------------

    //-----------------------------选课查看操作-----------------------------------
    //显示登录教师所开设的所有课程
    public function select_course(){
        $this->check_logined();

        $date = I('m_date');
        //var_dump($date);
        $user = M('O');
        $where['gh'] = session('username');

        if($date == '查看全部'){
            $this->assign('select_date', '查看全部（显示您所有教授过的课程）');
        }else if(!empty($date)){
            $where['xq'] = $date;
            $this->assign('select_date', $date);
        }else{
            $this->assign('select_date', '未选择（显示您所有教授过的课程）');
        }

        $result = $user->where($where)->join('cms_c on cms_o.kh = cms_c.kh')->select();

        $count =  sizeof($result);
        $this->assign('result', $result);
        $this->assign('count', $count);

//        var_dump($result);
//        var_dump($count);

        $this->display();
    }

    //从选课表中获取详细的学生选课信息
    public function course_stu(){
        $this->check_logined();
        $m_xq =  I('m_xq');
        $m_kh = I('m_kh');
        $m_gh = session('username');
        $m_km = I('m_km');
//        echo $m_kh;
//        echo $m_xq;

        $user = M('E');
        $where['gh'] = $m_gh;
        $where['kh'] = $m_kh;
        $where['xq'] = $m_xq;
        $result = $user->where($where)->join('cms_s on cms_e.xh = cms_s.xh')->order('score desc')->select();
        $contain = M('O');
        $container = $contain->where($where)->find();
        $con = $container['container'];
        $count = sizeof($result);

        $this->assign("result", $result);
        $this->assign("count", $count);
        $this->assign("km", $m_km);
        $this->assign("container", $con);

        $this->display();
        //echo session('username');
    }

    //通过当前课程信息，对学生成绩进行修改的表单界面,其实可以定义数组，但还是很麻烦- -
    public function course_stu_edit(){
        $this->check_logined();

        $m_xh =  I('m_xh');
        $m_xm = I('m_xm');
        $m_pscj =  I('m_pscj');
        $m_kscj = I('m_kscj');
        $m_zpcj = I('m_zpcj');
        $m_score =  I('m_score');
        $m_gh = session('username');
        $m_xq = I('m_xq');
        $m_kh = I('m_kh');

        $this->assign('m_xh', $m_xh);
        $this->assign('m_xm', $m_xm);
        $this->assign('m_pscj', $m_pscj);
        $this->assign('m_kscj', $m_kscj);
        $this->assign('m_zpcj', $m_zpcj);
        $this->assign('m_score', $m_score);
        $this->assign('m_gh', $m_gh);
        $this->assign('m_xq', $m_xq);
        $this->assign('m_kh', $m_kh);
        $this->display();
    }

    //对学生信息进行相应DB操作,返回success或者error
    public function course_stu_update(){
        //echo $_POST['xh'];
        $user = M('E');
        $where['xh'] = $_POST['xh'];
        $where['xq'] = $_POST['xq'];
        $where['kh'] = $_POST['kh'];
        $where['gh'] = session('username');

        $data['kscj'] = $_POST['kscj'];
        $data['pscj'] = $_POST['pscj'];
        $data['zpcj'] = $_POST['zpcj'];
        if(!$user->where($where)->save($data)) $this->error("修改失败", 'select_course', 2);
        $this->success("成绩修改成功", 'select_course', 2);
    }
    
    //删除某个学生的选课信息
    public function course_stu_delete(){
        $user = M('E');
        $where['xh'] = I('m_xh');
        $where['xq'] = I('m_xq');
        $where['kh'] = I('m_kh');
        $where['gh'] = session('username');
        if(!$user->where($where)->delete()) $this->error('删除失败');
        $this->success( '删除成功');
    }
    //-----------------------------选课查看操作-----------------------------------
}
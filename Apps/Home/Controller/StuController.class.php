<?php
/**
 * Created by PhpStorm.
 * User: a1056
 * Date: 2016/5/18
 * Time: 20:59
 */

namespace Home\Controller;


use Think\Controller;

class StuController extends Controller
{
    //判断session是否过期，直接访问可以通过单入口解决
    public function check_logined(){
        $user=M('S');
        $now_user = session('username');
        $where['xh']=$now_user;
        $us=$user->where($where)->find();
        if(!$us){
            $this->redirect('Index/login');
        }
    }

    //显示主页
    public function index(){
        $this->check_logined();
        $user = M('S');
        $where['xh'] = session('username');
        $result = $user->where($where)->find();
        $this->assign('stu', $result);
        $this->display('index');
    }

    //注销
    public function logout(){
        $this->check_logined();
        session(null);
        $this->success("注销成功", "Index/login", 3);
    }
    
    //---------------------------个人信息----------------------------------
    public function person_info(){
        $this->check_logined();

        $m_xh = session("username");
        $user = M('S');
        $where['xh'] = $m_xh;
        $result = $user->where($where)->join('cms_d on cms_s.yxh = cms_d.yxh')->find();
        //var_dump($result);
        $this->assign('person_info', $result);

        $this->display();
    }
    //---------------------------个人信息----------------------------------

    
    
    //---------------------------选课查看----------------------------------
    public function select_course(){
        $this->check_logined();
        $date = I('m_date');
        //var_dump($date);
        $user = M('E');
        $where['xh'] = session('username');

        if($date == '查看全部'){
            $this->assign('select_date', '查看全部（显示您所有选择过的课程）');
        }else if(!empty($date)){
            $where['cms_e.xq'] = $date;
            $this->assign('select_date', $date);
        }else{
            $this->assign('select_date', '未选择（显示您所有选择过的课程）');
        }

        $result = $user->where($where)->join('cms_o on (cms_o.xq = cms_e.xq and cms_o.kh = cms_e.kh and cms_o.gh = cms_e.gh)')->
        join('cms_c on cms_c.kh = cms_e.kh')->select();
//        var_dump($result);

        $count =  sizeof($result);
        $this->assign('result', $result);
        $this->assign('count', $count);

//        var_dump($result);
//        var_dump($count);
        $this->display();
    }

    public function course_info(){
        $this->check_logined();
        $user = M('E');
        $where['cms_e.xq'] = I('m_xq');
        $where['cms_e.kh'] = I('m_kh');
        $where['cms_e.gh'] = I('m_gh');
        $where['xh'] = session('username');
        $result = $user->where($where)->join('cms_o on (cms_o.xq = cms_e.xq and cms_o.kh = cms_e.kh and cms_o.gh = cms_e.gh)')->
        join('cms_c on cms_c.kh = cms_e.kh')->find();

//        var_dump($result);

        $this->assign('course_info', $result);
        $this->display();
    }
    //---------------------------选课查看----------------------------------

    //---------------------------选课助手----------------------------------
    public function get_course(){
        $this->check_logined();
        //假设本学期为2013-2014冬季学期
        $date = '2013-2014冬季';

        $user = M('O');
        $where['xq'] = $date;
        $result = $user->where($where)
            ->join('cms_c on cms_c.kh = cms_o.kh')->select();
//        var_dump($result);
        $count = sizeof($result);

        //获取已经选择的课程
        $cms_e = M('E');
        $condition['xh'] = session('username');
        $condition['cms_e.xq'] = $date;
        $already_select = $cms_e->where($condition)->join('cms_c on cms_c.kh = cms_e.kh')->
        join('cms_o on (cms_o.xq = cms_e.xq and cms_o.kh = cms_e.kh and cms_o.gh = cms_e.gh)')->select();
        $already_count = sizeof($already_select);
//        var_dump($already_select);

        $xuefen = 0;
        for($i=0; $i<$already_count; $i++){
            $xuefen += $already_select[$i]['xf'];
        }

        $this->assign('xuefen', $xuefen);
        $this->assign('result', $result);
        $this->assign('count', $count);
        $this->assign('already_select', $already_select);
        $this->assign('already_count', $already_count);

        //将时间抽取出来变成二维数组
        for($i=0; $i<$already_count; $i++){
            $day = substr($already_select[$i]['sksj'], 0, 9);
            $stime = substr($already_select[$i]['sksj'], 9, 1);
            $etime = substr($already_select[$i]['sksj'], 11, 1);

            switch($day){
                case '星期一':
                    $row = '1';
                    break;
                case '星期二':
                    $row = '2';
                    break;
                case '星期三':
                    $row = '3';
                    break;
                case '星期四':
                    $row = '4';
                    break;
                case '星期五':
                    $row = '5';
                    break;
            }

            //视图中的矩阵从0，0开始
            for($col = $stime; $col <= $etime; $col++){
                $map[$row-1][$col-1] = $already_select[$i]['km'];
            }
        }
//        var_dump($day);
//        var_dump($stime);
//        var_dump($etime);
//        var_dump($map);
        session('map', $map);
        $this->assign('map', $map);

        $this->display();
    }

    public function get_course_check(){
        $this->check_logined();
        //从html中获取相关变量学期，课号，工号
        $xq = I('m_xq');
        $kh = I('m_kh');
        $gh = I('m_gh');
        $xf = I('m_xf');
        $sksj = I('m_sksj');

        //首先检查是否已经选满10分了
        $cms_e = M('E');
        $condition['xh'] = session('username');
        $condition['xq'] = $xq;
        $already_select = $cms_e->where($condition)->join('cms_c on cms_c.kh = cms_e.kh')->select();
        $already_count = sizeof($already_select);
        $xuefen = $xf;
        for($i=0; $i<$already_count; $i++){
            $xuefen += $already_select[$i]['xf'];
        }
        if($xuefen>10) $this->error('学分超出上限');
        //var_dump($xuefen);

        //其次检查是否时间冲突
        $map = session('map');
        $day = substr($sksj, 0, 9);
        $stime = substr($sksj, 9, 1);
        $etime = substr($sksj, 11, 1);

        switch($day){
            case '星期一':
                $row = '1';
                break;
            case '星期二':
                $row = '2';
                break;
            case '星期三':
                $row = '3';
                break;
            case '星期四':
                $row = '4';
                break;
            case '星期五':
                $row = '5';
                break;
        }
        $bool = true;
        for($col = $stime; $col <= $etime; $col++){
            if($map[$row-1][$col-1] != '') $bool = false;
        }
        if(!$bool) $this->error('时间冲突');

        $data['xh'] = session('username');
        $data['kh'] = $kh;
        $data['gh'] = $gh;
        $data['xq'] = $xq;
        if(!$cms_e->data($data)->add()) $this->error("选课失败");
        $this->success('选课成功');
    }

    public function delete_course(){
        $this->check_logined();
        //从html中获取相关变量学期，课号，工号
        $xq = I('m_xq');
        $kh = I('m_kh');
        $gh = I('m_gh');
        $xh = session('username');

        $user = M('E');
        $where['xq'] = $xq;
        $where['kh'] = $kh;
        $where['gh'] = $gh;
        $where['xh'] = $xh;
//        echo $xq;
//        echo $kh;
//        echo $gh;
//        echo $xh;
        if(!$user->where($where)->delete()) $this->error('退课失败');
        $this->success('退课成功');
    }

    public function get_course_stu(){
        $this->check_logined();
        $xq = I('m_xq');
        $kh = I('m_kh');
        $gh = I('m_gh');

        $user = M('E');
        $where['cms_e.xq'] = $xq;
        $where['cms_e.kh'] = $kh;
        $where['cms_e.gh'] = $gh;

        $result = $user->where($where)
            ->order('score desc')
            ->join('cms_s on cms_s.xh = cms_e.xh')
            ->select();
        $count = sizeof($result);

        $container = M('O');
        $condition['xq'] = $xq;
        $condition['kh'] = $kh;
        $condition['gh'] = $gh;
        $con = $container->where($condition)->find();

        //var_dump($con);

        $this->assign('container', $con['container']);
        $this->assign('count', $count);
        $this->assign('result', $result);
       // var_dump($result);
        $this->display();
    }
    //---------------------------选课助手----------------------------------
    
    //---------------------------设置模块----------------------------------
    //修改登录密码界面
    public function edit_password(){
        $this->check_logined();
        $this->display();
    }

    //修改登录密码操作
    public function update_password(){
        $this->check_logined();
        $user = M('S');
        $where['xh'] = session('username');
        $result = $user->where($where)->find();
        if($result['stu_pwd'] != $_POST['old_password']){
            $this->error("原密码错误");
        }else{
            $data['stu_pwd'] = $_POST['new_password'];
            if(!$user->where($where)->save($data)) $this->error("修改失败");
            $this->success("密码修改成功");
        }
        // $this->display();
    }

    //---------------------------设置模块----------------------------------
}
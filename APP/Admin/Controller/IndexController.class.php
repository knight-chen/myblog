<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
    /**
     * 显示后台登陆页面
     */
//    public function index() {
//        $register_url = U('Index/register', '', '', true);
//        $this->display('login');
//    }

    /**
     * 处理用户登录信息
     */
    public function login() {
        $crypt=new \Think\Crypt();
        $cache=\Think\Cache::getInstance('file',array('expire'=>'60'));
        $data['logintime']=time();
        $info=I('info');
        $user=M('member');
        if(IS_POST){
            if($userinfo=$user->field('password,userid,username')->where(array('usernumber'=>$info['usernumber']))->limit(1)->select()){
                if($crypt->encrypt($info['password'],1,0)==$userinfo[0]['password']){ 
                    $user->where('userid='.$userinfo[0]['userid'])->save($data); 
                    $this->assign('name',$userinfo[0]['username']);
                    cookie('usernumber',$info['usernumber'],3600);
                    cookie('username',$userinfo[0]['username'],3600);
                     $this->redirect("Daily/daily_list");
                }else{
                    $this->error('密码与用户名不匹配',U('Index/index','','',0));
                }
            }else{
                $this->error('用户名输入错误',U('Index/index','','',0));
            }          
        }else{
                if($password1=$user->field('password')->where(array('usernumber'=>$usernumber))->limit(1)->select()){
                    if($password==$password1){
                       $this->redirect('Index/index');
                    }
                }
                $register_url = U('Index/register', '', '', true);
                $this->display('login');
            }
        }
    /**
     * 后台首页
     */
    public function index(){
        if(empty(cookie(usernumber)))
        {
            $this->redirect("Index/login");
        }
        else
        {
            $this->redirect("Daily/daily_list");
            //$this->display('AdminIndex');
        }
    }
    
/**
     * 注销用户，退出系统
     */
    public function logout(){
            cookie('username',null);
            cookie('usernumber',null);
            $this->redirect('Index/login');
    }
    
    /**
     * 注册页面
     */
    public function register() {
        $crypt=new \Think\Crypt();
        if (IS_POST) {
            $info = I('info');
            $data['logintime'] = time();
            $data['hostpath'] = get_client_ip();
            $data['usernumber'] = $info['usernumber'];
            $data['username']=$info['username'];
            if ($info['password1'] == $info['password2']) {
                $data['password'] =  $crypt->encrypt($info['password1'],1,0);   
            } else {
                $this->error("两次密码不一致", U('Index/register','','',0));
            }
            if (M('member')->data($data)->add()) {
                $this->success('注册成功', U('index'));
            } else {
                $this->error();
            }
        } else {
            $this->display('register');
        }
    }
}

<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{   
    
    //判断是否登录
    public function _initialize(){    
        if((!isset($_COOKIE['username']))||(!isset($_COOKIE['usernumber']))){
           $this->redirect('Admin/Index/login');
        }
         Load('extend');
    }
}

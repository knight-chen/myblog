<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * @author Knight
     * @cnname 首页
     */
    public function index() {
        $dailyList = M("daily")->where("status = 1  and is_recommend = 1")->limit(5)->order("c_time")->select();
        foreach ($dailyList as $k => $v) {
            $where = "id=" . $v['type'];
            $typeName = $this->getInfo("daily_type", array("type_name"), $where);
            $dailyList[$k]['typeName'] = $typeName[0]['type_name'];
            $dailyList[$k]['c_time'] = date("Y-m-d", $v['c_time']);
            $dailyList[$k]['content'] = msubstr(filterHtml($v['content']),0,200,"utf-8");
        }
        $this->assign("dailyList", $dailyList);
        $this->display('Index/index');
    }

    /**
     * @author knight
     * @cnname 关于我s
     */
    public function about()
    {
        $this->display("Index/about");
    }
    /**
     * @author Knight
     * @cnname 我的文章列表
     */
    public function dailyList()
    {
         $where = "status=1 and permission=1";
        $typeId = I("id"); //日子类别Id
        if(!empty($typeId))
        {
            $where .=" and type=".$typeId;
        }
        
        
        $count = M("daily")->where($where)->count();
        $page = new \Think\Page($count,5);
        $show = $page->show();
       
        $dailyList =  M("daily")->where($where)->order("c_time desc")->limit($Page->firstRow.','.$page->listRows)->select();
        foreach($dailyList as $k=>$v)
        {
            $where = "id=" . $v['type'];
            $typeName = $this->getInfo("daily_type", array("type_name"), $where);
            $dailyList[$k]['typeName'] = $typeName[0]['type_name'];
            $dailyList[$k]['c_time'] = date("Y-m-d", $v['c_time']);
            $dailyList[$k]['content'] = msubstr(filterHtml($v['content']),0,100,"utf-8");
        }
        
        $pageList = $page->show();
        $this->assign('type',1);
        $this->assign("pageList",$pageList); //分页数据
        $this->assign("pageTotal",$page->totalPages);//分页总数
        $this->assign("dailyList",$dailyList);
        $this->display("Index/newList");
    }
    /**
     * @author Knight
     * @cnname 文章详情
     */
    public function dailyContent()
    {
        $id = I("id");
        $where = "id=".$id;
        $dailyContent = M("daily")->where($where)->find();
        $dailyContent['c_time'] = date("Y-m-d H:i:s",$dailyContent['c_time']); //创建日期
        $typeName = $this->getInfo("daily_type", array("type_name"), "id=".$dailyContent['type']); //日子列表
        $dailyContent["typeName"] =  $typeName['type_name'];
        $dailyContent['content'] = html_entity_decode( $dailyContent['content']);
        $dailyContent['commentCount']= M("daily_comment")->where("dailyid=".$id)->count();  //评论数量
        //$dailyContent['commentCount'] = $commentCount['tp_count']; //日子评论数量
         $this->assign('type',1);
        $this->assign("dailyContent",$dailyContent);
        $this->display("Index/new");
    }
    
    /**
     * @author Knight
     * @cnname 发布评论
     */
    public function putComment()
    {
        $commentInfo['comment'] = I("content");
        $commentInfo['dailyid'] = I("dailyId");
        $commentInfo['c_time'] = time();
        $result = M("daily_comment")->add($commentInfo);
        if($result)
        {
            $this->ajaxReturn(true);
        }
        else
        {
            $this->ajaxReturn(false);
        }
       
    }
    
    /**
     * @author Knight
     * @cnane 相册列表
     */
    public function albumList()
    {
        $typeId = I("id");
        $where = "status=0 and authority = 1";
        if(!empty($typeId))
        {
            $where .= " and typeid=".$typeId;
        }
        
        $count = M("photo_album")->where($where)->count();
        $page = new \Think\Page($count);
        $pageList = $page->show();
        $albumList = M("photo_album")->where($where)->order("c_time desc")->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('albumList',$albumList);
        $this->assign("pageList",$pageList);
        $this->display("Index/albumList");
    }
    /**
     * @author Knight
     * @cnname 相片列表
     */
    public function photoList()
    {
        $albumId = I("id");
        $where = "status=0 and album_id=".$albumId;
        $count = M("photo")->where($where)->count();
        $page = new \Think\Page($count,20);
        $pageList = $page->show();
        $photoList = M("photo")->where($where)->limit($page->firstRow.','.$page->listRows)->order("id desc")->select();
        $this->assign("photoList",$photoList);
        $this->assign("pageList",$pageList);
        $this->display("Index/photoList");
    }
    
    /*
     * @author Knight
     * @cnname 留言记录
     */
    public function leaveMessage()
    {
        $count = M("leave_message")->where("1=1")->count();
        $page = new \Think\Page($count,30);
        $pageList = $page->show();
        $messageList = M("leave_message")->where("1=1")->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign("pageList",$pageList);
        $this->assign("messageList",$messageList);
        $this->display("Index/leaveMessage");
    }
    
    public function putLeaveMessage()
    {
        $data['content'] = I('content');
        $data['creat_date'] = time();
        $result=M("leave_message")->add($data);
        if($result)
        {
            $this->ajaxReturn(ture);
        }
        else
        {
            $this->ajaxReturn(false);
        }
    }
    
    /******************************************公共方法*****************************************/
    /**
     * @cnname 查询数据表中的指定信息
     * @author  Knight
     * @param string $databaseName //数据库名称
     * @param array $fields 查询字段
     * @param string $where  查询条件
     * @return array 返回查询的信息
     */
    public function getInfo($databaseName, $fields = array(), $where) {
        $DbModel = M($databaseName);
        if (empty($fields)) {
            $info = $DbModel->where($where)->select();
        } else {
            $info = $DbModel->where($where)->field($fields)->select();
        }
        return $info;
    }

    

}

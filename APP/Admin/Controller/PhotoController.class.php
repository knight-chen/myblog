<?php

/**
 * Description of PhotoController
 *
 * @author chenhailong
 */
namespace Admin\Controller;
class PhotoController extends CommonController{
    function __construct() {
        parent::__construct();
        $this->permissionDb=M("permission");
        $this->typeDb=M("photo_type");
        $this->albumDb=M("photo_album");
        $this->photoDb=M("photo");
        
    }
    /**
     * 相册列表
     */
    function album_init(){
        $count = $this->albumDb->where('status!=1')->count();
        $page = new \Think\Page($count,20);
        
        $albumList=$this->albumDb->where('status !=1 ')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('albumList',$albumList);
        $authArr=array(0=>"仅自己",1=>"公开");
        $this->assign('authArr',$authArr);
        $this->assign("pageList",$page->show());
        $this->display('Photo/photo_album_init');
        
    }
    /**
     * 添加相册
     */
    public function add_photo_album(){
        if(IS_AJAX){
            $typeinfo=I('typeinfo');
            $typeInfo=explode(':',$typeinfo);
            $album['typeid']=$typeInfo[0];
            $album['typename']=$typeInfo[1];
            $album['name']=I('name');
            $album['description']=I('description');
            $album['authority']=I('authority');
            $album['c_time']=time();
            if($this->albumDb->add($album)){
               $this->ajaxReturn(U('Photo/album_init','','',0)); 
            }else{
                $this->ajaxReturn(0);
            }
        }else{
            $typeList=$this->typeDb->select();
            $this->assign("typeList",$typeList);
            $permission=$this->permissionDb->select();
            $this->assign("permission",$permission);
            $this->display("add_photo_album");
        }
    }
    /**
     * 上传照片
     */
    public function add_photo(){
        if(IS_AJAX){
            $photoInfo=$_POST['info'];
            $photoInfo=json_decode($photoInfo,true);
            foreach($photoInfo as $k=>$v){
                $imgInfo['photo_path']=$v['src'];
                $imgInfo['name']=$v['alt'];
                $imgInfo['default_name']=$v['title'];
                $this->photoDb->add($imgInfo);
            }
            $this->ajaxReturn(1);
        } 
        $this->display('Photo/photo_album_init');
    } 
    /**
     * 设置照片信息
     */
    public function set_photo_info(){
        if(IS_POST)
        {
            $data = $_POST;
            $albumId = $data['album_id'];
            unset($data['album_id']);
            $dataInfo = array();
            $index = 0;
            
            foreach($data as $k=>$v)
            {
                $key = explode("_", $k);
                if($key[0] == 'name')
                {
                   $dataInfo[$index]['album_id'] = $albumId;
                   $dataInfo[$index]['id'] = $key[1];
                   $dataInfo[$index]['name'] = $v;
                   $index ++;
                }
                
            }
            $index = 0;
            foreach($data as $k=>$v)
            {
                $key = explode("_", $k);
                if($key[0] == 'description' && $kye[1] = $dataInfo[$index]['id'])
                {
                   $dataInfo[$index]['description'] = $v;
                   $index ++;
                }
            }
           
            foreach($dataInfo as $k=>$v)
            {
                M("photo")->save($v);
            }
            
           $this->redirect("photo/album_init");
        }
        else
        {
            $where="album_id=0";
            $count = $this->photoDb->where($where)-count();
            $page = new \Think\Page($count,20);
            $newPhoto=$this->photoDb->where($where)->limit($page->firstRow.','.$page->listRows)->order("id desc")->select();
            $pageList = $page->show();
            $this->assign('newPhoto',$newPhoto);
            $album=$this->albumDb->select();
            $this->assign('album',$album);
            $this->assign("pageList",$pageList);
            $this->display('Photo/photo_info');
        }
    }
    /**
     * 删除相册
     */
    public function delete(){
        
    }
    /**
     * 修改相册
     */
    public function update(){
        
    }
    
    
    /**
     * 修改相册 权限
     */
    public function update_album_authority(){
        $album['id']=I('id');
        $album['authority']=(I('authority')==1?0:1);
        if($this->albumDb->where('id='.$album['id'])->save($album)){
            //$this->ajaxReturn(U('Photo/album_init','','',0));
            $this->ajaxReturn($album['authority']);
        }else{
            $this->ajaxReturn(false);
        }
    }
    
    public function photo_init()
    {
        $albumId = I('album_id');
        $where = "status=0 and album_id=".$albumId;
        $count = M("photo")->where($where)->count();
        $page = new \Think\Page($count,18);
        $pageList = $page->show();
        $photoList = M("photo")->where($where)->order("id desc")->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign("photoList",$photoList);
        $this->assign("pageList",$pageList);
        $this->display("Photo/photo_init");
    }
    
    public function delete_photo()
    {
        $id = I('id');
        $data['status'] = 1;
        $result=M('photo')->where('id='.$id)->save($data);
        if($result !== false)
        {
            $this->ajaxReturn(true);
        }
        else
        {
             $this->ajaxReturn(false);
        }   
    }
    public function set_cover()
    {
        $photoPath = I("photoPath");
        $albumId = I("albumId");
        $data['cover'] = $photoPath;
        $result = M("photo_album")->where('id='.$albumId)->save($data);
        if($result !== false)
        {
            $this->ajaxReturn(true);
        }
        else
        {
            $this->ajaxReturn(false);
        }
        
    }
}

<?php
namespace Admin\Controller;
class DailyController extends CommonController{
    public function __construct(){
        parent::__construct();
        $this->dailyDb=M('daily');
        $this->typeDb=M('daily_type');
        $this->permissionDb=M('permission');
        $this->draftDb=M('draft_daily');
    }
    //显示日志类别记录
    public function daily_type_init(){
        $typedb=M('daily_type');
        $count = M("daily_type")->where("1=1")->count();
        $page = new \Think\Page($count,20);
        $data=$typedb->order('id')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('data',$data);
        $this->assign('pageList',$page->show());
        $this->display('Daily/daily_type_init');
    }
    //添加日志类别
    public function add_daily_type(){
        if(IS_AJAX){
            $info['type_name']=I('type_name');
            $info['type_descript']=I('descript');
            $daily_typedb=M('daily_type');
            if(!empty(array_filter($info))){
                $info['c_time']=strtotime(I('c_time'));
               if($daily_typedb->data($info)->add()){
                   $this->ajaxReturn(1,'json');
               }else{
                   $this->ajaxReturn(array('staus'=>0),'json');
               }
               
            }
        }else{
            $this->assign('time',date('Y-m-d',time()));
            $this->display('add_daily_type');
        }
        
    }
    /**
     * 删除日志分类
     */
    public function delete_daily_type(){
        $typeId=I('typeId');
        $dailyTypeDB=M('daily_type');
        $dailyNum=$dailyTypeDB->where('id='.$typeId)->limit(1)->select();
        if($dailyNum[0]['daily_num']==0){
            $dailyTypeDB->where('id='.$typeId)->delete();
            $this->redirect('Daily/daily_type_init');
        }else{
            $this->error('请先移除该类别日志',U('Daily/daily_type_init','','',0));
        }
    }
    /**
     * 修改日志分类信息
     */
    public function update_daily_type() {
        $typeId = I('typeId');
        $typeDb = M('daily_type');
        $updateDailyInfo['type_name']=I('type_name');
        $updateDailyInfo['id']=I('id');
        $updateDailyInfo['c_time']=I('c_time');
        $updateDailyInfo['type_descript']=I('descript');
        if (IS_AJAX) {
            if($typeDb->save($updateDailyInfo)){
                $typeInitUrl=U('Daily/daily_type_init');
                $this->ajaxReturn($typeInitUrl,'json');
            }else{
                $this->ajaxReturn(0,'json');
            }
        } else {
            if (empty($typeId)) {
                return;
            }
            $typeInfo = $typeDb->where('id=' . $typeId)->find();
            $this->assign('typeInfo', $typeInfo);
            $c_time=date('Y-m-d',time());
            $this->assign('c_time',$c_time);
            $this->display('Daily/update_daily_type');
        }
    }

    /**
     * 添加日记
     */
    public function add_daily(){
        $dailyTypeDb=M('daily_type');//日志分类数据模型
        $permissionDb=M('permission');//权限数据模型
        $dailyDb=M('daily');//日志数据模型
        //日志类别信息
        $typeInfo=$dailyTypeDb->field('type_name,id')->select();
        $this->assign('typeInfo',$typeInfo);
        $permission=$permissionDb->select();
        $this->assign('permission',$permission);
        if(IS_POST){
            $dailyInfo=I('daily');
            $dailyInfo['c_time']=strtotime($dailyInfo['c_time']);
            if(empty($dailyInfo['content'])){
                $this->error ('内容不能为空');
            }
            if($dailyInfo['name']==''){
                $dailyInfo['name']=mb_substr($dailyInfo['content'],9,16);
            }
            if($dailyDb->data($dailyInfo)->add($dailyInfo)){
                $this->success('添加成功',U('Daily/daily_list'));
            }
        }else{
            $this->display('Daily/add_daily');
        }
    }
    /**
     * 保存为草稿
     */
    public function sava_to_draft(){
       if(IS_AJAX){
           $draftDb=M('draft_daily');
           $draft['name']=I('name');
           $draft['typeid']=I('typeid');
           $draft['c_time']=strtotime(I('c_time'));
           $draft['author']=I('author');
           $draft['permission']=I('permission');
           $draft['content']=I('content');
           $draft['isput']=0;
           if(empty($draft['content'])){
               $this->ajaxReturn(0);
           }
           if($draftDb->data($draft)->add()){
               $this->ajaxReturn(U('Daily/draft_list'));
           }else{
               $this->ajaxReturn(0);
           }
       }else{
           $this->display('Daily/add_daily');
       } 
    }
    /**
     * 日志列表
     * 
     */
    public function daily_list(){
        $typeDb=M('daily_type');
        $permissionDb=M('permission');//权限数据模型
        $dailyDb=M('daily');//日志数据模型
        $count = $dailyDb->where('status=1')->count();
        $page = new \Think\Page($count,20);
        
        $daily_list=$dailyDb->where('status=1')->limit($page->firstRow.','.$page->listRows)->select();
        
        foreach ($daily_list as $k=>$v){
            $permission=$permissionDb->where('id='.$v['permission'])->field('permission')->find();
            $daily_list[$k]['permission']=$permission['permission'];
            $type=$typeDb->where('id='.$v['type'])->field('type_name')->find();
            $daily_list[$k]['type']=$type['type_name'];
        }
        $this->assign('daily_list',$daily_list);
        $this->assign('pageList',$page->show());
        $this->display('Daily/daily_list');
    }
    /**
     * 修改日志
     */
    public function update_daily(){
        $dailyId=!empty(I('dailyId'))?I('dailyId'):intval($_GET['dailyId']);
        if(IS_POST){
            $dailyInfo=I('daily');
            $dailyInfo['c_time']=  strtotime($dailyInfo['c_time']);
            if(empty($dailyInfo['content'])){
                $this->error('内容不能为空');
            }
            $result = $this->dailyDb->where('id='.$dailyId)->save($dailyInfo);
            if($result !== false){
                $this->success('修改成功',U('Daily/show_daily',array('dailyId'=>$dailyId,'',0)));
            }else{
                $this->error('修改失败');
            }
        }else{
            $oldInfo=$this->dailyDb->where('id='.$dailyId)->find();
            $permission=$this->permissionDb->where('id='.$oldInfo['permission'])->find();
            $oldInfo['permissionid']=$oldInfo['permission'];
            $oldInfo['permission']=$permission['permission'];
            $type=$this->typeDb->where('id='.$oldInfo['type'])->find();
            $oldInfo['typeid']=$oldInfo['type'];
            $oldInfo['type']=$type['type_name'];
           //日志类别信息
            $typeInfo=$this->typeDb->field('type_name,id')->select();
            $this->assign('typeInfo',$typeInfo);
            $permission=$this->permissionDb->select();
            $this->assign('permission',$permission);
            $this->assign('oldInfo',$oldInfo);
            $this->display('Daily/update_daily');
        }
    }
    /**
     * 删除日志
     */
    public function delete_daily() {
        $data['status'] = 0;
        if (IS_AJAX) {
            $dailyId = I('dailyId');
            if ($this->dailyDb->where('id=' . $dailyId)->save($data)) {
                $this->ajaxReturn(U('Daily/daily_list'));
            } else {
                $this->ajaxReturn(0);
            }
        }
    }
    /**
     * show_daily() 
     * 查看日志
     */
    public function show_daily(){
         $dailyId=I('dailyId');
         $dailyInfo=$this->dailyDb->where('id='.$dailyId)->find();
         $dailyInfo['type_name']=  get_daily_type($dailyInfo['type']);
         $dailyInfo['permission']=  get_permission($dailyInfo['permission']);
         $dailyInfo['content']=$dailyInfo['content'];
         $this->assign('dailyInfo',$dailyInfo);
         $this->display('Daily/show_daily');
     }
     /**
      * 草稿列表
      */
    public function draft_list(){
        $count = $this->draftDb->where('isput=0')->count();
        $page = new \Think\Page($count,20);
        $draftList=$this->draftDb->where('isput=0')->limit($page->firstRow.','.$page->listRows)->select();
        foreach ($draftList as $k=>$v){
           $permission=$this->permissionDb->where('id='.$v['permission'])->field('permission')->find();
           $draftList[$k]['permission']=$permission['permission'];
           $type=$this->typeDb->where('id='.$v['typeid'])->field('type_name')->find();
           $draftList[$k]['type']=$type['type_name'];
       }
        $this->assign('draftList',$draftList);
         $this->assign('pageList',$page->show());
        $this->display('Daily/draft_list');
    }
    /**
     * 修改草稿
     */
    public function update_draft(){
        $draftId=!empty(I('draftId'))?I('draftId'):intval($_GET['draftId']);
        if(IS_POST){
            $draftInfo=I('draft');
            $draftInfo['c_time']=  strtotime($draftInfo['c_time']);
            if(empty($draftInfo['content'])){
                $this->error('内容不能为空');
            }
            $result = $this->draftDb->where('id='.$draftId)->save($draftInfo);
            if($result !== false){
                $this->success('修改成功',U('Daily/show_draft',array('draftId'=>$draftId)));
            }else{
                $this->error('修改失败');
            }
        }else{
        $draftInfo=$this->draftDb->where('isput=0 and id='.$draftId)->find();
        $draftInfo['type']=  get_daily_type($draftInfo['typeid']);
        $draftInfo['permissionid']=$draftInfo['permission'];
        $draftInfo['permission']=  get_permission($draftInfo['permissionid']);
        $this->assign('draftInfo',$draftInfo);
        //日志类别信息
        $typeInfo=$this->typeDb->field('type_name,id')->select();
        $this->assign('typeInfo',$typeInfo);
        $permission=$this->permissionDb->select();
        $this->assign('permission',$permission);
        $this->assign('oldInfo',$oldInfo);
        $this->display('Daily/update_draft');  
        }
    }
    /**
     * 查看草稿
     */
    public function show_draft(){
        $draftId=I('draftId');
        $draftInfo=$this->draftDb->where('id='.$draftId)->find();
        $draftInfo['type_name']=  get_daily_type($draftInfo['typeid']);
        $draftInfo['permission']=  get_permission($draftInfo['permission']);
        $draftInfo['content']=$draftInfo['content'];
        $this->assign('draftInfo',$draftInfo);
        $this->display('Daily/show_draft');
    }
    /**
     * 删除草噶
     * 
     */
    public function delete_draft(){
      if (IS_AJAX) {
            $draftId = I('draftId');
            if ($this->draftDb->where('id=' . $draftId)->delete()) {
                $this->ajaxReturn(U('Daily/draft_list'));
            } else {
                $this->ajaxReturn(0);
            }
        }  
    }
    /**
     * 发布草稿
     */
    public function put_draft(){
        $id=isset($_GET['id'])?intval($_GET['id']):'';
        $info=$this->draftDb->where('id='.$id)->find();
        $dailyInfo['name']=$info['name'];
        $dailyInfo['type']=$info['typeid'];
        $dailyInfo['permission']=$info['permission'];
        $dailyInfo['content']=$info['content'];
        $dailyInfo['author']=$info['author'];
        $dailyInfo['c_time']=time();
        if($this->dailyDb->data($dailyInfo)->add()){
            if($this->draftDb->where('id='.$info['id'])->data('isput=1')->save()){
                $this->success('发布成功');
            }
        }else{
            $this->error('修改失败');
        }
    }
}

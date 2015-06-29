<?php
/**
 * 评论和留言控制器
 */
namespace Admin\Controller;
class CommentController extends CommonController{
    
    public function getMessageList()
    {
        $count = M("leave_message")->where("1=1")->count();
        $page = new \Think\Page($count,15);
        
        $messageList = M("leave_message")->where("1=1")->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign("messageList",$messageList);
        $this->assign("pageList",$page->show());
        $this->display("Comment/leave_message_list");
    }
    
    public function delete_Message()
    {
        $id = I("messageId");
        $result = M("leave_message")->where("id=".$id)->delete();
        if($result)
        {
            $this->ajaxReturn(true);
        }
        else 
        {
            $this->ajaxReturn(FALSE);
        }
    }
    
    public function getCommentList()
    {
        $count = M("daily_comment")->where("status = 0")->count();
        $page = new \Think\Page($count,15);
        
        $commentList = M("daily_comment")->where("status = 0")->limit($page->firstRow.','.$page->listRows)->select();
        
        $this->assign("commentList",$commentList);
        $this->assign("pageList",$page->show());
        $this->display("Comment/comment");
    }
     public function delete_comment()
    {
        $id = I("commentId");
        $result = M("daily_comment")->where("id=".$id)->save(array('status'=>1));
        if($result)
        {
            $this->ajaxReturn(true);
        }
        else 
        {
            $this->ajaxReturn(FALSE);
        }
    }
}
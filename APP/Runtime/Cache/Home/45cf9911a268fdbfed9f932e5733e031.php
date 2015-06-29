<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>文章内容</title>
<meta name="keywords" content="个人博客模板,博客模板,响应式" />
<meta name="description" content="如影随形主题的个人博客模板，神秘、俏皮。" />
<link href="/blog/APP/Home/View/Public/css/base.css" rel="stylesheet">
<link href="/blog/APP/Home/View/Public/css/style.css" rel="stylesheet">
<link href="/blog/APP/Home/View/Public/css/media.css" rel="stylesheet">
<script type="text/javascript" src="/blog/APP/Home/View/Public/js/jquery.js"></script>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<script type="text/javascript" src="/blog/APP/Home/View/Public/js/jquery.js"></script>
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
<script>
    $(function(){
        $(".a").attr("id",'');
        $(".b").attr("id","topnav_current");
    });
</script>
</head>
<script>
    function putComment()
    {
        var content = $("#comment").val();
        var dailyId = $("#comment").data('id');
        var url = $("#comment").data('url');
        $.post(url,{ content : content,dailyId:dailyId },function(result){
            if(result)
            {
                location.reload();
            }
        });
        
    }
</script>
<body>
<div class="ibody">
  <div class="ibody">
  <header>
    <h1>狼傷</h1>
    <h2>影子是一个会撒谎的精灵，它在虚空中流浪和等待被发现之间;在存在与不存在之间....</h2>
    <div class="logo"><a href="<?php echo U('Index/index','','',0);?>"></a></div>
    <nav id="topnav"><a class="a" href="<?php echo U('Index/index','','',0);?>">首页</a><a class="b" href="<?php echo U('Index/dailyList','','',0);?>">我的文章</a><a class="c" href="<?php echo U('Index/leaveMessage','','',0);?>">留言板</a><a class="d" href="<?php echo U('Index/albumList','','',0);?>">图片生活</a><a class="e" href="<?php echo U('Index/about','','',0);?>">关于我</a></nav>
  </header>

  <article>
    <h2 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="1/">我的文章</a>><a href="1/">文章内容</a></h2>
    <div class="index_about">
      <h2 class="c_titile"><?php echo ($dailyContent['name']); ?></h2>
      <?php $total = getCountComment($dailyContent['id']);?>
      <p class="box_c"><span class="d_time">发布时间：<?php echo ($dailyContent['c_time']); ?></span><span>编辑：<?php echo ($dailyContent['author']); ?></span><span>评论（<?php echo ($total); ?>）</span></p>
      <ul class="infos">
        <?php echo ($dailyContent['content']); ?>
      </ul>
       <?php  $upDaily = M("daily")->where("status = 1 and permission = 1 and id<".$dailyContent['id'])->order("id asc")->limit(1)->select(); $nextDaily = M("daily")->where("status = 1 and permission = 1 and id>".$dailyContent['id'])->order("id asc")->limit(1)->select(); $sameTypeDaily = M("daily")->where("status = 1 and permission = 1 and type=".$dailyContent['type'])->order("id asc")->limit(6)->select(); ?>
      <div class="nextinfo">
          <?php if(!empty($upDaily[0])):?>
          <p>上一篇：<a href="<?php echo U('Index/dailyContent',array('id'=>$upDaily[0]['id']),'',0);?>"><?php echo ($upDaily[0]['name']); ?></a></p>
          <?php endif;?>
          <?php if(!empty($nextDaily[0])):?>
          <p>下一篇：<a href="<?php echo U('Index/dailyContent',array('id'=>$nextDaily[0]['id']),'',0);?>"><?php echo ($nextDaily[0]['name']); ?></a></p>
          <?php endif;?>
      </div>
      <div style='width:690px;height: 76px;position: relative;'>
          <textarea name='comment' id='comment' data-url="<?php echo U('Index/putComment','','',0);?>" data-id="<?php echo ($dailyContent['id']); ?>" style="width: 605px;height: 75px;position: absolute;resize: none;"></textarea>
          <input type="button" id='submit' name="submit" onclick='putComment()' value='发表评论' style='position: absolute;right:0px;font-size: 17px;width: 80px;height:76px;'>
      </div>
      <?php  $commentList = M("daily_comment")->where("dailyid=".$dailyContent['id'])->order("c_time desc")->select(); ?>
      <div class="keybq">
          <p><span>评论列表:</span></p>
      </div>
      <div style="width: 600px;height: auto;">
          <?php foreach($commentList as $k=>$v):?>
          <ul>
              <label style=" font-size: 12px; font-style: normal;color: #099;line-height: 30px;">评论时间:<?php echo date("Y-m-d H:i:s",$v['c_time']);?></label>
              <li style="line-height: 20px; color: gray;font-size: 13px;"><?php echo ($v['comment']); ?></li>
          </ul>
          <?php endforeach;?>
      </div>
     <!--
      <div class="otherlink">
        <h2>相关文章</h2>
        <ul>
            <?php foreach($sameTypeDaily as $k=>$v):?>
            <li><a href="<?php echo U('Index/dailyContent',array('id'=>$v['id']),'',0);?>" title="<?php echo ($v['name']); ?>"><?php echo ($v['name']); ?></a></li>
            <?php endforeach;?>
        </ul>
      </div>
     -->
    </div>
  </article>
  <aside>
    <?php  if($type == 1) { $typeList = M("daily_type")->order("c_time desc")->limit(5)->field("id,type_name")->select(); foreach($typeList as $k=>$v) { $typeList[$k]['url'] = U("Index/dailyList",array('id'=>$v['id']),'',0); } } else { $typeList = M("photo_type")->limit(5)->field("id,name")->select(); foreach($typeList as $k=>$v) { $typeList[$k]['type_name'] = $v['name']; $typeList[$k]['url'] = U("Index/albumList",array('id'=>$v['id']),'',0); } } ?>
    <div class="rnav">
      <?php foreach($typeList as $k=>$v):?>
      <li class="rnav<?php echo $k%4+1; ?> "><a href="<?php echo $v['url'];?>"><?php echo ($v['type_name']); ?></a></li>
      <?php endforeach;?>
    </div>
    <div class="ph_news">
      <h2>
        <p>点击排行</p>
      </h2>
        <?php  if($type==1) { $clickRankList = M("daily")->where("status = 1 and permission = 1")->order("interview desc")->limit(9)->field("id,name")->select(); foreach($clickRankList as $k=>$v) { $clickRankList[$k]['url'] = U("Index/dailyContent",array('id'=>$v['id']),'',0); } } else { $clickRankList = M("photo_album")->where("status = 0 and authority = 1 ")->order("c_time desc")->limit(9)->field("id,name")->select(); foreach($clickRankList as $k=>$v) { $clickRankList[$k]['url'] = U("Index/photoList",array('id'=>$v['id']),'',0); } } ?>
      <ul class="ph_n">
         <?php foreach($clickRankList as $k=>$v):?>
         <li><?php if($k<3):?><span class="num1"><?php else:?><span><?php endif; echo ($k+1); ?></span><a href="<?php echo ($v['url']); ?>"><?php echo ($v['name']); ?></a></li>
         <?php endforeach;?>
      </ul>
      <h2>
        <p>栏目推荐</p>
      </h2>
       <?php  if($type==1) { $recommendList = M("daily")->where("status = 1 and permission = 1 and is_recommend=1")->order("interview desc")->limit(9)->field("id,name")->select(); foreach($recommendList as $k=>$v) { $recommendList[$k]['url'] = U("Index/dailyContent",array('id'=>$v['id']),'',0); } } else { $recommendList = M("photo_album")->where("status = 0 and authority = 1 and is_recommend=1")->order("c_time desc")->limit(9)->field("id,name")->select(); foreach($recommendList as $k=>$v) { $recommendList[$k]['url'] = U("Index/photoList",array('id'=>$v['id']),'',0); } } ?>
      <ul>
         <?php foreach($recommendList as $k=>$v):?>
        <li><a href="<?php echo ($v['url']); ?>"><?php echo ($v['name']); ?></a></li>
        <?php endforeach;?>
      </ul>
      <h2>
        <p>最新评论</p>
      </h2>
        <?php  $commentList = M("daily_comment") -> where("status =0")->order("c_time desc")->limit(5)->select(); ?>
      <ul class="pl_n">
         <?php foreach($commentList as $k=>$v):?>
        <dl>
            <dt><img src="/blog/APP/Home/View/Public/images//s<?php echo $k%3+1;?>.jpg"> </dt>
          <dt></dt>
          <dd>游客
            <time><?php echo date("Y-m-d H:i:s",$v['c_time'])?></time>
          </dd>
          <dd><a href="/"><?php echo ($v['comment']); ?></a></dd>
        </dl>
         <?php endforeach;?>
      </ul>
    </div>
    <div class="copyright">
      <ul>
        <p> Design by <a href="/">DanceSmile</a></p>
        <p>蜀ICP备11002373号-1</p>
        </p>
      </ul>
    </div>
  </aside>
  <script src="/blog/APP/Home/View/Public/js/silder.js"></script>
  <div class="clear"></div>
  <!-- 清除浮动 --> 
</div>
</body>
</html>
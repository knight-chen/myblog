<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>留言板</title>
        <meta name="keywords" content="个人博客模板,博客模板,响应式" />
        <meta name="description" content="如影随形主题的个人博客模板，神秘、俏皮。" />
        <link href="/APP/Home/View/Public/css/base.css" rel="stylesheet">
        <link href="/APP/Home/View/Public/css/style.css" rel="stylesheet">
        <link href="/APP/Home/View/Public/css/media.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
        <script type="text/javascript" src="/APP/Home/View/Public/js/jquery.js"></script>
        <!--[if lt IE 9]>
        <script src="js/modernizr.js"></script>
        <![endif]-->
    </head>
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
                <h2 class="about_h">您现在的位置是：<a href="<?php echo U('Index/index','','',0);?>">首页</a>><a href="<?php echo U('Index/leaveMessage','','',0);?>">留言板</a></h2>
               <div style='width:690px;height: 76px;position: relative; left: 20px;top:-9px;'>
                        <textarea name='' id='leaveMessage' data-url="<?php echo U('Index/putLeaveMessage','','',0);?>" style="width: 605px;height: 75px;position: absolute;resize: none;"></textarea>
                        <input type="button" id='submit' name="submit" onclick='putLeaveMessage()' value='发表留言' style='position: absolute;right:0px;font-size: 17px;width: 80px;height:76px;'>
                    </div>
                <div class="bloglist">
                    <h3 style="color: rgb(15, 156, 124);font-size: 14px;margin-left: 20px;line-height: 26px;"><b>留言记录</b></h3>
                    <?php if(is_array($messageList)): foreach($messageList as $k=>$v): ?><div class="newblog">
                            <ul style="width: 615px;font-size: 14px;">
                                <span style="color: rgb(15, 156, 124);"><b><?php echo ($k+1); ?>:</b></span><li style="display:inline;margin-left: 10px;"><?php echo ($v['content']); ?></li>
                            </ul>
                            <div class="dateview"><?php echo (date("Y-m-d",$v['creat_date'])); ?></div>
                        </div><?php endforeach; endif; ?> 
                </div>
                <div class="page"><?php echo ($pageList); ?></div>
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
            <dt><img src="/APP/Home/View/Public/images//s<?php echo $k%3+1;?>.jpg"> </dt>
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
            <script src="/APP/Home/View/Public/js/silder.js"></script>
            <div class="clear"></div>
            <!-- 清除浮动 --> 
        </div>
        <script>
            function putLeaveMessage()
            {
                var url = $("#leaveMessage").attr("data-url");
                var content = $("#leaveMessage").val();
                $.post(url,{content:content},function(result){
                    if(result)
                    {
                        location.reload();
                    }
                });
            }
        </script>
    </body>
</html>
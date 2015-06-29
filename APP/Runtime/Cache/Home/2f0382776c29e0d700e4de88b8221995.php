<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
    <head>
        <meta charset="utf8">
        <title>图片列表</title>
        <meta name="keywords" content="个人博客模板,博客模板,响应式" />
        <meta name="description" content="如影随形主题的个人博客模板，神秘、俏皮。" />
        <link href="/blog/APP/Home/View/Public/css/base.css" rel="stylesheet">
        <link href="/blog/APP/Home/View/Public/css/style.css" rel="stylesheet">
        <link href="/blog/APP/Home/View/Public/css/media.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

        <link rel="stylesheet" href="http://keleyi.com/keleyi/phtml/jqtexiao/3/css/keleyi.css">
        <script type="text/javascript" src="http://keleyi.com/keleyi/pmedia/jquery/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="http://keleyi.com/keleyi/phtml/jqtexiao/3/js/keleyi.min.js"></script>
        <script>
    $(function(){
        $(".a").attr("id",'');
        $(".d").attr("id","topnav_current");
    });
</script>


        

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
                <h2 class="about_h">您现在的位置是：<a href="<?php echo U('Index/index','','',0);?>">首页</a>><a href="<?php echo U('Index/albumList','','',0);?>">图片分享</a>><a href="">图片列表</a></h2>
                <div class="template" >
                    <h3>
                        <p>相片列表</p>
                        <a href="/" class="more"></a> 
                    </h3>
                    <div class=" dengxaing-keleyi-com">
                        <ul>
                            <?php if(is_array($photoList)): foreach($photoList as $k=>$v): ?><li><a class="photo_lList" title="<?php echo ($v['description']); ?>" data-name='<?php echo ($v["name"]); ?>' href="<?php echo ($v["photo_path"]); ?>"><img style="height:110px;" src="<?php echo ($v["photo_path"]); ?>"></a><span><?php echo ($v["name"]); ?></span></li><?php endforeach; endif; ?>
                        </ul>
                    </div>
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
<script type="text/jscript">
    $(document).ready(function() {
        $('.dengxaing-ke' + 'leyi-com').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1]  // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title') + '<small>'+item.el.attr("data-name")+'</small>';
                }
            }
        });
    });

</script>
    </body>
</html>
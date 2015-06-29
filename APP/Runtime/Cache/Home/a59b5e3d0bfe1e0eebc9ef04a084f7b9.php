<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>首页</title>
        <link href="/APP/Home/View/Public/css/base.css" rel="stylesheet">
        <link href="/APP/Home/View/Public/css/index.css" rel="stylesheet">
        <link href="/APP/Home/View/Public/css/media.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    </head>
    <body>
        <div class="ibody">
            <header>
                <div class="ibody">
  <header>
    <h1>狼傷</h1>
    <h2>影子是一个会撒谎的精灵，它在虚空中流浪和等待被发现之间;在存在与不存在之间....</h2>
    <div class="logo"><a href="<?php echo U('Index/index','','',0);?>"></a></div>
    <nav id="topnav"><a class="a" href="<?php echo U('Index/index','','',0);?>">首页</a><a class="b" href="<?php echo U('Index/dailyList','','',0);?>">我的文章</a><a class="c" href="<?php echo U('Index/leaveMessage','','',0);?>">留言板</a><a class="d" href="<?php echo U('Index/albumList','','',0);?>">图片生活</a><a class="e" href="<?php echo U('Index/about','','',0);?>">关于我</a></nav>
  </header>

            </header>
            <article>
                <div class="banner">
  <ul class="texts">
    <p>The best life is use of willing attitude, a happy-go-lucky life. </p>
    <p>最好的生活是用心甘情愿的态度，过随遇而安的生活。</p>
  </ul>
</div>
                <div class="bloglist">
                    <h2>
                        <p><span>推荐</span>文章</p>
                    </h2>
                    <?php if(is_array($dailyList)): foreach($dailyList as $k=>$v): ?><div class="blogs">
                            <h3><a href="<?php echo U('Index/dailyContent',array('id'=>$v['id']),'',0);?>"><?php echo ($v['name']); ?></a></h3>
                            <figure><img src="/APP/Home/View/Public/images/0<?php echo ($k%4+1); ?>.jpg" ></figure>
                            <ul>
                                <p><?php echo ($v['content']); ?></p>
                                <a href="<?php echo U('Index/dailyContent',array('id'=>$v['id']),'',0);?>" class="readmore">阅读全文&gt;&gt;</a>
                            </ul>
                            <?php $total = getCountComment($v['id']);?>
                            <p class="autor"><span>作者：<?php echo ($v['author']); ?></span><span>分类：【<a href="/"><?php echo ($v['typeName']); ?></a>】</span><span>评论（<a href="/"><?php echo $total;?></a>）</span></p>
                            <div class="dateview"><?php echo ($v['c_time']); ?></div>
                        </div><?php endforeach; endif; ?>
                </div>
            </article>
              <aside>
    <div class="avatar"><a href="<?php echo U('Index/about','','',0);?>"><span>关于我</span></a></div>
    <div class="topspaceinfo">
      <h1>完完整整来，零零碎碎去....</h1>
      <p>回头望望，地上满满的写作愚蠢两个字...</p>
    </div>
    <div class="about_c">
      <p>网名：狼慯 </p>
      <p>职业：PHP开发工程师</p>
      <p>籍贯：四川省达州市</p>
      <p>电话：18127305844</p>
      <p>邮箱：chenhailong328@qq.com</p>
    </div>
    <!--
    <div class="bdsharebuttonbox"><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
    -->
    <div class="tj_news">
      <h2>
        <p class="tj_t1">最新文章</p>
      </h2>
        <?php  $newDaily = M("daily")->where("status = 1") ->order("c_time desc") -> limit(8)->field('name,id')->select(); ?>
      <ul>
          <?php foreach($newDaily as $k=>$v):?>
          <li><a href="<?php echo U('Index/dailyContent',array('id'=>$v['id']),'',0);?>"><?php echo $v['name']?></a></li>
        <?php endforeach;?>
      </ul>
      <h2>
        <p class="tj_t2">推荐文章</p>
      </h2>
         <?php  $newDaily = M("daily")->where("status = 1 and is_recommend = 1") ->order("c_time desc") -> limit(8)->field('name,id')->select(); ?>
      <ul>
        <?php foreach($newDaily as $k=>$v):?>
        <li><a href="<?php echo U('Index/dailyContent',array('id'=>$v['id']),'',0);?>"><?php echo $v['name']?></a></li>
        <?php endforeach;?>
      </ul>
    </div>
    <div class="links">
      <h2>
        <p>友情链接</p>
      </h2>
      <ul>
        <li><a href="http://localhost/blog/index.php/Home/Index/index">陈海龙个人博客</a></li>
        <li><a target="__blank" href="http://user.qzone.qq.com/501986411?ADUIN=991738189&ADSESSION=1432348860&ADTAG=CLIENT.QQ.5395_FriendInfo_PersonalInfo.0&ADPUBNO=26438&ptlang=2052">陈海龙QQ空间</a></li>
      </ul>
    </div>
    <div class="copyright">
      <ul>
        <p> Made By <a href="/">Knight</a></p>
        <p>2015年5月20日</p>
        </p>
      </ul>
    </div>
  </aside>
   <script type="text/javascript" src="/APP/Home/View/Public/js/silder.js"></script>
  <div class="clear"></div>
  <!-- 清除浮动 --> 

        </div>
    </body>
</html>
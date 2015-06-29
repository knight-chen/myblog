<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>关于我</title>
<meta name="keywords" content="个人博客模板,博客模板,响应式" />
<link href="/APP/Home/View/Public/css/base.css" rel="stylesheet">
<link href="/APP/Home/View/Public/css/about.css" rel="stylesheet">
<link href="/APP/Home/View/Public/css/media.css" rel="stylesheet">
<link href="/APP/Home/View/Public/css/index.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
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
       <div class="banner">
  <ul class="texts">
    <p>The best life is use of willing attitude, a happy-go-lucky life. </p>
    <p>最好的生活是用心甘情愿的态度，过随遇而安的生活。</p>
  </ul>
</div>
    <h3 class="about_h">您现在的位置是：<a href="<?php echo U('Index/index','','',0);?>">首页</a>><a href="<?php echo U('Index/about','','',0);?>">关于我</a></h3>
    <div class="about">
      <h2>Just about me</h2>
      <ul>
        <p>陈海龙，男，23岁，一个喜欢安静，看书，看电影的人。在生活中一直准许这着自己的生活态度：用心甘情愿的态度去过随遇而安的生活。生活中很多事情不可强求，谁也不知道明天会发生什么，人能够控制的只有自己。</p>
        <p>当我还是一个学生时，我无数次的幻想着未来的生活方式，如：每天穿着西装，打着领带坐在办公室里面指点江山；也有投身军旅，挥汗如雨，报价卫国的豪情...。但是，生活却不是想象出来的，当我现在真正的离开学校，投生社会这个打圈子里面时，才会发现当初的想法是多么的可笑和不切实际。</p>
        <p>刚刚出生社会，面对一次一次的碰壁，一次一次的尝试，最终我走上了技术之路。在这条路上，我摸爬滚打将近一年，在这一年中，我要感谢那些在我遇到问题是，给予我帮助的人，也要感谢那些，在我放弃或者骄傲是鼓励和打击我的人，让我一直保持着对技术的追求欲望...</p>
      </ul>
      <!--
      <h2>About my blog</h2>
      
      <ul class="blog_a">
        <p>域  名：www.yangqq.com 创建于2011年01月12日 <a href="http://www.net.cn/domain/" class="blog_link" target="_blank">注册域名</a><a class="blog_link" href="http://koubei.baidu.com/womc/s/www.yangqq.com" target="_blank">邀你点评</a></p>
        <p>服务器：阿里云服务器<a href="http://www.aliyun.com/product/ecs/?ali_trackid=2:mm_11085263_4976026_15602229:1389838528_3k2_34164590" class="blog_link" target="_blank">购买空间</a><a href="/jstt/web/2014-01-18/644.html" target="_blank" class="blog_link" >参考我的空间配置</a></p>
        <p>程  序：PHP 帝国CMS7.0</p>
        <p>微信公众号：wwwyangqqcom</p>
      </ul>
      -->
    </div>
  </article>
</div>
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
 
</body>
</html>
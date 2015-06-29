<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        
            <style type="text/css">
.STYLE {
	font-size: 12px;
	color: #000000;
}
.STYLE5 {font-size: 12}
.STYLE7 {font-size: 12px; color: #FFFFFF; }
.STYLE7 a{font-size: 12px; color: #FFFFFF; }
a img {
	border:none;
}
</style>
<script>
    var cancel_url="<?php echo $_SERVER[HTTP_REFERER];?>";
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="57" background="/blog/APP/Admin/View/Public/images/main_03.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       
        <td width="378" height="57" background="/blog/APP/Admin/View/Public/images/main_01.gif">&nbsp;</td>
        
        <td>&nbsp;</td>
        <td width="281" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="33" height="27"><img src="/blog/APP/Admin/View/Public/images/main_05.gif" width="33" height="27" /></td>
            <td width="248" background="/blog/APP/Admin/View/Public/images/main_06.gif"><table width="225" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <!--  
                <td height="17"><div align="right"><a href="pwd.php" target="rightFrame"><img src="/blog/APP/Admin/View/Public/images/pass.gif" width="69" height="17" /></a></div></td>
                <td><div align="right"><a href="user.php" target="rightFrame"><img src="/blog/APP/Admin/View/Public/images/user.gif" width="69" height="17" /></a></div></td>
                -->
                <td><div align="right"><a href="<?php echo U('Index/logout');?>" target="_parent"><img src="/blog/APP/Admin/View/Public/images/quit.gif" alt=" " width="69" height="17" /></a></div></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="40" background="/blog/APP/Admin/View/Public/images/main_10.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <!--
        <td width="194" height="40" background="/blog/APP/Admin/View/Public/images/main_07.gif">&nbsp;</td>
        -->
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="21"><img src="/blog/APP/Admin/View/Public/images/main_13.gif" width="19" height="14" /></td>
            <td width="35" class="STYLE7"><div align="center"><a href="<?php echo U('Index/index','','',0);?>">首页</a></div></td>
            <td width="21" class="STYLE7"><img src="/blog/APP/Admin/View/Public/images/main_15.gif" width="19" height="14" /></td>
            <td width="35" class="STYLE7"><div align="center"><a href="javascript:history.go(-1);">后退</a></div></td>
            <td width="21" class="STYLE7"><img src="/blog/APP/Admin/View/Public/images/main_17.gif" width="19" height="14" /></td>
            <td width="35" class="STYLE7"><div align="center"><a href="javascript:history.go(1);">前进</a></div></td>
            <td width="21" class="STYLE7"><img src="/blog/APP/Admin/View/Public/images/main_19.gif" width="19" height="14" /></td>
            <td width="35" class="STYLE7"><div align="center"><a href="javascript:window.parent.location.reload();">刷新</a></div></td>
            <!-- <td width="21" class="STYLE7"><img src="/blog/APP/Admin/View/Public/images/main_21.gif" width="19" height="14" /></td>
           <td width="35" class="STYLE7"><div align="center"><a href="http://www.51bcw.com" target="_parent">帮助</a></div></td> 
           -->
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <!--
        <td width="248" background="/blog/APP/Admin/View/Public/images/main_11.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="16%"><span class="STYLE5"></span></td>
            <td width="75%"><div align="center"><span class="STYLE7">By 51bcw.com (<a href="http://www.51bcw.com" target="_blank">www.51bcw.com</a>)</span></div></td>
            <td width="9%">&nbsp;</td>
          </tr>
        </table></td>
        -->
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30" background="/blog/APP/Admin/View/Public/images/main_31.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="8" height="30"><img src="/blog/APP/Admin/View/Public/images/main_28.gif" width="10" height="30" /></td>
        <td width="147" background="/blog/APP/Admin/View/Public/images/main_29.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%">&nbsp;</td>
            <td width="43%" height="20" valign="bottom" class="STYLE">管理菜单</td>
            <td width="33%">&nbsp;</td>
          </tr>
        </table></td>
        <td width="39"><img src="/blog/APP/Admin/View/Public/images/main_30.gif" width="39" height="30" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="20" valign="bottom"><span class="STYLE">当前登录用户：<?php echo cookie('username');?>&nbsp;用户角色：管理员</span></td>
            <td valign="bottom" class="STYLE1"><div align="right"></div></td>
          </tr>
        </table></td>
        <td width="17"><img src="/blog/APP/Admin/View/Public/images/main_32.gif" width="22" height="30" /></td>
      </tr>
    </table></td>
  </tr>
</table>

            <script>
                var point_msg='请输入名称';
                var url = '<?php echo U("Daily/add_daily_type",'','',0);?>';
            </script>
            <script type="text/javascript" src="/blog/APP/Admin/View/Public/js/jquery_1.js"></script>
            <!--<script type="text/javascript" src="/blog/APP/Admin/View/Public/js/jquery.js"></script>-->
            <script type="text/javascript" src="/blog/APP/Admin/View/Public/js/chili-1.7.pack.js"></script>
            <script type="text/javascript" src="/blog/APP/Admin/View/Public/js/jquery.easing.js"></script>
             <script type="text/javascript" src="/blog/APP/Admin/View/Public/js/jquery.dimensions.js"></script>
            <script type="text/javascript" src="/blog/APP/Admin/View/Public/js/jquery.accordion.js"></script>
            <script type="text/javascript" src="/blog/APP/Admin/View/Public/js/my.jquery.js"></script>
        
    </head>
    <script language="javascript">
        jQuery().ready(function () {
            jQuery('#navigation').accordion({
                header: '.head',
                navigation1: true,
                event: 'click',
                fillSpace: true,
                animated: 'bounceslide'
            });
        });
    </script>
    <style type="text/css">
        #navigation {
            margin:0px;
            padding:0px;
            width:147px;
        }
        #navigation a.head {
            cursor:pointer;
            background:url(/blog/APP/Admin/View/Public/images/main_34.gif) no-repeat scroll;
            display:block;
            font-weight:bold;
            margin:0px;
            padding:5px 0 5px;
            text-align:center;
            font-size:12px;
            text-decoration:none;
        }
        #navigation ul {
            border-width:0px;
            margin:0px;
            padding:0px;
            text-indent:0px;
        }
        #navigation li {
            list-style:none; display:inline;
        }
        #navigation li li a {
            display:block;
            font-size:12px;
            text-decoration: none;
            text-align:center;
            padding:3px;
        }
        #navigation li li a:hover {
            background:url(/blog/APP/Admin/View/Public/images/tab_bg.gif) repeat-x;
            border:solid 1px #adb9c2;
        }
    </style>
    <body style=' margin: 0; '>
        
            <table style="border-spacing:0px;">
                <tr>
                    <td width="8" bgcolor="#353c44">&nbsp;</td>
                    <td width="147" valign="top" style="margin-left: 0px">
                        <!--左侧导航栏-->
                        <script language="javascript">
	jQuery().ready(function(){
		jQuery('#navigation').accordion({
			header: '.head',
			navigation1: true, 
			event: 'click',
			fillSpace: true,
			animated: 'bounceslide'
		});
	});
</script>
<style type="text/css">
#navigation {
	margin:0px;
	padding:0px;
	width:147px;
}
#navigation a.head {
	cursor:pointer;
	background:url(/blog/APP/Admin/View/Public/images/main_34.gif) no-repeat scroll;
	display:block;
	font-weight:bold;
	margin:0px;
	padding:5px 0 5px;
	text-align:center;
	font-size:12px;
	text-decoration:none;
}
#navigation ul {
	border-width:0px;
	margin:0px;
	padding:0px;
	text-indent:0px;
}
#navigation li {
	list-style:none; display:inline;
}
#navigation li li a {
	display:block;
	font-size:12px;
	text-decoration: none;
	text-align:center;
	padding:3px;
}
#navigation li li a:hover {
	background:url(/blog/APP/Admin/View/Public/images/tab_bg.gif) repeat-x;
        border:solid 1px #adb9c2;
}
</style>
<div  style="height:500px;width: 147px;margin-left: 0;">
  <ul id="navigation">
      <li> <a class="head">分类管理</a>
      <ul>
          <li><a href="<?php echo U('Daily/add_daily_type','','',0);?>">添加日志分类</a></li>
          <li><a href="<?php echo U('Daily/daily_type_init','','',0);?>">查看日志分类</a></li>
      </ul>
    </li>
    <li> <a class="head">日志管理</a>
      <ul>
        <li><a href="<?php echo U('Daily/add_daily','','',0);?>" >添加日志</a></li>
        <li><a href="<?php echo U('Daily/daily_list','','',0);?>">日志列表</a></li>
        <li><a href="<?php echo U('Daily/draft_list','','',0);?>">草稿列表</a></li>
      </ul>
    </li>
    <li> <a class="head">照片管理</a>
      <ul>
        <li><a href="<?php echo U('Photo/add_photo_album','','',0);?>">添加相册</a></li>
        <li><a href="<?php echo U('Photo/album_init','','',0);?>">查看相册</a></li>
      </ul>
    </li>
    <li> <a class="head">留言评论管理</a>
      <ul>
        <li><a href="<?php echo U('Comment/getMessageList','','',0);?>">查看/删除留言</a></li>
        <li><a href="<?php echo U('Comment/getCommentList','','',0);?>">查看/删除评论</a></li>
      </ul>
    </li>
    <!--
    <li> <a class="head">友情链接管理</a>
      <ul>
        <li><a href="AddLink.php" target="rightFrame">添加友情链接</a></li>
        <li><a href="Links.php" target="rightFrame">查看/修改友情链接</a></li>
      </ul>
    </li>
    <li> <a class="head">版本信息</a>
      <ul>
        <li><a href="http://www.51bcw.com" target="_blank">by 51bcw.com</a></li>
      </ul>
    </li>
    -->
  </ul>
</div>

                    </td>
                    <td width="10" bgcolor="#add2da">&nbsp;</td>
                    <td valign="top" style="margin-top: 0px;width: 1150px">
                        <!--右侧显示页面内容-->
                        <div width='1169px'>
                            <table width="1170px" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
                                <tr>
                                    <th width="50px" height="20" bgcolor="d3eaef" >编号</th>
                                    <th width="100px" height="20" bgcolor="d3eaef" >名称</th>
                                    <th width="200px" height="20" bgcolor="d3eaef">创建时间</th>
                                    <th width="300px" height="20" bgcolor="d3eaef">日志类别</th>
                                    <th width="200px" height="20" bgcolor="d3eaef">作者</th>
                                    <th width="200px" height="20" bgcolor="d3eaef">权限</th>
                                    <th width="200px" height="20" bgcolor="d3eaef">管理操作</th>
                                </tr>
                                <?php if(is_array($daily_list)): foreach($daily_list as $key=>$v): ?><tr border="0" cellpadding="0" cellspacing="1" align="center" bgcolor="#FFFFFF">
                                        <td id='daily_type_id'><?php echo ($v['id']); ?></td>
                                        <td><?php echo ($v['name']); ?></td>
                                        <td><?php echo (date('Y-m-d',$v['c_time'])); ?></td>
                                        <td><?php echo ($v['type']); ?></td>
                                        <td><?php echo ($v['author']); ?></td>
                                        <td><?php echo ($v['permission']); ?></td>
                                        <td><a href="<?php echo U('Daily/update_daily',array('dailyId'=>$v['id']),'',0);?>">修改</a>|<a href="javascript:void(0);" onclick="delete_daily(<?php echo ($v['id']); ?>)" id='delete_daily'>删除</a>|<a href="<?php echo U('Daily/show_daily',array('dailyId'=>$v['id']),'',0);?>">查看</a></td>
                                    </tr><?php endforeach; endif; ?>
                            </table>
                             <div style="text-align: center;margin-top: 10px;font-size: 18px;"><?php echo ($pageList); ?></div>
                        </div>
                    </td>
                    <td width="8" bgcolor="#353c44">&nbsp;</td>
                </tr>
            </table>
<script>
//删除日志
    function delete_daily(dailyId){
        var url="<?php echo U('Daily/delete_daily');?>";
        $.post(
        url,
        {
            dailyId:dailyId
        },
        function(data){
            if(data) window.location=data;
            else alert("你没有删除权限");
        },'json');
    }
</script>
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td background="/blog/APP/Admin/View/Public/images/main_71.gif"  style="line-height:11px; table-layout:fixed" width="165">&nbsp;</td>
    <td background="/blog/APP/Admin/View/Public/images/main_72.gif"  style="line-height:11px; table-layout:fixed">&nbsp;</td>
    <td background="/blog/APP/Admin/View/Public/images/main_74.gif"  style="line-height:11px; table-layout:fixed" width="17">&nbsp;</td>
  </tr>
</table>

  
    </body>
</html>
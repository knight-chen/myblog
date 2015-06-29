<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>相册列表</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="/blog/APP/Admin/View/Public/js/jquery_1.js"></script>
    <!--<script type="text/javascript" src="/blog/APP/Admin/View/Public/js/jquery.js"></script>-->
    <script type="text/javascript" src="/blog/APP/Admin/View/Public/js/chili-1.7.pack.js"></script>
    <script type="text/javascript" src="/blog/APP/Admin/View/Public/js/jquery.easing.js"></script>
    <script type="text/javascript" src="/blog/APP/Admin/View/Public/js/jquery.dimensions.js"></script>
    <script type="text/javascript" src="/blog/APP/Admin/View/Public/js/jquery.accordion.js"></script>
    <script type="text/javascript" src="/blog/APP/Admin/View/Public/js/my.jquery.js"></script>
    <script type="text/javascript" src="/blog/Ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/blog/Ueditor/ueditor.all.js"></script>
    <link rel="stylesheet" href="/blog/Ueditor/themes/default/css/ueditor.css"/>
    <link rel="stylesheet" href="/blog/Ueditor/themes/iframe.css"/>
</head>
<style>
     *{border: 0px;margin: 0px;}
    .right{width:1171px;height:505px;position:relative;}
    .album_init li{display: inline-block;width:160px;height: 200px;border: solid #dfdfdf 2px;list-style-type: none;margin-right: 10px;margin-top: 10px;position: relative;}
    .album_cover img{display: block;position: absolute;width:150px;height: 150px;text-align:center;left: 5px;top: 5px;}
    .album_name{display:block;position:absolute;left:0px;bottom: 5px;font-size: 14px; text-decoration: none;}
    .album_auth{display:block;position:absolute;right: 0px;bottom:5px;width: 30px;height: 30px;}
    .locked{background-image: url("/blog/APP/Admin/View/Public/images/locked.jpg");}
    .nolocked{background-image: url("/blog/APP/Admin/View/Public/images/nolocked.jpg");}
    .album_option{display: block;position: absolute;top: 0px;right: 0px;background-image: url("/blog/APP/Admin/View/Public/images/lable.png");width: 20px;height: 20px;}
    .photo_option button{width:134px;height: 40px; padding: 0px; border: solid 2px #ADD8E6;background-color: #ADD8E6;margin-left: 40px;margin-top: 5px;font-size: 16px;}
    /*#edui1{display: none;}*/
</style>
<body>
    <table style="margin: 0"> 
        <tr><style type="text/css">
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
</tr>
    <tr>
    <table border='0' cellspacing="0" cellpadding="0" padding='0' >
        <tr>
            <td width="8" bgcolor="#353c44">&nbsp;</td>
            <td>
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
        <td>
         
            <div class="right">
                <div class="photo_option">
                    <button id="up_photo">上传照片</button>
                    <input type="hidden" value="" id="photo_path" />
                </div>
                
                <ul class="album_init">
                    <?php if(is_array($albumList)): foreach($albumList as $k=>$v): ?><li>
                        <a href="javascript:void(0);" class="album_option"></a>
                    <?php if(empty($v['cover'])): ?><a href="<?php echo U('Photo/photo_init',array('album_id'=>$v['id']),'',0);?>" class="album_cover"><img src="/blog/APP/Admin/View/Public/images/cover.jpg"/></a>
                    <?php else: ?>
                    <a href="<?php echo U('Photo/photo_init',array('album_id'=>$v['id']),'',0);?>" class="album_cover"><img src="<?php echo ($v['cover']); ?>"/></a><?php endif; ?>
                        <a href="" class="album_name" title="<?php echo ($v['name']); ?>"><?php echo ($v['name']); ?></a>
                        <a href="javascript:void(0);" class="album_auth" data-url="<?php echo U('Photo/update_album_authority','','',0);?>" data-title="<?php echo ($v['authority']); ?>" data-id="<?php echo ($v['id']); ?>"></a>
                        
                    </li><?php endforeach; endif; ?>
                <ul>
                    <div style="text-align: center;margin-top: 10px;font-size: 18px;"><?php echo ($pageList); ?></div>
            </div>
        
        </td>
        <td width="8" bgcolor="#353c44">&nbsp;
        </td>
        </tr>
    </table>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td background="/blog/APP/Admin/View/Public/images/main_71.gif"  style="line-height:11px; table-layout:fixed" width="165">&nbsp;</td>
    <td background="/blog/APP/Admin/View/Public/images/main_72.gif"  style="line-height:11px; table-layout:fixed">&nbsp;</td>
    <td background="/blog/APP/Admin/View/Public/images/main_74.gif"  style="line-height:11px; table-layout:fixed" width="17">&nbsp;</td>
  </tr>
</table>


<script>
    $(function(){
        var _editor = UE.getEditor('upload_ue');
        _editor.ready(function () {
            //设置编辑器不可用
//            _editor.setDisabled();
            //隐藏编辑器，因为不会用到这个编辑器实例，所以要隐藏
            _editor.setHide();
            //侦听图片上传
            _editor.addListener('beforeInsertImage', function (t, arg) {
                //将地址赋值给相应的input
                $.each(arg,function(k,v){
                    if(k!==0){
                        var value= $("#photo_path").val();
                        $("#photo_path").val(value+v.src+";");
                    }else{
                        $("#photo_path").val(v.src+";");
                    }
                });
                var jsonarg=JSON.stringify(arg);
                
                
                $.post("<?php echo U('Photo/add_photo','','',0);?>",
                {info:jsonarg},
                function(data){
                    if(data==1){
                        window.location.href="<?php echo U('Photo/set_photo_info','','',0);?>"
                    }
                },'json');
            });
        });
         //弹出图片上传的对话框
        $("#up_photo").click(function(){
            var myImage = _editor.getDialog("insertimage");
            myImage.open();
        });
    });
    
    
    
    $(function(){
        $('.album_auth').each(function(){
            if($(this).attr("data-title")==='1'){
               $(this).addClass("nolocked");
            }else{
               $(this).addClass("locked"); 
            }  
        });
        $(".album_auth").each(function(){
            //var url="http://localhost/blog/index.php/Admin/Photo/update_album_authority";
            $(this).click(function(){
                var albumid=$(this).attr("data-id");
                var authid=$(this).attr("data-title");
                var url = $(this).attr("data-url");
                if($(this).attr("data-title")===1){
                    authid=0;
                }
                $.post(url,
                {id:albumid,authority:authid},
                function(data){
                    if(data !== false){
                        location.reload();
                    }else{
                        alert("无权操作");
                    }
                },'json');
                
            });
        });
    });
</script>
<script type="text/plain" id="upload_ue"></script>
</body>

</html>
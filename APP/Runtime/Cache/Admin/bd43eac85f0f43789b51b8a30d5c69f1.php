<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
    <HEAD>
        <TITLE>后台管理系统登录</TITLE>
        <META http-equiv=Content-Type content="text/html; charset=utf8">
        <STYLE>
            TD {
                FONT-SIZE: 11px; COLOR: #000000; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serIf; TEXT-DECORATION: none
            }
            .input_1 {
                BORDER-RIGHT: #999999 1px solid; PADDING-RIGHT: 2px; BORDER-TOP: #999999 1px solid; PADDING-LEFT: 2px; LIST-STYLE-POSITION: inside; FONT-SIZE: 12px; PADDING-BOTTOM: 2px; MARGIN-LEFT: 10px; BORDER-LEFT: #999999 1px solid; COLOR: #333333; PADDING-TOP: 2px; BORDER-BOTTOM: #999999 1px solid; FONT-FAMILY: Arial, Helvetica, sans-serIf; LIST-STYLE-TYPE: none; HEIGHT: 18px; BACKGROUND-COLOR: #dadedf
            }
        </STYLE>
        <META content="MSHTML 6.00.6000.16705" name=GENERATOR>
    </HEAD>
    <body>
        <TABLE cellSpacing=0 cellPadding=0 width=651 align=center border=0>
            <TBODY>

                <tr>
                    <td height=50></td>
                </tr>
                <tr>
                    <td height=351><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                            <TBODY>

                                <tr>
                                    <td width=15 height=43>
                                        <img src="/blog/APP/Admin/View/Public/images/ileft.gif">
                                    </td>
                                    <td width=620 style="background-image:url(/blog/APP/Admin/View/Public/images/i_topbg2.gif)">
                                        <img height=43 src="/blog/APP/Admin/View/Public/images/i_top1.gif" width=43>
                                    </td>
                                    <td width=16>
                                        <img height=43 src="/blog/APP/Admin/View/Public/images/iright.gif" width=16>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-image:url(/blog/APP/Admin/View/Public/images/ileftbg.gif) "></td>
                                    <td Align=center style=" background-image:url(/blog/APP/Admin/View/Public/images/bg.gif)" height=279>
                                        <table  style="height:109;cellSpacing:0;cellPadding:0;width:369;border:0;align:center">
                                            <tbody>

                                                <tr>
                                                    <td width=155>
                                                        <img src="/blog/APP/Admin/View/Public/images/logo.jpg" style=" width: 155;height: 140; border: 0" useMap="#Map">
                                                    </td>
                                                    <td vAlign=top align=left width=214>
                                                        <table style=" cellspacing:0;cellPadding:0;width:167;border:0">
                                                            <tbody>

                                                                <tr>
                                                                    <td style=" text-align: center;width: 167;height: 30">
                                                                        <img src="/blog/APP/Admin/View/Public/images/adminsyteam.gif" style=" height: 19;width: 154;border: 0">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height=123>
                                                                        <table style="width:171px;height:109;cellspacing:0;cellPadding:0;text-align: center;border:0 ">
                                                                            <form action="<?php echo U('Index/login','','',0);?>" method='post'>
                                                                                <tr>
                                                                                    <td vAlign=bottom align=left width=44 height=28>
                                                                                        <div align=right>
                                                                                            <!--
                                                                                            <img height=14 src="/blog/APP/Admin/View/Public/images/id.gif" width=43>
                                                                                            -->
                                                                                             <sqan>ID:</span>
                                                                                        </div>
                                                                                    </td>
                                                                                                                                                          
                                                                                    <td vAlign=bottom align=left width=114 height=28> 
                                                                                        <input class="input_1" type="text" id="username" size=15 name="info[usernumber]">              
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align=left height=20>
                                                                                        <div align=right>
                                                                                            <!--
                                                                                            <img height=14 src="/blog/APP/Admin/View/Public/images/pass.gif" width=43>
                                                                                               -->
                                                                                               <sqan width=43>密码:</span>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td height=20>
                                                                                        <input class="input_1" id="password" type="password" size=15 name="info[password]">
                                                                                    </td>                     
                                                                                </tr>
                                                                                <tr>
                                                                                    <td Align=center colSpan=2 height=25>
                                                                                        <div align=center>
                                                                                            <input type="image" src="/blog/APP/Admin/View/Public/images/b_login.gif" name="dosubmit"><!--<span style="margin-left: 40px; text-align: center;"><a href="<?php echo U('Index/register','','',0);?>">注册账号...</a></span>-->
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </form>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td style=" background-image:url(/blog/APP/Admin/View/Public/images/irightbg.gif)"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <img height=29 src="/blog/APP/Admin/View/Public/images/i_bottom_left.gif" width=15>
                                    </td>
                                    <td style="background-image:url(/blog/APP/Admin/View/Public/images/i_bottom_bg.gif) " ></td>
                                    <td width=16>
                                        <img height=29 src="/blog/APP/Admin/View/Public/images/i_bottom_right.gif" width=16>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height=1></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </body>
</HTML>
<?php
function p($data){
   if(is_array($data)||  is_object($data)){
       dump($data,'1','<pre>',0);
   }else{
       if(is_string($data)){
           echo $data;
       }else{
           var_dump($data);
       }
   }
    
}
/**
 * 过滤所有的Html，js,css 标记
 * @author Knigt
 * @param string $str
 * @return string $str
 * 
 */
function filterHtml($str)
{
    $str = html_entity_decode($str);
    $str = preg_replace( "@<script(.*?)</script>@is", "", $str ); 
    $str = preg_replace( "@<iframe(.*?)</iframe>@is", "", $str ); 
    $str = preg_replace( "@<style(.*?)</style>@is", "", $str ); 
    $str = preg_replace( "@<(.*?)>@is", "", $str ); 
    return $str;
}
/**
 * 截取中文字符串
 * @param type $str 源字符串
 * @param type $start 截取开始位置
 * @param type $length 截取长度
 * @param type $charset 字符编码 默认utf-8
 * @param type $suffix 是否在截取末尾添加省略号 ture加上，false不加；默认true
 * @return type
 */
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true) {
    if(function_exists("mb_substr"))
        $slice = mb_substr($str, $start, $length, $charset);
    elseif(function_exists('iconv_substr')) {
        $slice = iconv_substr($str,$start,$length,$charset);
        if(false === $slice) {
            $slice = '';
        }
    }else{
        $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
    }
    return $suffix ? $slice.'...' : $slice;
 }
 
 function getCountComment($dailyId)
 {
    $where = "dailyid=".$dailyId;
    $total = M("daily_comment")->where($where)->count();
    return $total; 
 }

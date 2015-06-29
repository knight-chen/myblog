//function change_right(controller,func){
//    var xmlhttp;
//    var url="__MODULE__"+'/'+controller+'/'+func;
//    if (controller == '' || func == '') {
//        return;
//    }
//    //实例化XMLHttpRequest对象
//    if (window.XMLHttpRequest){
//        // code for IE7+, Firefox, Chrome, Opera, Safari
//        xmlhttp = new XMLHttpRequest();
//    }
//    else{
//        // code for IE6, IE5
//        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//    }
//  /**
//   * onreadystatechange 是一个事件句柄。
//   * 它的值 (state_Change) 是一个函数的名称，
//   * 当 XMLHttpRequest 对象的状态发生改变时，会触发此函数。
//   * 状态(readyState)从 0 (uninitialized) 到 4 (complete) 进行变化。仅在状态为 4 时，我们才执行代码。
//   * 
//   */
//    xmlhttp.onreadystatechange=function(){
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
//        {
//            document.getElementById("admin_right").innerHTML = xmlhttp.responseText;
//        }
//    }
//    //open()第一个参数表示请求方式，第二个参数是请求的服务器地址，可以用相对地址和绝对地址
//    //第三个参数：true 异步，false 同步；
//    //True 表示脚本会在 send() 方法之后继续执行，而不等待来自服务器的响应。
//    xmlhttp.open('GET',url, true);//默认在当前控制器下面
//    xmlhttp.send();
//}   
function get_info(){
    var type_name=document.getElementById('type_name').value;
    if(type_name===''){
        document.getElementById('name_error').innerHTML="类名不能为空";
        return;
    }
    var c_time=document.getElementById('c_time').value;
    var descript=document.getElementById('descript').value;
    window.location="http://localhost/blog/index.php/Admin/Daily/add_daily_type";
}
function cancel(url){
    window.location=url;
}

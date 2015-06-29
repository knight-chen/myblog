//添加日志类表表单验证 及AJAX 提交
$(function () {
    //添加日志类别表单验证
    $('#type_name').focus(function () {
        var name_error = $('#name_error').text();
        if (name_error == point_msg && $('#type_name').val() == '') {
            point_msg = '请输入名称';
        }
        $('#name_error').text(point_msg);
    });
    //检查类别名称是否合法
    $('#type_name').blur(function () {
        var type_name = $('#type_name').val();
        var name_error = $('#name_error').text();
        if (type_name === '') {
            if (name_error == point_msg) {
                point_msg = '类名不能为空';
            }
        } else if (type_name.length > 8) {
            point_msg = '类名长度不能超过8';
        } else {
            point_msg = '输入正确';
        }
        $('#name_error').text(point_msg);
    });
    $('#dosubmit').click(function () {
        var type_name = $('#type_name').val();
        var c_time = $('#c_time').val();
        var descript = $('#descript').val();
        var typeid = $('#typeid').val();
        if ($('#typeid').val() !== undefined) {
            //修改日志类别信息异步提交
            $.post(
            url, 
            {   
                type_name: type_name, 
                c_time: c_time, 
                descript: descript,
                id: typeid
            },
            function (data) {
                if (data) {
                    location.href = data; 
                } else if (data == 0) {
                    alert('修改失败');
                }
            }, 'json');
        } else {
            $.post(url, {type_name: type_name, c_time: c_time, descript: descript},
            function (data) {
                if (data == 1) {
                    location.href = "daily_type_init";
                } else if (data == 0) {
                    alert('添加失败');
                }
            }, 'json');
        }
    });
});
//取消按钮，返回上级页面
$(function(){
    $('#btn_cancel').click(function(){
        location.href=cancel_url;
    });
});
//日记保存为草稿
$(function(){
   $('#btn_draft').click(function(){
       var name = $('#daily_name').val();
       var typeid=$('#daily_type').val();
       var c_time=$('#ctime').val();
       var author=$('#author').val();
       var permission=$('#permission').val();
       var content=ue.getContent();
       $.post(
               $('#daily_url').val(),
       {
           name:name,
           typeid:typeid,
           c_time:c_time,
           author:author,
           permission:permission,
           content:content
       },function(data){
           if(data) location.href=data;
           else alert('内容不能为空');
       },'json');
   }); 
});

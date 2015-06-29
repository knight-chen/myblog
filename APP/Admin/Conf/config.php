<?php
return array(
    //数据库连接参数
    'DB_TYPE'=>'mysql',
    'DB_CHARSET'=>'utf8',
    'DB_PORT'=>'3306',
    'DB_HOST'=>'127.0.0.1',
    'DB_USER'=>'root',
    'DB_PWD'=>'',
    'DB_NAME'=>'myblog',
    'DB_PREFIX'=>'mbg_',
    
    'URL_MODEL'=>1,
    //配置模板文件
    'TMPL_TEMPLATE_SUFFIX'=>'.html',
    //伪静态
    'URL_HTML_SUFFIX'=>'.HTML',
    //配置样式文件及css、imges、js文件路径 
    'TMPL_PARSE_STRING'=>array(
      '__PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Admin/View/Public', 
    ),
    'LOAD_EXT_FILE'=>'common',
    //启用路由
    'URL_ROUTER_ON' => true,
    //配置路由规则
    'URL_ROUTE_RULES'=>array(
        'news/:year/:month/:day' => array('News/archive', 'status=1'),
        'news/:id' => 'News/read',
        'news/read/:id' => '/news/:1',
        ),
    //默认过滤函数
    'DEFAULT_FILTER'=>'htmlspecialchars'
);
<?php

//输出变量 
function p1($data) {
    if (is_array($data) || is_object($data)) {
        dump($data, '1', '<pre>', 0);
    } else {
        if (is_string($data)) {
            echo $data;
        } else {
            var_dump($data);
        }
    }
}

/**
 * get_daily_type
 * @param $typeId 日志类别Id
 * @return string 日志类别名称
 */
function get_daily_type($typeId) {
    $typeDb = M('daily_type');
    $typeName = $typeDb->where('id=' . $typeId)->field('type_name')->find();
    return $typeName['type_name'];
}

/**
 * get_permission
 * @param $permissionId 权限ID
 * @return string 权限名称
 */
function get_permission($permissionId) {
    $permissionDb = M('permission');
    $permission = $permissionDb->where('id=' . $permissionId)->field('permission')->find();
    return $permission['permission'];
}


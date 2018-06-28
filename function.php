<?php

// 树组转一维数组
function tree_to_list($tree, $child_name= 'children')
{

    while (!empty(current($tree)[$child_name])) {

        $children = current($tree)[$child_name];
        foreach ($children as $v) {
            array_push($tree, $v);
        }
        $key = key($tree);
        unset($tree[$key][$child_name]);
        next($tree);
    }
    return $tree;
}



$data[] = [
    'id' => '2',
    'pid' => '1',
    'name' => '沙坪坝区'
];

$data[] = [
    'id' => '3',
    'pid' => '2',
    'name' => '青木关镇'
];
$data[] = [
    'id' => '1',
    'pid' => '0',
    'name' => '重庆'
];
$data[] = [
    'id' => '4',
    'pid' => '1',
    'name' => '江北区'
];
$data[] = [
    'id' => '7',
    'pid' => '0',
    'name' => '四川'
];
$data[] = [
    'id' => '8',
    'pid' => '7',
    'name' => '成都'
];

$list = array_column($data, null, 'id');
$tree = [];

// 不停的找下层,直接找到最顶层
foreach ($list as $id => $v)
{
    if (isset($list[$v['pid']])) {
        $list[$v['pid']]['child'][] = & $list[$id];
    }
    if ($v['pid']== '0') {
        $tree[$id]=& $list[$id];
    }
}
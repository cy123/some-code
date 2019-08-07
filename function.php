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

// 树组转一维数组
function tree_to_list_v2($tree, $child_name= 'children')
{
    do {
        if (!empty(current($tree)[$child_name])) {
            $children = current($tree)[$child_name];
            foreach ($children as $v) {
                array_push($tree, $v);
            }
            $key = key($tree);
            unset($tree[$key][$child_name]);

        }
    } while (next($tree));
	return $tree;
}
$tree[] = [1,2,3];
$tree[] = [4,5,6];
$tree[] = [7,8,9];
$tree[2]['children'][] = [10,11,12];
$tree[2]['children'][0]['children'][] = [100,200,300];
$lists = tree_to_list_v2($tree);
var_dump($lists);die;
// 树形转一维
function set_list($tree, $child_name= 'children')
{
    $arr = [];
    foreach ($tree as $v) {

        if (!empty($v[$child_name])) {
            $children = set_list($v[$child_name]);
            if (!empty($children)) {
                $arr = array_merge($arr, $children);
            }
        }
        unset($v[$child_name]);
        $arr[] = $v;
    }
    return $arr;
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

// laravel

Profile::whereIn('profiles.id', function($query) use ($mac_address) {
    $query->from('devices')
        ->select('devices.profile_id')
        ->where('devices.mac_address', $mac_address);
})

<?php

include_once 'index.php';

//获取一个数组的指定keys(id,name)两列数据  期望值:['id' => 1, 'name' => 'xianglin']
$item = ['id' => 1, 'name' => 'xianglin', 'username' => '测试'];
$needKeys = ['id', 'name'];

function inArrayFunc(array $item, array $needKeys)
{
    $newItem = [];
    foreach ($item as $key => $val) {
        if (in_array($key, $needKeys)) {
            $newItem[$key] = $val;
        }
    }
    return $newItem;
}

//用PHP内置函数实现
function useArrayFunc(array $item, array $needKeys)
{

    return array_intersect_key($item, array_flip($needKeys));
}

pre(inArrayFunc($item, $needKeys));
// 结果 ['id' => 1, 'name' => 'xianglin']
pre(useArrayFunc($item, $needKeys));
// 结果 ['id' => 1, 'name' => 'xianglin']



////array_intersect_key — 使用键名比较计算数组的交集, 返回一个数组，该数组包含了所有出现在 array1 中并同时出现在所有其它参数数组中的键名的值。
//$arr1 = ['id' => 1, 'time' => time(), 'name' => 'jack', 'age' => 18];
//$arr2 = ['id' => 11, 'time' => '2020-08-05 20:27:49', 'name' => 'alice'];
//$arr3 = ['name' => 'bob'];
//pre(array_intersect_key($arr1, $arr2, $arr3));
////期望值: ['name' => 'jack']
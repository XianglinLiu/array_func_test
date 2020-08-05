<?php
include_once 'index.php';

//这里还是用刚刚的数据 移除一个数组的指定keys(id,name)两列数据  期望值:['username'=>'测试']
$item = ['id' => 1, 'name' => 'xianglin', 'username' => '测试'];
$removeKeys = ['id', 'name'];

function inArrayFunc(array $item, array $removeKeys)
{
    $newItem = [];
    foreach ($item as $key => $val) {
        if (!in_array($key, $removeKeys)) {
            $newItem[$key] = $val;
        }
    }
    return $newItem;
}

//用PHP内置函数实现
function useArrayFunc(array $item, array $removeKeys)
{
    return array_diff_key($item, array_flip($removeKeys));
}

pre(inArrayFunc($item, $removeKeys));
// 结果: ['username'=>'测试']
pre(useArrayFunc($item, $removeKeys));
// 结果: ['username'=>'测试']


//array_diff_key — 使用键名比较计算数组的差集, 返回一个数组，该数组包括了所有出现在 array1 中但是未出现在任何其它参数数组中的键名的值。
$arr1 = ['id' => 1, 'time' => time(), 'name' => 'jack', 'age' => 18];
$arr2 = ['id' => 11, 'time' => time()];
$arr3 = ['age' => 20];
pre(array_diff_key($arr1, $arr2, $arr3));
//期望值 ['name' => 'jack']
<?php
$arr = [1,1,1,1,1,1,1];
foreach ($arr as $key => &$value) {
    $value = rand(1, 20);
}
print_r($arr);

echo  array_search(max($arr), $arr);
echo array_search(min($arr), $arr);
$arr2 = $arr;

$arr2[ array_search(max($arr), $arr)] = min($arr);
$arr2[ array_search(min($arr), $arr)] = max($arr);
print_r($arr2);
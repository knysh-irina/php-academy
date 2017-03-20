<?php
$sum = 0;
$str = "123";
$arr = str_split($str);
print_r($arr);
foreach ($arr as $value){
    $sum += $value;
}
echo $sum;
<?php
$sum = 0;
$str = "442158755745";
$number = 5;
$arr = str_split($str);
foreach ($arr as $value){
    if ($value == $number )
    $sum += 1;
}
echo $sum;
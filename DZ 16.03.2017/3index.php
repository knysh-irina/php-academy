<?php

$str = "ASCII stands for American Standard Code for Information Interchange";
$arr = str_split($str);
foreach ($arr as &$val) {

    $val = chr(ord($val) + 3);
}
$str_converted = implode($arr);
print_r($str_converted);


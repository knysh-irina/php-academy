<?php
$arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой');
$en = [];
$ru = [];
foreach ($arr as $key => $value){
     array_push($en, $key);
    array_push($ru, $value);
}

print_r($en);
print_r($ru);

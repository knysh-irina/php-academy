<?php

$length = 100;
$array = new SplFixedArray($length);

for ($i=0; $i<$length; $i++ ){
    $array[$i] = rand(3,45);
}
var_dump($array);

<?php
$array = [];

for ($i = 0; $i < 10; $i++) {
    $array[$i] = rand(1, 10);
}
asort($array);

print_r($array);
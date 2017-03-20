<?php
$arr = array('green' => 'зеленый', 'red' => 'красный', 'blue' => 'голубой');

foreach ($arr as $value) {
    echo $value . "\n";
}

foreach ($arr as $key => $value) {
    echo $key . "\n";
}
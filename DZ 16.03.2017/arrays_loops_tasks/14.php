<?php
$arr = [4, 2, 5, 19, 13, 0, 10];
foreach ($arr as $value) {
    if (($value == 2) || ($value == 3) || ($value == 4)) {
        echo "есть!";
        break;
    } else {
        echo "Нет";
        break;
    }
}

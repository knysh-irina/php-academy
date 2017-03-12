<?php
$a = 135;
$b = 16;
$operator = '/';



switch ($operator) {
    case '+':
        echo $a + $b;
        break;
    case '-':
        echo $a - $b;
        break;
    case '*':
        echo $a * $b;
        break;
    case '/':
        if ($b = 0){
            echo "На 0 делить нельзя";
        } else { echo $a / $b;}
        break;
    case  '%':
        echo    $a % $b;
}

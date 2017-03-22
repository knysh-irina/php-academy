<?php


function factorial($num)
{
    for ($i = $num; $i > 1; $i--) {
        $num = $num * ($i - 1);
    }

    return $num;
}

echo factorial(5);
<?php


function factorial($n)
{
    if ($n == 1 || $n == 0) {
        return 1;
    }

    return $n * factorial($n-1);
}

echo factorial(4); // 1*2*3*4 = 24
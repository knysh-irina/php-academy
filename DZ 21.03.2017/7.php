<?php
// функция вычилсения факториала числа
function factorial($n)
{
    if ($n == 1 || $n == 0) {
        return 1;
    }

    return $n * factorial($n - 1);
}

// функция вычисляет сочетание
function sochetanie($total, $a)
{
    return factorial($total) / (factorial($a) * factorial($total - $a));
}

//функция опр. колличество способов
function comb($d, $b, $c)
{
    return sochetanie($d + $b + $c, $d) * sochetanie($b + $c, $b) * sochetanie($c, $c);
}

echo comb(3, 5, 12);
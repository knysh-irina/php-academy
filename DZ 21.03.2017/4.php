<?php


function day($day)
{
    $converter = [
        1 => 'понедельник',
        2 => 'вторник',
        3 => 'среда',
        4 => 'четвер',
        5 => 'пятница',
        6 => 'суббота',
        7 => 'воскресенье'
    ];

    return strtr($day, $converter);
}

echo day(5);
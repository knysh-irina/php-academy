<?php

function encode($str)
{
    $str_base = base64_encode($str);
    $f = fopen('code.txt', 'a');
    fwrite($f, $str_base. PHP_EOL);
    fclose($f);
}


$str = "This is an encoded string";

encode($str);

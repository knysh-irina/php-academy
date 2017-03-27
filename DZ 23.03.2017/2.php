<?php
function decode(){
    $str = file_get_contents("code.txt");
    $str_base = base64_decode($str);
    echo  $str_base;
}

decode();
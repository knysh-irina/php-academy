<?php
$str = "dhfhdhddhfthhf";

if (strlen($str) < 150) {
    echo $str;
} else {
    echo substr($str, 0, 150)."...";
}

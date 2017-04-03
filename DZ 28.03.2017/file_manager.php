<?php

if (isset($_GET['next'])) {
    $dir = __DIR__ . "/" . $_GET['next'];
    $dirMod = $_GET['next'] . "/";
} else {
    $dir = __DIR__;
    $dirMod = '';
}

$filesArr = scandir($dir);
if (__DIR__ != $dir) {
    echo "<a href = '?next=$dirMod/..'> .. </a><br>";
}


foreach ($filesArr as $file) {
    if (in_array($file, ['.', ".."])) continue;
    if (is_dir($file)) {
        echo "<a href='?next" . $dirMod . $file . "&prev= '$dir'> $file </a><br>";
    } else echo $file . "<br>";
}

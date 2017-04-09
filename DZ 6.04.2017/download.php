<?php


$decode = base64_decode($_GET['loc']);
$fileParts = end(explode("\\",$decode));
header('Content-Disposition: attachment ; filename ="'.$fileParts.'"');



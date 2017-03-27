<?php

function getCommonWords($a, $b)
{
    $arr1 = explode(" ", $a);
    $arr2 = explode(" ", $b);

    return array_uintersect($arr1, $arr2, "strcasecmp");


}
$data = $_POST;
$str1 = $data["test1"] ;
$str2 = $data["test2"] ;

print_r(getCommonWords($str1, $str2));


?>


<html>
<head>

</head>
<body>
<form action="" method="post">
    <textarea name="test1"></textarea>

    <textarea name="test2"></textarea>
    <input type="submit">

</form>

</body>
</html>


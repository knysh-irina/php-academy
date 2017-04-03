<?php

function getCommonWords($a, $b)
{
    $arr1 = explode(" ", $a);
    $arr2 = explode(" ", $b);

    return array_uintersect($arr1, $arr2, "strcasecmp");
}


if (!empty($_POST) ) {
    $str1 = $_POST["test1"];
    $str2 = $_POST["test2"];
   $common =  implode(" ", getCommonWords($str1, $str2)) ;
}

?>


<html>
<head>

</head>
<body>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <textarea name="test1" id="test1"></textarea>

    <textarea name="test2" id="test2"></textarea>
    <input type="submit">
    <br>
<?= $common ?>
</form>
</body>
</html>


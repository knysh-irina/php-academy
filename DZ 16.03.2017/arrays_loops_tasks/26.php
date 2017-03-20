<?php
$arr = [1,1,1,1,1,1,1];
$sum = 1;
foreach ($arr as $key => &$value) {
    $value = rand(1, 100);
    if ($key %2 == 0 ){
        $sum = $sum * $value;
    }
}
print_r($arr);
echo "Произведение = ". $sum. "\n";

foreach ($arr as $key => $value) {
    if (! ($key %2 == 0 )){
        echo $value. "\n";
    }
}
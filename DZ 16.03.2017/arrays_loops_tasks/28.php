
<?php
$row = 3;
$cols = 4;
$colors = array('red','yellow','blue','gray','maroon','brown','green');
$arr = [];
for ($i =0 ; $i<= $row ; $i++){
    for ($j =0 ; $j<= $cols ; $j++){
        array_push($arr[[$i][$j]],  rand(1, 40))  ;
    }
}
print_r($arr);

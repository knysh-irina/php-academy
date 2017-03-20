
<?php


$mat = [[0, 0, 0], [0, 1, 2], [0, 2, 4]];

for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        $kat[$i][$j] = $mat[$j][$i];


    }

}

print_r($kat);

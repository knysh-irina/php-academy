<?php
$row = 3;
$cols = 4;
$colors = array('red', 'yellow', 'blue', 'gray', 'maroon', 'brown', 'green');
$arr = [[], []];
for ($i = 0; $i < $row; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        $arr[$i][$j] = rand(1, 40);
    }
}
print_r($arr);
?>

<table>
    <?php foreach ($arr as $key => $value) : ?>
       <tr>
        <?php
        foreach ($value as $key2 => $item):
            $random = rand(0, 6);
            $color = $colors[$random];
            ?>



                <?= "<td style='background-color: $color' $random > ". $item ?>
            </td>

            <?php endforeach; ?>
       </tr>
    <?php
    endforeach; ?>
</table>

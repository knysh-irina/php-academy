<?php


$mat = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [1, 2, 3, 4],
    [1, 2, 3, 4]
];

$rang = [
    [1, 0, 0, 0],
    [0, 1, 0, 0],
    [0, 0, 0, 0],
    [0, 0, 0, 0]
];

 $rang_numeric = [
    ['',1, 2, 3, 4],
    [1, 1, 0, 0, 0],
    [2, 0, 1, 0, 0],
    [3, 0, 0, 0, 0],
    [4, 0, 0, 0, 0]
]


?>

<head></head>
<body>

    <table style="border: 1px solid black">
        <?php foreach ($rang_numeric as $key1 => $value) : ?>
        <tr >

           <?php foreach ($value as $key2 => $item): ?>

               <?php if ($key1 == $key2){
                   echo '<td style="background-color: aqua" >';
            } else {echo "<td>" ;}

                   ?>


                        <?= $item ?>

                </td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </table>


</body>




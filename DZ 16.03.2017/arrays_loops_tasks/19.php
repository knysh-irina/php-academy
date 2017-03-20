<?php
$days = range(1, 31);
$day = 20;

foreach ($days as $value):
    if ($value == $day):?>
        <b>
            <?= $value; ?>
        </b>
    <?php else: ?>

        <?= $value; ?>

    <?php endif;
endforeach; ?>
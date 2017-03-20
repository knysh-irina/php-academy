<?php
$holliday = 6;
$days = range(1, 31);
foreach ($days as $value):
    if ($value == $holliday): ?>
        <b>
                <?= $value;

                ?>
            </b>

        <?php
    elseif ($value == $holliday + 1) : ?>
        <b>
                <?= $value;
                $holliday += 7;
                ?>
            </b> <br>
        <?php
    else: ?>
        <?= $value; ?>

    <?php endif;
endforeach; ?>
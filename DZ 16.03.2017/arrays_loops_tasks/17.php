<?php
$month = "март";
$months = ["январь", "февраль" , "март", "апрель", "май"];
foreach ($months as $value):
  if ($value ==  $month):?>
     <p><b>
  <?= $value;?>
         </b></p>
 <?php else: ?>
     <p>
         <?=  $value;?>
     </p>
  <?php endif;
       endforeach; ?>


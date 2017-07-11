<?php
$time_start = microtime(true);
$length = 100;
$heap = new SplMaxHeap();
for ($i = 0; $i < $length; $i++) {
    $rand = rand(3, 14);
    $heap->insert($rand);
}
$time_end = microtime(true);
$time = $time_end - $time_start;
var_dump($heap);


$time_start2 = microtime(true);
$heap2 = new SplMaxHeap();
for ($i = 0; $i < $length; $i++) {
    $rand = rand(3, 14);
    $heap2->insert($rand);
}
$time_end2 = microtime(true);
$time2 = $time_end2 - $time_start2;
var_dump($heap2);

$time_start3 = microtime(true);
$heap3 = [];
for ($i = 0; $i < $length; $i++) {
    $heap3[$i] = rand(3, 14);
}
sort($heap3);
$time_end3 = microtime(true);
$time3 = $time_end3 - $time_start3;
var_dump($heap3);

echo "Execution time Max heap = " . number_format($time, 10, ',', ' ') . "c.";
echo "Execution time Min heap = " . number_format($time2, 10, ',', ' ') . "c.";
echo "Execution time array= " . number_format($time3, 10, ',', ' ') . "c.";


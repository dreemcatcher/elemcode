<?php
header("Content-Type: text/plain; charset=utf-8");
error_reporting(-1);
// Имитация броска кубика
echo "Бросаем кубик \n";
$throw = mt_rand(1, 6);
echo "Выпало $throw \n";
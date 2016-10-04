<?php
error_reporting(-1);

$dollars = 200; /* Число долларов */
$exchangeRate = 32.24; /* Курс обмена */
$roubles = $dollars*$exchangeRate;  /* А вот эту строчку надо дописать самому */

echo "$dollars долларов можно обменять на $roubles рублей";
?>
<?php
/**
 * W5.2 Некто кладет в банк 10000 р. Банк начисляет 10% годовых (то есть,
 * каждый год на счету становится на 10% больше, чем в прошлом году).
 * Напиши программу, считающую, через сколько лет в банке будет миллион?
 * Сколько лет будет этому некто? Доживет ли некто до этого дня, если сегодня ему 16 лет?
 */
header("Content-Type: text/plain; charset=utf-8");
$starterMoney = 10000;
$percent = 10;
$age = 16;

for ($i = 0; $starterMoney < 1000000; $i++) {

    $starterMoney = $starterMoney + ($starterMoney * ($percent / 100));
    echo round($starterMoney) . "<br>";
}

echo "Через " . $i . " лет, на счету будет миллион.<br>";
$resultage = $i + $age;
echo "Вкладчику исполнится " . $resultage . " лет.";
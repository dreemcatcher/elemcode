<?php
error_reporting(-1);

// Имитация броска кубика
echo "Человек кидает 2 кубика. \n";
$manThrowOne    = mt_rand(1, 6);
$manThrowSecond = mt_rand(1, 6);
$sumManThrow = $manThrowOne + $manThrowSecond;
echo "AI кидает 2 кубика. \n";
$AIThrowOne    = mt_rand(1, 6);
$AIThrowSecond = mt_rand(1, 6);
$sumAIThrow = $AIThrowOne + $AIThrowSecond;

// Если у человека и ИИ выпали даблы (одинаковые числа на обоих кубиках), то это большая удача, ничья и смысла играть дальше нет.
echo "Человек выбросил $manThrowOne и $manThrowSecond. AI выбросил $AIThrowOne и  $AIThrowSecond \n";
//тот, у кого сумма чисел больше, победил
if (($manThrowOne == $manThrowSecond) && ($AIThrowOne == $AIThrowSecond)) {
    echo "Большая удача! Выпали даблы у обоих игроков. Нет смысле играть дальше!";
} elseif ($sumManThrow > $sumAIThrow) {
    echo "Бросок человека лучше. Человек победил!";
} elseif ($sumManThrow < $sumAIThrow) {
    echo "Бросок AI лучше. AI победил!";
}
//(если одинаковая — победила дружба)
//op
//elseif ($sumManThrow = $sumAIThrow) {
else{
    echo "Победила дружба!";
}
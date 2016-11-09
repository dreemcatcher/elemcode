<?php
header("Content-Type: text/plain; charset=utf-8");
$credit = 40000;
$percent = 3;
$commission = 1000;
$mounthlyPayment = 5000;
$worthMoney = 0;
for ($i = 1; $i < 100; $i++) {
    $oversum = $credit + $commission + ($credit * ($percent / 100));
    echo "В этом месяце ваш долг равен " . $oversum . "\n";

    if ($oversum > $mounthlyPayment) {
        $credit = $oversum - $mounthlyPayment;
        $worthMoney += $mounthlyPayment;      // Убрал повторения
    } else {
        $credit = 0;
        $worthMoney += $oversum;             // Убрал повторения
        break;
    }
    echo $i . " платёж. Выплачено " . $worthMoney . " рублей. Остаток по кредиту - " . $credit . "\n";
}
echo "Школьник избавится от кредита через " . $i . " месяцев \n";
echo "Iphone стоил школьнику в " . round($worthMoney, 2) . " рублей";  // Добавил копейки
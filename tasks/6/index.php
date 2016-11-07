<?php
header("Content-Type: text/plain; charset=utf-8");

$credit = 40000;
$percent = 3;
$commission = 1000;
$mounthlyPayment = 5000;
$worthMoney = 0;

for ($i = 1; $i < 1000; $i++) {
    // К оплате кредита (К оплате за этот месяц + кредит)
    $oversum = $credit + $commission + ($credit * ($percent / 100));
    echo "В этом месяце ваш долг равен" . $oversum . "\n";

    if ($oversum > 5000) {
        $credit = $oversum - $mounthlyPayment;
        $worthMoney = $worthMoney + $mounthlyPayment;
        echo $i . " платёж. Выплачено " . $worthMoney . " рублей. Остаток по кредиту - " . $credit . "\n";
        echo round($credit, 2) . "\n";
    } elseif ($oversum <= 5000) {
        $credit = 0;
        $worthMoney = $worthMoney + $oversum;
        echo "Последний " . $i . " платёж. Выплачено " . $worthMoney . " рублей. Остаток по кредиту - " . $credit . "\n";
        break;
    }
}
echo "Школьник избавится от кредита через " . $i . " месяцев \n";
echo "Iphone стоил школьнику в " . round($worthMoney) . " рублей";
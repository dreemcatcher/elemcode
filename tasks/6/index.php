<?php
/*W5.1. Школьник решил купить айфон и для этой цели взял кредит.
Сумма кредита — 40000 р., банк в начале каждого месяца (включая первый)
начисляет 3% от остатка долга за пользование кредитом и 1000 р. комиссии
 (да, а ты думал, обойдешься процентами?). После этого, в конце каждого
 месяца, наш герой идет в банк и пытается выплатить долг, но он не может
заплатить более 5000 р за раз (сэкономленных на школьных завтраках).
Вопрос, когда он избавится от долга? Во сколько школьнику обошелся айфон?*/

$credit=40000;
$percent=3;
$commission=1000;
$mounthlyPayment=5000;
$worthMoney=0;

for($i=1;$i<1000;$i++){
    // К оплате кредита (К оплате за этот месяц + кредит)
    $oversum=$credit+$commission+($credit*($percent/100));
    echo "В этом месяце вашь долг равен".$oversum."<br>";

    if ($oversum>5000){
        $credit=$credit-$mounthlyPayment+$commission+($credit*($percent/100));
        $worthMoney= $worthMoney+$mounthlyPayment;
        echo $i." платёж. Выплачено ".$worthMoney. " рублей. Остаток по кредиту - ".$credit."<br>";
        echo $credit."<br>";
    }
    elseif($oversum<5000){
        $credit=($credit+$commission+($credit*($percent/100)))-$oversum;
        $worthMoney= $worthMoney+$oversum;
        echo "Последний ". $i." платёж. Выплачено ".$worthMoney. " рублей. Остаток по кредиту - ".$credit."<br>";
        break;
    }
}
echo "Школьник избавится от кредита через ".$i." месяцев<br>";
echo "Iphone стоил школьнику в ". round($worthMoney)." рублей";
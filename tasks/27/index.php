<?php
//bankomat
error_reporting(-1);


function getMoney($summ, $bills){
    $i=0;
    $mostMoney=0;
    foreach ($bills as $val ){
       // $bills*$val

        echo "Умножаем эту херню ".key($bills)." На эту ".$val."<br>";
        $mostMoney=$mostMoney+((key($bills))*$val);
        echo $mostMoney."<br>";
        next($bills);
    }
    echo $mostMoney;
    if ($summ>$mostMoney){

        return "В баномате недостаточно средств";
    }
    else{
        switch ($bills):{
            case
        }
        
    }
}
$amount=54500;

$bills = array (
    100 =>   23,
    500 =>   5,
    1000 =>  0,
    5000 =>  200
);


echo getMoney(200,$bills );


// сумма 5800
// выдача возможна
//
//
//
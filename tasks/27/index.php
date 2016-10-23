<?php
//bankomat
error_reporting(-1);

function allHaveMoney($bills){
    $allBankomatMoney=0;
    foreach ($bills as $val ){
     //   echo "Умножаем этот ключ массива (номинал купюры ) ".key($bills)." На эту (количество купюр)".$val."<br>";
        $allBankomatMoney=$allBankomatMoney+((key($bills))*$val);
       // echo $allBankomatMoney."<br>";
        next($bills);
    }
    return $allBankomatMoney;
}

function getMoney($summ){
    $nominalArray=array();
    $counterBills=0;  // Счётчик купюр

    $bills = array (
        100 =>   23,
        500 =>   5,
        1000 =>  0,
        5000 =>  200
    );
    // Берём массив, разворачиваем его с ног на голову
    $billsReverse=array_reverse($bills, true); // true это чтобы ключи тоже развернуть

    if ($summ>allHaveMoney($bills)){
        return "В баномате недостаточно средств";
    }
    else{
        //Снимать можно только суммы кратные 100 рублям.
        if( ($summ % 100) == 0){
            // Добавляем временную переменную, чтобы не задевать сумму
            $tempSumm=$summ;
            for (;$tempSumm>0;)
            {
                // quantity - количество
                foreach($billsReverse as $quantity){
                    // Номинал купюры. 5к 1к или 500 рублей etc...
                    $nominal=key($billsReverse);
                    $nomQuantity=$billsReverse[key($billsReverse)];
                    // По алгоритму, отнимаем от суммы номиналы, пока та не уйдёт в минус.
                    // Ушла в минус - откатываем последнюю операцию, уменьшаем номинал, вычитаем снова.
                    // пока массив не кончится. 0
                    //tst
                   // echo " номинал ".$nominal."<br>";
                 //   echo " Сумма к снятию  ".$tempSumm."<br>";
                    if($tempSumm==0) {
                        echo "Я здесь, чтобы сообщить об успехах<br>";
                        //echo "Ты снял {$summ} рублей. Купюрами про {$nominal}<br>";
                        break;
                        // Успех. Сумма сошлась, можно выдавать return
                    }elseif($tempSumm<0 and  $nominal>=100){
                        next($billsReverse);
                    }elseif($tempSumm>=$nominal){
                        // И тут проверочку. Есть ли в банкомате вообще такие купюры?
                        // Номинал * на количество > Требуемой суммы - всё норм.
                        // Меньше - некст элемент массив
                           // echo "[$nomQuantity] <br>";
                            if ($nomQuantity>0 and $nomQuantity-$counterBills>0){

                                $tempSumm=$tempSumm-$nominal;
                                $counterBills=$counterBills+1;
                           //     echo "Выдаю 1 купюру номиналом ".$nominal." осталось выдать {$tempSumm}.<br>";
                                $nominalArray[$nominal]=$counterBills;
                                $nomQuantity=$nomQuantity-1;
                             //   echo "Тут сменил количество купюр на -1 ::: {$nomQuantity}";
                                //$billsReverse[$nominal]=$nomQuantity;
                            }else{
                          //      echo "0 купюр данного номинала, выдам другими <br>";
                                next($billsReverse);
                            }
                    }
                    elseif($tempSumm<$nominal){
                        //$tempSumm=$tempSumm-$nominal;
                        $counterBills=0;
                        next($billsReverse);
                     //   echo "Прокручиваю массив до следующего номинала.<br>";
                    }
                    else{
                        echo "Я тут, чтобы предупредить тебя об ошибках.<br>";
                        echo ";{$nominal};{$tempSumm};{}<br>";
                        // Тут такая то обработка ошибок
                        break;
                        }
                }
            }

            $nominalArray[$nominal]=$counterBills;
            echo "Ну и в итоге....<br>";
            echo "<pre>";
            print_r($nominalArray);
            echo "</pre>";
//            echo "В банкомате осталось....<br>";
//            echo "<pre>";
//            print_r($bills);
//            echo "</pre>";

//            $tempSumm=$summ;
//            $nominal=5000;
//            $i=0;
//
//            for (;$tempSumm>0;){
//                $i++;
//                $tempSumm=$tempSumm-$nominal;
//
//                if($tempSumm<0 and $nominal>0){
//                    $tempSumm=$tempSumm+$nominal;
//                    echo "Нельзя так выдавать. Номинал купюры {$nominal} превышает запрашиваемую сумму {$summ}.<br>";
//                    //echo "Нельзя так выдавать. Номинал купюры {$nominal} превышает запрашиваемую сумму {$summ}.";
//
//                    if($nominal>100){
//
//                    foreach ($billsReverse as $value){
//                        if($tempSumm<(key($billsReverse))) {
//                            echo "Нельзя так выдавать. Номинал купюры ".key($billsReverse)." превышает запрашиваемую сумму {$summ}.<br>";
//                            next($billsReverse);
//                        }
//
//                        echo key($billsReverse)."<br>";
//
//
//                        $nominal=key($billsReverse);
//                        $i=0;
//                        next($billsReverse);
//                    }
//                    }else{
//                        //$nominal=-100;
//                        break;
//                    }
//                }
//                else{
//
//                }
//
//            }
           // echo "Можно выдать {$summ} купюрами по {$nominal}. {$i} купюр.";
        }else{
            echo "Снимать можно только суммы кратные 100<br>";
        }
    }
}
//$amount=54500;
//$operations=array(
//    100,
//    200,
//    45200,
//    3700,
//    2800,
//    7350,
//    10000,
//    1001,
//    500000000,
//    5800
//);

$operations=array(

    6600,
    8000,
    100,
    3200,
    200,
    8900,
    5000
);

foreach ($operations as $operation){
    echo "Хочу снять ".$operation." рублей<br>";
    echo getMoney($operation)."<br><br><br><br><br>";
}
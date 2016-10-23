<?php
//bankomat
error_reporting(-1);

function allHaveMoney($bills){
    $allBankomatMoney=0;
    foreach ($bills as $val ){
        $allBankomatMoney=$allBankomatMoney+((key($bills))*$val);
        next($bills);
    }
    return $allBankomatMoney;
}

function getMoney($summ){
    $money="";
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
                    // получаем количество купюр (если получать не так, количество проворачивается)

                    // По алгоритму, отнимаем от суммы номиналы, пока та не уйдёт в минус.
                    // Ушла в минус - откатываем последнюю операцию, уменьшаем номинал, вычитаем снова.
                    // пока массив не кончится. 0
                    //tst
                    //echo " номинал ".$nominal."\n";
                    //echo " Сумма к снятию  ".$tempSumm."\n";
                    if($tempSumm==0) {
                        //echo "Я здесь, чтобы сообщить об успехах\n";
                        //echo "Ты снял {$summ} рублей. Купюрами про {$nominal}\n";
                        break;
                        // Успех. Сумма сошлась, можно выдавать return
                    }elseif($tempSumm<0 and  $nominal>=100){
                        next($billsReverse);
                    }elseif($tempSumm>=$nominal){
                        // И тут проверочку. Есть ли в банкомате вообще такие купюры?
                        // Номинал * на количество > Требуемой суммы - всё норм.
                        // Меньше - некст элемент массив
                        // echo "[$nomQuantity] \n";
                        if ($nomQuantity>0 and $nomQuantity-$counterBills>0){

                            $tempSumm=$tempSumm-$nominal;
                            $counterBills=$counterBills+1;
                            //echo "Выдаю 1 купюру номиналом ".$nominal." осталось выдать {$tempSumm}.\n";
                            $nominalArray[$nominal]=$counterBills;
                            $nomQuantity=$nomQuantity-1;
                            //echo "Тут сменил количество купюр на -1 ::: {$nomQuantity}";
                            //$billsReverse[$nominal]=$nomQuantity;
                        }else{
                            //echo "0 купюр данного номинала, выдам другими \n";
                            next($billsReverse);
                        }
                    }
                    elseif($tempSumm<$nominal){
                        //$tempSumm=$tempSumm-$nominal;
                        $counterBills=0;
                        next($billsReverse);
                        //   echo "Прокручиваю массив до следующего номинала.\n";
                    }
                    else{
                        echo "Я тут, чтобы предупредить тебя об ошибках.\n";
                        echo ";{$nominal};{$tempSumm};{}\n";
                        // Тут такая то обработка ошибок
                        break;
                    }
                }
            }

            $nominalArray[$nominal]=$counterBills;
           echo "Ну и в итоге....\n";
            echo "<pre>";
            print_r($nominalArray);
            echo "</pre>";
        }else{
            echo "Снимать можно только суммы кратные 100\n";
        }
    }

    // $arr as $key => $value
    foreach ($nominalArray as  $key =>$val)
    {
        $money=$money.$val." Купюр по ".$key." рублей.";
    }
   return $money;
}

$operations=array(
    7800,
    8000,
    100,
    3200,
    200,
    8900,
    5000,
    50000000,
    1515,
);

foreach ($operations as $operation){
    echo "Хочу снять ".$operation." рублей\n<br>";
    echo getMoney($operation)."\n \n \n \n \n<br>";
}
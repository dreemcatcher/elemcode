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
    //$money="";
    //$nominalArray=array();
    //$counterBills=0;  // Счётчик купюр
    $bills = array (
        100 =>   23,
        500 =>   5,
        1000 =>  0,
        5000 =>  200
    );
    $billsReverse=array_reverse($bills, true);
    if ($summ>allHaveMoney($bills)){
        return "В баномате недостаточно средств";
    }
    else{
        if( ($summ % 100) == 0){
            $tempSumm=$summ;
            $i=0;

            while ($tempSumm>0)
            {
                foreach($billsReverse as  $nominalBills=>$quantityBills){
                    $i++;
                    if($i>1000){break;}

                    //echo "Номинал ".$nominalBills . " Количество купюр ".$quantityBills."<br>";

                    if ($tempSumm<=0){
                        break;
                    }else{
                        if ($nominalBills>$nominalBills and $quantityBills>0){
                            $tempSumm=$tempSumm-$nominalBills;
                            echo "Выдам 1 купюру  ".$nominalBills ."<br>";
                            echo "Осталось выдать ".$tempSumm ."<br>";
                        }else{
                        }
                        next($billsReverse);
                    }
                    break;
                }
            }
            //$nominalArray[$nominalBills]=$counterBills;
            //echo "Ну и в итоге....<br>";
            //echo "<pre>";
            //print_r($nominalArray);
            //echo "</pre>";
        }else{
            echo "Снимать можно только суммы кратные 100<br>";
        }
    }
   // foreach ($nominalArray as  $key =>$val)
   // {
   //     $money=$money.$val." Купюр по ".$key." рублей.";
   // }
   // return $money;
}
$operations=array(
    3300
);
foreach ($operations as $operation){
    echo "Хочу снять ".$operation." рублей<br>";
    echo getMoney($operation)."<br><br><br><br><br>";
}
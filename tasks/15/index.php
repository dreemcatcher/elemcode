<?php
header("Content-Type: text/plain; charset=utf-8");
function kredit($credit, $percent, $comission, $openDeposit, $oneTimePayment)
{
    $spent = 0;

    $debt = $credit + $openDeposit;
    for ($i = 0; $i < 50; $i++) {
        $debt = $debt + $comission + ($debt * ($percent / 100));
        if ($debt > $oneTimePayment) {
            $debt -= $oneTimePayment;
        } elseif ($debt <= $oneTimePayment and $debt >= 0) {
            $spent = ($oneTimePayment*$i)+$debt;
            $debt = 0;
            break;
        } elseif ($debt < 0) {
            echo "На случай если где-то была ошибка, а мне надо об этом знать.\n";
            exit;
        }
    }
    //echo $spent . " потрачено<br>";
    //echo $i . "месяцев<br>";
    $spent = round($spent, 2);
    return $spent;
}
$oneTimePayment = 5000;
$homoCreditTotal = kredit(39999, 4, 500, 0, $oneTimePayment);
$softBankTotal = kredit(39999, 3, 1000, 0, $oneTimePayment);
$strawberryBankTotal = kredit(39999, 2, 0, 7777, $oneTimePayment);
echo "homoCredit: {$homoCreditTotal} руб. \n";
echo "softBank: {$softBankTotal} руб. \n";
echo "strawberryBank: {$strawberryBankTotal} руб. \n";
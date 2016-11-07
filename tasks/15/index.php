<?php
header("Content-Type: text/plain; charset=utf-8");
function kredit($credit, $percent, $comission, $openDeposit)
{
    $spent = 0;

    $debt = $credit + $openDeposit;
    for ($i = 0; $i < 50; $i++) {
        $debt = $debt + $comission + ($debt * ($percent / 100));
        if ($debt > 5000) {
            $debt = $debt - 5000;
            $spent = $spent + 5000;
            echo $i . " месяц. Долг равен " . $debt . ". Выплачиваем \n";
            echo " Выплата по долгу равна " . $spent . ". Выплачиваем 5000 \n";
        } elseif ($debt <= 5000 and $debt >= 0) {
            echo $i . " месяц. Долг равен " . $debt . ". Выплачиваем {$debt}. Поздравляем с последней выплатой. \n";
            $spent = $spent + $debt;
            $debt = $debt - $debt;
            echo " Выплата по долгу равна " . $spent . ". Выплачиваем 5000 \n";
            break;
        } elseif ($debt < 0) {
            // echo "Что-то пошло не так.";
            break;
        }
    }
    //echo $spent . " потрачено<br>";
    //echo $i . "месяцев<br>";
    $spent = round($spent, 2);
    return $spent;
}

$homoCreditTotal = kredit(39999, 4, 500, 0);
$softBankTotal = kredit(39999, 3, 1000, 0);
$strawberryBankTotal = kredit(39999, 2, 0, 7777);
echo "homoCredit: {$homoCreditTotal} руб. \n";
echo "softBank: {$softBankTotal} руб. \n";
echo "strawberryBank: {$strawberryBankTotal} руб. \n";
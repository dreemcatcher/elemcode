<?php
Function kredit($credit,$percent,$comission,$openDeposit)
{
    $potracheno = 0;
    $dolg = $credit + $openDeposit;
    for ($i = 0; $i < 50; $i++) {
        $dolg = $dolg + $comission + ($dolg * ($percent / 100));
        if ($dolg > 5000) {
            $dolg = $dolg - 5000;
            $potracheno = $potracheno + 5000;
           // echo $i . " месяц. Долг равен " . $dolg . ". Выплачиваем 5000<br>";
          //  echo " Выплата по долгу равна " . $potracheno . ". Выплачиваем 5000<br>";
        } elseif ($dolg < 5000) {
            //echo $i . " месяц. Долг равен " . $dolg . ". Выплачиваем {$dolg}. Поздравляем с последней выплатой.<br>";
            $potracheno = $potracheno + $dolg;
            $dolg= $dolg - $dolg;
           // echo " Выплата по долгу равна " . $potracheno . ". Выплачиваем 5000<br>";
            break;
        } elseif ($dolg < 0) {
           // echo "Что-то пошло не так.";
            break;
        }
    }
    //echo $potracheno . " потрачено<br>";
    //echo $i . "месяцев<br>";
    $potracheno=round($potracheno, 2);
    return $potracheno;
}
$homoCreditTotal =  kredit(39999, 4, 500, 0);
$softBankTotal =  kredit(39999, 3, 1000, 0);
$strawberryBankTotal =  kredit(39999, 2, 0, 7777);
echo "homoCredit: {$homoCreditTotal} руб. \n";
echo "softBank: {$softBankTotal} руб. \n";
echo "strawberryBank: {$strawberryBankTotal} руб. \n";
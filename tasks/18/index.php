<?php
header("Content-Type: text/plain; charset=utf-8");
/*
На вход скрипта дан введенный пользователем номер телефона в виде 8-911-404-44-11 или +7(812)6786767 (в начале 8
 или +7, потом идут 10 цифр и, возможно, какие-то символы).

То есть, как и в прошлой задаче, человек вводит номер как хочет.
Надо проверить номер на правильность
и привести любой номер к единому формату 89114044411
(то есть,
заменить +7 на 8 и
выкинуть весь мусор вроде пробелов,
скобок и
минусов,
кроме цифр)
    */
function phoneNumberCheck($mobileNumber){
    echo "Было так - ".$mobileNumber."\n";
    $regexp='/^( ?8|^\+ ?7)([-() ]*\d){10}$/';
    $match = [];
    if (preg_match($regexp, $mobileNumber, $match)) {
        echo "+ Номер верный '{$match[0]}' \n";
        $mobileNumber = str_replace(" ","",$mobileNumber);
        $mobileNumber = str_replace("-","",$mobileNumber);
        $mobileNumber = str_replace("(","",$mobileNumber);
        $mobileNumber = str_replace(")","",$mobileNumber);
        $mobileNumber = str_replace("+7","8",$mobileNumber);
        echo "Стало так ". $mobileNumber;
    } else {
        echo "- Ничего не найдено\n";
    }
}

function phoneNumberCheckRegexp($mobileNumber){
    echo "Было так - ".$mobileNumber."\n";
    $regexp='/(^ ?8|^\+ ?7)([-() ]*\d){10}$/';
    $match = [];
    if (preg_match($regexp, $mobileNumber, $match)) {
        $pattern = '/[-() ]/';
        $replacement = '';
        echo "Стало так ".preg_replace($pattern, $replacement, $mobileNumber)."\n";
        $pattern = '/(\+ ?7)/';
        $replacement = '8';
        echo "а потом Стало так ".preg_replace($pattern, $replacement, $mobileNumber)."\n";
    } else {
        echo "- Номер введён неверно\n";
    }
}

$correctNumbers = [
    '84951234567',
    '+74951234567',
    '8-495-1-234-567',
    '8(911)1234567',
    '8 (911) 1234567',
    ' 8 (8122) 56-56-56',
    '8-911-1234567',
    '8 (911) 12 345 67',
    '8-911 12 345 67',
    '8 (911) - 123 - 45 - 67',
    '+ 7 999 123 4567',
    '8 ( 999 ) 1234567',
    '8 999 123 4567'
];

$incorrectNumbers = [ '02', '84951234567 позвать люсю', '849512345', '849512345678',
    '8 (409) 123-123-123', '7900123467', '5005005001', '8888-8888-88',
    '84951a234567', '8495123456a','8((((((((((', '8495кря4567','84а97а75п67',
    '849512s45678',
    '+1 234 5678901', /* неверный код страны */
    '+8 234 5678901', /* либо 8 либо +7 */
    '7 234 5678901' /* нет + */];

echo "-------------------------------------------\n";


$arCount=count($correctNumbers);
for ($i=0;$i<$arCount;$i++){
    echo " ".phoneNumberCheck($correctNumbers[$i])."\n";
}

$inarcount=count($incorrectNumbers);
echo "-------------------------------------------\n";
for ($i=0;$i<$inarcount;$i++){
    echo " ".phoneNumberCheck($incorrectNumbers[$i])."\n";
}

$arCount=count($correctNumbers);
for ($i=0;$i<$arCount;$i++){
    echo " ".phoneNumberCheckRegexp($correctNumbers[$i])."\n";
}

$inarcount=count($incorrectNumbers);
echo "-------------------------------------------\n";
for ($i=0;$i<$inarcount;$i++){
    echo " ".phoneNumberCheckRegexp($incorrectNumbers[$i])."\n";
}
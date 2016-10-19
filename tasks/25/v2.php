<?php
// Staring straight up into the sky ... oh my my
error_reporting(-1);
mb_internal_encoding('utf-8');

/* Возвращает соответствующую числу форму слова: 1 рубль, 2 рубля, 5 рублей */
function inclineWord($number, $word1, $word2, $word5) {
    /* DIY */
}

/*
    Преобразует числа от 0 до 999 в текст. Параметр $isFemale равен нулю,
    если мы считаем число для мужского рода (один рубль),
    и 1 — для женского (одна тысяча)
*/
function smallNumberToText($number, $isFemale) {

    $spelling = array(
        0   =>  'ноль',                                     10  =>  'десять',       100 =>  'сто',
        1   =>  'один',         11  =>  'одиннадцать',      20  =>  'двадцать',     200 =>  'двести',
        2   =>  'два',          12  =>  'двенадцать',       30  =>  'тридцать',     300 =>  'триста',
        3   =>  'три',          13  =>  'тринадцать',       40  =>  'сорок',        400 =>  'четыреста',
        4   =>  'четыре',       14  =>  'четырнадцать',     50  =>  'пятьдесят',    500 =>  'пятьсот',
        5   =>  'пять',         15  =>  'пятнадцать',       60  =>  'шестьдесят',   600 =>  'шестьсот',
        6   =>  'шесть',        16  =>  'шестнадцать',      70  =>  'семьдесят',    700 =>  'семьсот',
        7   =>  'семь',         17  =>  'семнадцать',       80  =>  'восемьдесят',   800 =>  'восемьсот',
        8   =>  'восемь',       18  =>  'восемнадцать',     90  =>  'девяносто',     900 =>  'девятьсот',
        9   =>  'девять',       19  =>  'девятнадцать'
    );

    $femaleSpelling = array(
        1   =>  'одна',        2   =>  'две'
    );


    return $spelling[1];
    /* DIY */
}

function numberToText($number) {

    /* DIY */
    $resultString='';

    //  Переверным полученное число и начнём рассказ о нём с конца .
    // 53 рубля
    // сто
    // двенадцать тысячь
    // сто
    // один миллион

    // Делим число на части по 3 начиная с конца.
    // Отделим три последние цифры
    $splitter=preg_split('//u', $number, -1, PREG_SPLIT_NO_EMPTY);



    echo "<br>".$number."<br>";

    echo $number."<br>";
    echo "<pre>";
    print_r ($splitter);
    echo "</pre>";

    echo "<pre>";
    var_dump($splitter);
    echo "</pre>";


    for($i=$number;$i>0;$i=($i/10)){
      //  echo "{$i}";
    }


    return $resultString;
}

/* Вызовем функцию несколько раз */
$amount1 = mt_rand(1,99999999);
$text1 = numberToText($amount1);

echo "На вашем счету {$text1}\n";

$amount2 = mt_rand(1,99999999);
$text2 = numberToText($amount2);

echo "На вашем счету {$text2}\n";

$amount3 = mt_rand(1,99999999);
$text3 = numberToText($amount3);

echo "На вашем счету {$text3}\n";

$amount4 = mt_rand(1,99999999);
$text4 = numberToText($amount4);

echo "На вашем счету {$text4}\n";
     
     
<?php
// Staring straight up into the sky ... oh my my
error_reporting(-1);
mb_internal_encoding('utf-8');


/* Возвращает соответствующую числу форму слова: 1 рубль, 2 рубля, 5 рублей */
function inclineWord($number, $word1, $word2, $word5) {
    /* DIY */

    if ($number == 1) {
        return "рубль";
    }elseif ($number == 2 || $number == 3 || $number == 4){
        return "рубля";
    }elseif ($number == 0 || $number >5 and $number<21){
        return "рублей";
    }else {
        return "рублей";
    }
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



    /* DIY */

    $splitter=preg_split('//u', $number, -1, PREG_SPLIT_NO_EMPTY);


    if ($number <= 20)
    {
        return $spelling[$number];
    }
    elseif ($number > 20 and $number < 100)
    {
        $decimal = $splitter[0] * 10;
        return ($spelling[$decimal] . " " . $spelling[$splitter[1]]);
    }
    elseif ($number >= 100 and $number < 1000)
    {

        //  echo "cjnybbbbb";
        if(($splitter[1]) == 0){
            $hundredth = $splitter[0] * 100;
            return ($spelling[$hundredth] . " " . $spelling[$splitter[2]]);
        } else {
            $hundredth = $splitter[0] * 100;
            $decimal = $splitter[1] * 10;
            return ($spelling[$hundredth] . " " . $spelling[$decimal] . " " . $spelling[$splitter[2]]);
        }
    }
    elseif ($number > 1000 and $number < 2000)
    {
        echo "Принимаю больше тысячи - " . $number;
        $numbers = preg_split('//u', $number, -1, PREG_SPLIT_NO_EMPTY);
        if (($numbers[2]) == 0) {
            $thousands = $numbers[0] * 1000;
            $hundredth = $numbers[0] * 100;
            return ($spelling[$thousands] . " " . $spelling[$hundredth] . " " . $spelling[$numbers[2]]);

        } elseif (($numbers[1]) == 0 and ($numbers[2]) == 0) {

            $thousands = $numbers[0] * 1000;
            //$hundredth = $numbers[0] * 100;
            return ($spelling[$thousands] . " " . $spelling[$numbers[2]]);

        } elseif (($numbers[1]) == 0) {

            $thousands = $numbers[0] * 1000;
            // $hundredth = $numbers[0] * 100;
            $decimal = $numbers[2] * 10;
            return ($spelling[$thousands] . " " . ($spelling[$decimal]) . " " . $spelling[$numbers[2]]);

        } else {
            $thousands = $numbers[0] * 1000;
            $hundredth = $numbers[1] * 100;
            $decimal = $numbers[2] * 10;
            return ($femaleSpelling[1] . " " . $thousandsSpeeling[1] . " " . $spelling[$hundredth] . " " . $spelling[$decimal] . " " . $spelling[$numbers[3]]);
        }
    } elseif ($number > 2000 and $number < 3000) {
        echo "Принимаю больше 2 тысячи - " . $number;
        $numbers = preg_split('//u', $number, -1, PREG_SPLIT_NO_EMPTY);
        if (($numbers[1]) == 0) {
            $thousands = $numbers[0] * 1000;
            $hundredth = $numbers[0] * 100;
            return ($spelling[$thousands] . " " . $spelling[$hundredth] . " " . $spelling[$numbers[2]]);
        } else {
            $thousands = $numbers[0] * 1000;
            $hundredth = $numbers[1] * 100;
            $decimal = $numbers[2] * 10;
            return ($spelling[$thousands] . " " . $spelling[$hundredth] . " " . $spelling[$decimal] . " " . $spelling[$numbers[3]]);
        }
    } elseif ($number > 3000 and $number < 1000000) {
        echo "Принимаю больше 3 тысячи - " . $number;
        $numbers = preg_split('//u', $number, -1, PREG_SPLIT_NO_EMPTY);
        if (($numbers[1]) == 0) {
            $thousands = $numbers[0] * 1000;
            $hundredth = $numbers[0] * 100;
            return ($spelling[$thousands] . " " . $spelling[$hundredth] . " " . $spelling[$numbers[2]]);
        } else {
            $thousands = $numbers[0] * 1000;
            $hundredth = $numbers[1] * 100;
            $decimal = $numbers[2] * 10;
            return ($spelling[$thousands] . " " . $spelling[$hundredth] . " " . $spelling[$decimal] . " " . $spelling[$numbers[3]]);
        }
    } elseif ($number > 1000000 and $number < 1000000000) {
        echo "Принимаю больше миллиона- " . $number;
        // $number=$number*10;
        $numbers = preg_split('//u', $number, -1, PREG_SPLIT_NO_EMPTY);
        if (($numbers[1]) == 0) {
            $hundredth = $numbers[0] * 100;
            // $decimal = $numbers[1] * 10;
            return ($spelling[$hundredth] . " " . $spelling[$numbers[2]]);
        } else {
            // $numbers = preg_split('//u', $number, -1, PREG_SPLIT_NO_EMPTY);

            $hundredth = $numbers[0] * 100;
            $decimal = $numbers[1] * 10;
            return ($spelling[$hundredth] . " " . $spelling[$decimal] . " " . $spelling[$numbers[2]]);
        }
    } else {
    }
}

function numberToText($number) {

    /* DIY */
    $resultString="";
    echo "Исходное число ".$number."<br>";

    $result='';
    $separatedNumbers= preg_split('//u', $number, NULL , PREG_SPLIT_NO_EMPTY);

    $j=count($separatedNumbers);
    $lastDigit=array_pop($separatedNumbers);
//    if ($number >= 21 and $number <100 ) {
//        $resultString =$resultString." ". smallNumberToText($number, 0) . " " . inclineWord($lastDigit, 1, 1, 1) . " ";
//    } else {
//
//    }
   // $dec=array{};



    $spedec = array(
        1   =>  'десять',
        2   =>  'сто',
        3   =>  'тысяча',
        4   =>  'миллион',
        5   =>  'миллиард',
        6   =>  'триллион',
        7   =>  'квадриллион',
        8   =>  'квинтиллион',
        9   =>  'секстиллион',
        10  =>  'септиллион',
        11  =>  'октиллион',
        12  =>  'нониллион',
        13  =>  'дециллион'
    );

    for ($i=0; $i <count($separatedNumbers); $i++) {
       // echo $separatedNumbers[$i]."<br>";
        $j--;
        if ($j>2){
            $resultString = $resultString ." ". smallNumberToText(($separatedNumbers[$i]), 0) . " ".$spedec[$j];
        }else{
            $resultString = $resultString ." ". smallNumberToText(($separatedNumbers[$i]), 0) . " ";
        }
        //echo $resultString."<br>";
    }

    $result=$resultString;
   // echo $resultString."<br>";
  //  break;
   // $resultString=$resultString."". inclineWord($lastDigit, 1, 1, 1) . " ";

    return $result;
}

/* Вызовем функцию несколько раз */
$amount1 = mt_rand(1,99999999);
$text1 = numberToText($amount1);

echo "На вашем счету {$text1}<br>";

$amount2 = mt_rand(1,99999999);
$text2 = numberToText($amount2);

echo "На вашем счету {$text2}<br>";

$amount3 = mt_rand(1,99999999);
$text3 = numberToText($amount3);

echo "На вашем счету {$text3}<br>";

$amount4 = mt_rand(1,99999999);
$text4 = numberToText($amount4);

echo "На вашем счету {$text4}<br>";

$amount5 = mt_rand(1,9);
$text5 = numberToText($amount5);

echo "На вашем счету {$text5}<br>";
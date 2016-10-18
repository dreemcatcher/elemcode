<?php

// Staring straight up into the sky ... oh my my
error_reporting(-1);
mb_internal_encoding('utf-8');


/* Возвращает соответствующую числу форму слова: 1 рубль, 2 рубля, 5 рублей */
function inclineWord($number, $word1, $word2, $word5) {
    /* DIY */


   // echo "Передано в функцию руб ".$number;
    if($number==1){
        return "рубль";
    }elseif($number==2||$number==3||$number==4){
        return "рубля";
    }elseif($number==0){
        return "рублей";
    }else{
        return "рублей";
    }
    $rubl=array (
        0   =>  'рубль',
        1   =>  'рубля',
        2   =>  'рублей'
    );
}

/*
    Преобразует числа от 0 до 999 в текст. Параметр $isFemale равен нулю,
    если мы считаем число для мужского рода (один рубль),
    и 1 — для женского (одна тысяча)
*/
function smallNumberToText($number, $isFemale) {

 //   echo "Передано в функцию smallNumberToText ".$number;


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

   // echo "Принимаю".$number;

    if($number<20 and $number>0){
        return $spelling[$number];
    }elseif($number>20 and $number<100){
        // echo "sadasd".$number;
        // $number=$number*10;
        $numbers=preg_split('//u',$number,-1,PREG_SPLIT_NO_EMPTY);
        $decimal=$numbers[0]*10;
        return ($spelling[$decimal]." ".$spelling[$numbers[1]]);
    }elseif($number>100 and $number<1000){
        echo "Принимаю - ".$number;
        // $number=$number*10;
    $numbers=preg_split('//u',$number,-1,PREG_SPLIT_NO_EMPTY);
        $hundredth=$numbers[0]*100;
    $decimal=$numbers[1]*10;
    return ($spelling[$hundredth]." ".$spelling[$decimal]." ".$spelling[$numbers[2]]);
    }
    else{

    }
    /* DIY */
}

function numberToText($number) {
    /* DIY */
    $digit=$number;
    $number=preg_split('//u',$number,-1,PREG_SPLIT_NO_EMPTY);

    if(count($number)==1){
        $lastDigit=(array_pop($number));
        return smallNumberToText($lastDigit,0)." ".inclineWord($lastDigit,1,1,1)." ";
    }elseif($digit<=20){
        $lastDigit=(array_pop($number));
        $firstDigit=array_shift($number);
        $lastTwo=$firstDigit.$lastDigit;
        return smallNumberToText($firstDigit,0)." ".inclineWord($lastTwo,1,1,1)." ";
    }
    elseif($digit<=100){
        //  echo "Передано в функцию болше|равно 2 цифор!! <br>";
        $lastDigit=array_pop($number);
        $firstDigit=array_shift($number);
        // $lastDigit=inclineWord(array_pop($number),1,1,1);
         // echo $lastDigit;
        $lastTwo=$firstDigit.$lastDigit;
        // echo $lastTwo;
        // $lastDigit=array_pop($number);
        //  echo smallNumberToText($lastTwo,0);

        return smallNumberToText($lastTwo,0)." ".inclineWord($lastDigit,1,1,1)." ";
    }
    elseif($digit>100||$digit<1000){
        echo "Передано в функцию болше|равно 100 {$digit}!! <br>";
        $lastDigit=array_pop($number);
       // $firstDigit=array_shift($number);
        // $lastDigit=inclineWord(array_pop($number),1,1,1);
        // echo $lastDigit;
       // $lastTwo=$firstDigit.$lastDigit;
        // echo $lastTwo;
        // $lastDigit=array_pop($number);
        //  echo smallNumberToText($lastTwo,0);

        return smallNumberToText($digit,0)." ".inclineWord($lastDigit,1,1,1)." ";
    }
}

///* Вызовем функцию несколько раз */
//$amount1 = mt_rand(1,99999999);
//$text1 = numberToText($amount1);
//
//echo "На вашем счету {$text1}\n";
//
//$amount2 = mt_rand(1,99999999);
//$text2 = numberToText($amount2);
//
//echo "На вашем счету {$text2}\n";
//
//$amount3 = mt_rand(1,99999999);
//$text3 = numberToText($amount3);
//
//echo "На вашем счету {$text3}\n";
//
//$amount4 = mt_rand(1,99999999);
//$text4 = numberToText($amount4);
//
//echo "На вашем счету {$text4}\n";
//
//$amount1 = mt_rand(0,9);
//$text1 = numberToText($amount1);
//echo "<br> На вашем счету {$text1}\n";
//
$amount2= mt_rand(101,999);
$text2 = numberToText($amount2);
echo "<br>На вашем счету {$text2}\n";
//
//$amount3=5515;
//$text3 = numberToText($amount3);
//echo "На вашем счету {$text3}\n";
//
//$amount4=1111;
//$text4 = numberToText($amount4);
//echo "На вашем счету {$text4}\n";

<?php
header("Content-Type: text/plain; charset=utf-8");
error_reporting(-1);

$word1 = array('Чудесных', 'Суровых', 'Занятных', 'Внезапных');
$word2 = array('слов', 'зим', 'глаз', 'дней', 'лет', 'мир', 'взор');
$word3 = array('прикосновений', 'поползновений', 'судьбы явлений',
    'сухие листья', 'морщины смерти', 'долины края', 'замены нету',
    'сухая юность', 'навек исчезнув');
$word4 = array('обретаю', 'понимаю', 'начертаю', 'закрываю', 'оставляю',
    'вынимаю', 'умираю', 'замерзаю', 'выделяю');
$word5 = array('очертания', 'безысходность', 'начертанья', 'смысл жизни',
    'вирус смерти', 'радость мира');

$allWords = array($word1, $word2, $word3, "\n", $word1, $word2, $word3, "\n", "Я ", $word4, $word5);

foreach ($allWords as $someword) {
    if (is_array($someword)) {
        echo $someword[mt_rand(0, count($word1) - 1)] . ' ';
    }else {
        echo $someword;
    }
}



//echo count($word1)-1;
//$rndWord1 = mt_rand(0, count($word1) - 1);
//$rndWord2 = mt_rand(0, count($word2) - 1);
//$rndWord3 = mt_rand(0, count($word3) - 1);
//
//$rndWord_1 = mt_rand(0, count($word1) - 1);
//$rndWord_2 = mt_rand(0, count($word2) - 1);
//$rndWord_3 = mt_rand(0, count($word3) - 1);
//
//$rndWord4 = mt_rand(0, count($word4) - 1);
//$rndWord5 = mt_rand(0, count($word5) - 1);
//
//echo "\n" . $word1[$rndWord1] . ' ' . $word2[$rndWord2] . ' ' . $word3[$rndWord3] . "\n";
//echo $word1[$rndWord_1] . ' ' . $word2[$rndWord_2] . ' ' . $word3[$rndWord_3] . "\n";
//echo "Я " . $word4[$rndWord4] . ' ' . $word5[$rndWord5];
//
//// вариант 2
//echo "\n\n";
//
//echo $word1[array_rand($word1, 1)] . ' ' . $word2[array_rand($word1, 1)] . ' ' . $word3[array_rand($word1, 1)] . "\n";
//echo $word1[array_rand($word1, 1)] . ' ' . $word2[array_rand($word1, 1)] . ' ' . $word3[array_rand($word1, 1)] . "\n";
//echo 'Я ' . $word4[array_rand($word1, 1)] . ' ' . $word5[array_rand($word1, 1)];
<?php

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

$rndWord1=mt_rand(0,3);
$rndWord2=mt_rand(0,6);
$rndWord3=mt_rand(0,8);

$rndWord_1=mt_rand(0,3);
$rndWord_2=mt_rand(0,6);
$rndWord_3=mt_rand(0,8);

$rndWord4=mt_rand(0,8);
$rndWord5=mt_rand(0,5);

echo $word1[$rndWord1].' '.$word2[$rndWord2].' '.$word3[$rndWord3].'<br>';
echo $word1[$rndWord_1].' '.$word2[$rndWord_2].' '.$word3[$rndWord_3].'<br>';
echo "Я ".$word4[$rndWord4].' '.$word5[$rndWord5];


// вариант 2
echo '<br>';
echo '<br>';

echo  $word1[array_rand($word1, 1)].' '. $word2[array_rand($word1, 1)].' '. $word3[array_rand($word1, 1)].'<br>';
echo  $word1[array_rand($word1, 1)].' '. $word2[array_rand($word1, 1)].' '. $word3[array_rand($word1, 1)].'<br>';
echo  'Я '. $word4[array_rand($word1, 1)].' '. $word5[array_rand($word1, 1)];
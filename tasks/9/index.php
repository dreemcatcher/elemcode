<?php
/*
 * 5.5 Давай сделаем программу, отвечающую на любой вопрос. Для этого создадим массив с
 * возможными вариантами ответов, сгенерируем случайное число и возьмем из массива элемент с таким номером.
 * */
error_reporting(-1);
$answers = array(
    1	=>	'да',
    2	=>	'нет',
    3	=>	'не знаю',
    4	=>	'никогда',
    5	=>	'это зависит от тебя',
    6	=>	'спроси анона'
);

$question = 'Выучу ли я PHP?';
$random=array_rand ($answers, 2);
$answer=$answers[$random[0]];

echo "Вопрос:{$question}\n";
echo "Ответ: {$answer}\n";
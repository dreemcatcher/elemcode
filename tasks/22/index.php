<?php
error_reporting(-1);
function findEngSpells($text){
    $matches=array();
    $regexp='/[a-zA-z][а-яА-Я]/u';
    $finded=preg_match_all($regexp,$text,$matches, PREG_SET_ORDER);
    echo "Найдено опечаток: {$finded}\n";


    // Разбиваем на массив и проверяем каждое слово
    $fixedWords=array();
    $words = explode(" ", $text);
    foreach (($words) as $someWord) {
        $regexp='/[a-zA-z]/';
        if (preg_match($regexp, $someWord, $match)) {
            $someWord=preg_replace($regexp,'[опечатка]',$someWord);
            array_push($fixedWords, $someWord);
        }
        else{
            array_push($fixedWords, $someWord);
        }
    }
    //Склеиваем массив назад
    $fixedText= implode(" ", $fixedWords);
    return $fixedText;

}


$text='Наименование заказа 	Пocтaвкa мяco гoвядины, бecкостнoe для нужд государственного бюджетного учреждения здравоохранения Республики Башкортостан Инфекционная клиническая больница № 4 города Уфа
Начальная (Максимальная) цена контракта 	141 600,00 Российский рубль
Обоснование максимальной цены контракта 	Согласно приложению №4, являющемуся неотъемлемой частью настоящего запроса котировок';

echo findEngSpells($text);

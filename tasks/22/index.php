<?php
error_reporting(-1);

header("Content-Type: text/plain; charset=utf-8");

function findEngSpells($text){
    $regexp='/([a-zA-z][а-яА-Я])|([а-яА-Я][a-zA-z])/u';
    //$matches=array();
    $fixedWords=array();
    $words = explode(" ", $text);
    foreach (($words) as $someWord) {
        $regexp='/[a-zA-z]/';
        if (preg_match($regexp, $someWord, $matches)) {
            $characters=preg_split('//u', $someWord, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($characters as &$value) {
                $someWord=preg_replace($regexp,'['.$value.']',$value);
                $someWord=trim($someWord);
                array_push($fixedWords, $someWord);
            }
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
echo $text."<br>";

echo findEngSpells($text);

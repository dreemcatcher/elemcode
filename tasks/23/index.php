<?php
error_reporting(-1);
mb_internal_encoding('utf-8');
/* Делает первую букву в строке заглавной */
function makeFirstLetterUppercase($text) {
    //Берём первый символ, делаем его большим.
    return mb_strtoupper(mb_substr($text, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr(mb_convert_case($text, MB_CASE_LOWER, 'UTF-8'), 1, mb_strlen($text), 'UTF-8');
}
///* исправляет текст */
function fixText($text) {
    $offersFix=array();
    // разделяем текст про предложениям.
    $offers = preg_split("/(?<=[.])/u", $text, -1, PREG_SPLIT_NO_EMPTY);
    //Удаляй хоть 100 пробелов.
    $regexpSpace="/(\s){2,100}/ui";
    //В каждом предложении ищем пробелы и исправляем.
    foreach (($offers) as $offer) {
        $someoffer=preg_replace($regexpSpace, '' ,$offer);
        //Пихаем исправленное предложение без повторных пробелов
        $upperLetterOffer=makeFirstLetterUppercase($someoffer);
        array_push($offersFix, $upperLetterOffer);
    }
    $fixedtext= implode(" ", $offersFix);
    //Осталось проверить на пробелы после препинаний.
    $fixedtext=preg_replace("/([[:punct:]]+)\s*/", '$1 ', $fixedtext);
    $fixedtext=preg_replace("/\s*([[:punct:]]+)/", '$1 ', $fixedtext);

    return $fixedtext;
}

//$text = "ну что.      не смотрел еще black mesa.я собирался скачать  ,но все как-то некогда было.";
// Для тестов
// $text = "roses are red,and violets are blue.whatever you do i'll keep it for you.";
 //$text = 'привет.есть 2 функции,preg_split и explode ,не понимаю,в чем между ними разница.';
$text="много их в Петербурге,молоденьких дур,сегодня в атласе да бархате,а завтра , поглядишь , метут улицу вместе с голью кабацкою...в самом деле ,что было бы с нами ,если бы вместо общеудобного правила:чин чина почитай , ввелось в употребление другое,например:ум ума почитай?какие возникли бы споры!";
$result = fixText($text);
echo "{$result}\n";
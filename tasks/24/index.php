<?php
error_reporting(-1);
mb_internal_encoding('utf-8');

//$text = "Кажется, нас обнаружили! Надо срочно уходить отсюда, пока не поздно. Бежим же скорее!";
// Другие варианты для тестов
 //$text = "Ну, прости меня! Не хотела я тебе зла сделать; да в себе не вольна была. Что говорила, что делала, себя не помнила.";
 $text = "Идет гражданская война. Космические корабли повстанцев, наносящие удар с тайной базы, одержали первую победу, в схватке со зловещей Галактической Империей.";

/* Делает первую букву предложения заглавной */
function makeFirstletterUppercase($text) {
    /* Сделай сам */
    return mb_strtoupper(mb_substr($text, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr(mb_convert_case($text, MB_CASE_LOWER, 'UTF-8'), 1, mb_strlen($text), 'UTF-8');
}

function makeYodaStyleText($text) {
    $reverceSentence=array();
    $words=array();
    $yodaSay='';
    /* Сделай сам */
    $sentenceWords=array();
    $sentences = preg_split("/[.]|[!]|[?]|[;]/u", $text, -1, PREG_SPLIT_NO_EMPTY);

    foreach ($sentences as $sentence){
        echo $sentence;
        $words=explode(" ",$sentence);
        $reverceSentence=array_reverse($words);

        $reverceSentence= implode(" ", $reverceSentence);
        $reverceSentence=makeFirstLetterUppercase($reverceSentence);
        $yodaSay=$yodaSay.$reverceSentence.".";
    }

    $regexpPoint='/[,.]{2}/ui';
    $yodaSay=preg_replace($regexpPoint,'.',$yodaSay);
    $yodaSay=preg_replace("/([[:punct:]]+)\s*/", '$1 ', $yodaSay);
    $yodaSay=preg_replace("/\s*([[:punct:]]+)/", '$1 ', $yodaSay);
    return $yodaSay;
}

$yodaText = makeYodaStyleText($text);
echo "<br>Йода говорит: {$yodaText}\n";


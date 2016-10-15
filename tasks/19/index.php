<?php
function engToRus($phrases)
{
    if (preg_match('/[a-z]/ui', $phrases)) {
        $pattern = array('/d/','/u/','/r/','/a/','/k/','/p/','/y/');
        $replacement = array('Д','У','Р','А','К','Р','У');
        return preg_replace($pattern, $replacement, $phrases);
    } else {
       // return NULL;  // А так можно?
    }
}

function autoChange($phrases){
    echo "Было так - ".$phrases."<br>";
    if(preg_match('/[a-z]/ui', $phrases)) {
        echo "А тут у нас латинские символы!<br>";
        $newPhrase=engToRus ($phrases);
        //Тут такая ещё проверка, вдруг функция косячит!
        if(preg_match('/[a-z]/ui', $newPhrase)) {
            echo "Фраза всё-равно английская!{$newPhrase}<br>";
        }
        else {
            // Получили лузультат ... дурак
            // Меняем дурак, на хороший человек
            $pattern = '/(дурак)/ui';
            $replacement = 'хороший человек';
            echo preg_replace($pattern, $replacement, $newPhrase) . "<br>";
        }
    }
    elseif(preg_match('/дурак/ui', str_replace(" ","",$phrases))){
        echo "Пробелами шалим?<br>";
        $pattern = '/(дурак)/ui';
        $replacement = ' хороший человек';
        echo "а потом Стало так ".preg_replace($pattern, $replacement, str_replace(" ","",$phrases))."<br>";
    }
    else{
        $pattern = '/(дурак)/ui';
        $replacement = 'хороший человек';
        echo "а потом Стало так ".preg_replace($pattern, $replacement, $phrases)."<br>";
    }
}

$checkArray = [
    'Вася дурак',
    'ВоВа ДуРаК',
    'Ирина дypak',
    'Джонни д у р а к!!!',
    'ты дурак'
];

echo "-------------------------------------------<br>";


$arCount=count($checkArray);
for ($i=0;$i<$arCount;$i++){
    echo " ".autoChange($checkArray[$i])."<br>";
}